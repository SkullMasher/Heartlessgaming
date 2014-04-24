<?php 
session_start();

$GLOBALS['config'] = array(
	'mysql' 	=> array(
			// DB location
		'host'		=> '127.0.0.1',
			// DB username
		'username'	=> 'stuff',
			// Db password
		'password'	=> 'stuff',
			// DB name
		'db'		=> 'stuff'
	),
		// login remember
	'remember'	=> array(
			'cookie_name'	=> 'hash',
			// Cookie expiration in seconds, 604800 = 1 month
		'cookie_expiry'=> 604800	
	),
	'session'	=> array(
		'session_name'	=> 'user',
		'token_name'	=> 'token'
	),
	'ftp'		=> array(
		'mysql'		=> array(
			'username'	=> 'stuff',
			'password'	=> 'stuff',
			'db'		=> 'stuff'
		),
	),
);

spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});

require_once 'function/sanitize.php';

		// User asked to be remembered
	if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
		$hash = Cookie::get(Config::get('remember/cookie_name'));
		$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
		if ($hashCheck->count()) {
			$user = new User($hashCheck->first()->user_id);
			$user->login();
		}
	}
