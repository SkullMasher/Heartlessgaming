<?php 

/**
* User
*/
class User
{
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
		 	$_isLoggedIn;

	function __construct($user = null)
	{
		$this->_db = db::getInstance();

		$this->_sessionName	= Config::get('session/session_name');
		$this->_cookieName	= Config::get('remember/cookie_name');

		if (!$user) {
			if (Session::exists($this->_sessionName)) {
			 	$user = Session::get($this->_sessionName);
			 	if ($this->find($user)) {
			 		$this->_isLoggedIn = true;
			 	} else {
			 		// LOGOUT
			 	}
			 } 
		} else {
			$this->find($user);
		}
		
	}

	public function create($fields = array()) {
		if (!$this->_db->insert('users', $fields)) {
			throw new Exception('There was problem creating an account.');
		} 
	}
	public function update($fields = array(), $id = null) {

		if (!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}

		if (!$this->_db->update('users', $id, $fields)) {
			throw new Exception('There was a problem updating :(');
		}
	}
	public function find($user = null) {
		if ($user) {
			// avoid numeric only user
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('users', array($field, '=', $user));

			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
	}
		// Check login of the user is corect
	public function login($username = null, $password = null, $remember = false) {
		if (!$username && !$password && $this->exists()) {
			Session::put($this->_sessionName, $this->data()->id);
		} else {
			$user = $this->find($username);
				// If uzer credential are corect.
			if ($user) {
				if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
					Session::put($this->_sessionName, $this->data()->id);
						// If checkbox is ticked.
					if ($remember) {
						$hash = Hash::unique();
						$hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));
							// If uzer has no hash create one in the database. 
						if (!$hashCheck->count()) {
							$this->_db->insert(array(
								'user_id'	=> $this->data()->id,
								'hash' 		=> $hash
							));
						} else {
								// Otherwise set hash to one from the database.
							$hash = $hashCheck->first()->hash;
						}
						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
					}

					return true;
				}
			}
		}
		return false;
	}

	public function logout() {
			// Delete user hash from db
		$this->_db->delete('users_session', array('hash', '=', $this->data()->id));

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}
	public function hasPermission($key) {
		$group = $this->_db->get('groups', array('id', '=', $this->data()->group));
		if ($group->count()) {
				// Jsoin decode from the database field written in json format.
			$permissions = json_decode($group->first()->permissions, true);
			if ($permissions[$key] == true) {
				return true;
			}
		}
		return false;
	}
	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}
		// Data Getter
	public function data() {
		return $this->_data;
	}
		// Getter user logged in
	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}
}