<?php namespace App\Services;

class Session
{
	/**
	* Check if session exists
	*/
	public static function has($key)
	{
		return isset($_SESSION['flash'][$key]);
	}

	/**
	* Set session entity
	*/
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
		return true;
	}

	/**
	* Get session if it exists
	*/
	public static function get($key)
	{
		return (isset($_SESSION[$key])) ? $_SESSION[$key] : false ;
	}

	/**
	* Create a flash message or flash and destroy
	*/
	public static function flash($key, $value = NULL)
	{
		// Check if the flash array was init
		if(!isset($_SESSION['flash']))
		{
			$_SESSION['flash'] = [];
		}

		// Set session
		if(!empty($value))
		{
			$_SESSION['flash'] = [
				$key => $value
			];

			return true;
		}

		// Get message
		// Check if it exists
		if(!isset($_SESSION['flash'][$key])) return false;

		$flash = $_SESSION['flash'][$key];

		// Remove message
		$_SESSION['flash'][$key] = NULL;

		// Return message
		return $flash;
	}

	/**
	* Flush all sessions
	*/
	public static function flush()
	{
		// Delete all sessions
		session_destroy();
		session_start();
	}
}