<?php 

/**
* Session
*/
class Session
{
		// Check if session exist
	public static function exists($name) {
		return (isset($_SESSION[$name])) ? true : false;
	}
		// Create session & add content to it
	public static function put($name, $value)
	{
		return $_SESSION[$name] = $value;
	}
		// Get Session
	public static function get($name) {
		return $_SESSION[$name];
	}
		// delete session
	public static function delete($name) {
		if (self::exists($name)) {
			unset($_SESSION[$name]);
		}
	}
		// Flash text to the user, destroyed on reload
	public static function flash($name, $string ='') {
			// If name exist return session content
		if (self::exists($name)) {
			$session = self::get($name);
			self::delete($name);
			return $session;
		} else {
				// Create Session 
			self::put($name, $string);
		}
		return '';
	}
}
