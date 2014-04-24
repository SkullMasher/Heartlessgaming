<?php
/*
*	Get config project easily
*/

class Config
{
	public static function get($path = null) {
		if ($path) {
			$config = $GLOBALS['config'];
			$path = explode('/', $path); // formatting
				// Loop to check if every params of the $GLOBALS exist, child include
			foreach ($path as $bit) {
				if (isset($config[$bit])) {
					$config = $config[$bit]; // if the first $GLOBALS var exist config = that $GLOBALS variable
				}
			}

			return $config;
		}
		return false;
	}
}
