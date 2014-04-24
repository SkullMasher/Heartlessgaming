<?php require_once 'core/init.php';
/*
	Check login page
		Javascript is not enought 
*/
	if (Input::exists()) {
		if (Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username' => array(
					'required' => true
				),
				'password' => array(
					'required' => true
				)
			));

			if ($validation->passed()) {
				$user = new User();
				$remember = (Input::get('remember') === 'on' ? true : false);
				$login = $user->login(Input::get('username'), Input::get('password'), $remember);				
				if ($login) {
					Session::flash('home', 'Vous etes maintenant Connecté.');
					Redirect::to('index.php');
				} else {
					Session::flash('home', 'Login ou Password incorecte.');
					Redirect::to('index.php');
				}
			} else {
					Session::flash('home', 'Veuillez remplir les champs');
					Redirect::to('index.php');
			}
		}
	}
