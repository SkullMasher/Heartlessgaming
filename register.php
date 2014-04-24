<?php
	require_once 'core/init.php';

	// $userInsert = DB::getInstance()->insert( 'users', array(
	// 	'username' 	=> 'Death',
	// 	'password' 	=> 'lodr',
	// 	'name'		=> "I'am death" 
	// ));

	// if ($userInsert) {
	// 	echo "OK, query valid.";
	// } else {
	// 	echo "Neko was not accepted into the database.";
	// }

	// if (!$user->count()) {
	// 	echo "No user";
	// } else {
	// 	foreach ($user->result() as $user) {
	// 		echo $user->username, ', is a stupid cunt. This is his password : ' . $user->password . '<br>';
	// 	}
	// }

	if (Input::exists()) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username'	=> array(
				'required'	=> true,
				'min'		=> 2,
				'max'		=> 20,
				'unique'	=> 'users'
			),
			'password'		=> array(
				'required'	=> true,
				'min'		=> 6
			),
			'password_again'	=> array(
				'required'	=> true,
				'matches'	=> 'password'
			),
			'mail'			=> array(
				'required'	=> true,
				'min'		=> 6,
				'max'		=> 50
			)
		));

		if ($validation->passed()) {
			$user = new User();
			$salt = Hash::salt(32);

			try {

				$user->create(array(
					'username' 	=> Input::get('username') ,
					'password' 	=> Hash::make(Input::get('password'), $salt),
					'salt' 		=> $salt,
					'mail' 		=> Input::get('mail'),
					'joined' 	=> date('Y-m-d H:i:s'),
					'group' 	=>  1
				));

				Session::flash('home', 'You have been registered and can now log in');
				Redirect::to('index.php');
			} catch(Exception $e) {
				die($e->getMessage());
			}
		} else {
			$allerrors = "";
			foreach ($validation->errors() as $error) {
				$allErrors .= $error . "<br>";
			}
			Session::flash('home', $allErrors);
			Redirect::to('index.php');
		}
	}

