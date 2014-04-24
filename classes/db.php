<?php

/**
* DB database communication, the Singleton pattern.
*/
class DB {

	private static $_instance = null;
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count = 0;
		
	private function __construct()
	{
		try {
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public static function getInstance() {
		// Singleton : if instance of DB not exist return it. It avoid multiple conection to the db in fact it allows us to have only one connection to the db at any time.
		if (!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

		// PDO Prepare (bindparam) and execute the query 
	public function query($sql, $params = array()) {

		$this->_error = false;
		if ($this->_query = $this->_pdo->prepare($sql)) {
			$x = 1;
			if (count($params)) {
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}
				// If execution is possible, exec
			if ($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			} else {
				$this->_error = true;
			}
		}
		return $this;
	}
		// Query wrapper
	public function action($action, $table, $where = array()) {
			// If array got 3 elements
		if (count($where) === 3) {
			$operators = array('=', '<', '>', '>=', '<=');

			$field 		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

			if (in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
					// IF there's no error
				if (!$this->query($sql, array($value))->error()) {
					return $this;
				}
			}
		}

		return false;

	}	
		// SQL Select query shortcut
	public function get($table, $where) {
		return $this->action('SELECT *', $table, $where);
	}
	public function insert($table, $fields = array()) {
			// If fields are present
		if (count($fields)) {
				// Insert : query fields.
			$keys 	= array_keys($fields);
				// Insert : query values changing to '?' to avoid XSS insertion (value params are binded by the query() method during preparation.)
			$values = '';
			for ($i=1; $i <= count($fields); $i++) { 
				$values .= '?';
				if ($i < count($fields)) {
					$values .= ', ';
				}
			}

			$sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
				// If there's no error.
			if (!$this->query($sql, $fields)->error()) {
				return true;
			}			
		}

		return false;
	}
	public function update($table, $id, $fields) {
		$set = '';
		$column = array_keys($fields);

		$i = 1;
		foreach ($fields as $column => $value) {
			$set .= "{$column} = ?";
			if ($i < count($fields)) {
				$set .= ', ';
			}
			$i++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

		if (!$this->query($sql, $fields)->error()) {
			return true;
		}
	}
		// SQL Delete query shortcut
	public function delete($table, $where) {
		return $this->action('DELETE', $table, $where);
	}
		// Return a fetched query from query method 
	public function result() {
		return $this->_results;
	}
		// Return the first result of the resulted query
	public function first() {
		return $this->result()[0];
	}
		// Row count
	public function count(){
		return $this->_count;
	}
	public function error() {
		return $this->_error;
	}
}