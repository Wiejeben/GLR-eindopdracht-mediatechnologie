<?php namespace App\Services;

class Hash
{
	/**
	* Generate BCRYPT hash
	*/
	public static function make($password, $cost = 10)
	{
		return password_hash($password, PASSWORD_DEFAULT, ['cost' => $cost]);
	}

	/**
	* Check if hash is valid
	*/
	public static function check($password, $hash)
	{
		return password_verify($password, $hash);
	}
}