<?php 
/**
* Redirect
*/
class Redirect
{
	public static function to($location = null) {
		if ($location) {
			// Force redirection to http code 
			if (is_numeric($location)) {
				switch ($location) {
					case 404:
						header('HTTP/1.0 404 Not Found');
						include '404.html';
						exit();
						break;
				}
			}
		}
			header('Location: ' . $location);
			exit();
	}
}