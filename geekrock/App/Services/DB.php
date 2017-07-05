<?php namespace App\Services;

class DB
{

	private static $instance = NULL;

	private function __construct() {}

	/**
	* Prevent double instances
	*/
	public static function getInstance()
	{
		// Check if instance was already created
		if(!self::$instance)
		{
			// Load settings from global array
			$settings = $GLOBALS['config']['database'];

			// Create PDO connect string
			$connect_string = 'mysql:dbname=' . $settings['db'] . ';host=' . $settings['host'];

			try {
				// Init PDO connection
				return new \PDO($connect_string, $settings['username'], $settings['password']);	
			}
			catch (PDOException $e)
			{
				// Output error and end execution
				die('Database connection failed: ' . $e->getMessage());
			}
		}

		return self::$instance;
	}

	/**
	* Simple query to database
	*/
	public static function query($query)
	{
		return self::getInstance()->query($query);
	}

	/**
	* Advantage query to database with value inputs
	*/
	public static function prepare($query)
	{
		return self::getInstance()->prepare($query);
	}
}