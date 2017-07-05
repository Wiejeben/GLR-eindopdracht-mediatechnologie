<?php namespace App\Services;

class Redirect
{
	/**
	* Redirect page
	*/
	public static function to($location, $code = 302)
	{
		// Set response code to temporary redirect
		http_response_code($code);
		header('Location: ' . $location);
		die();
	}
}
