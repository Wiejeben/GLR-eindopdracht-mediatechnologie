<?php namespace App\Services;

use App\Controllers\PageController;

/**
* Points a page to the correct code
*/
class Route
{
	/**
	* Load route when sending a GET request
	*/
	public static function get($location, $options, $requirements = [])
	{
		return self::all($location, $options, $requirements, 'GET');
	}

	/**
	* Load route when sending a POST request
	*/
	public static function post($location, $options, $requirements = [])
	{
		return self::all($location, $options, $requirements, 'POST');	
	}

	/**
	* Main route method, checks is route is relevant etc.
	*/
	public static function all($location, $options, $requirements = [], $method = '')
	{

		// Prevent this feature from Lararal Routes
		if(gettype($options) == 'object')
		{
			die('Route <u>' . $location . '</u> not supported.');
		}

		// Check if we are on the correct method
		if(!empty($method))
		{
			if($_SERVER['REQUEST_METHOD'] !== $method) return false;
		}

		// Cleanup location and PATH_INFO
		$location = trim($location, '/');
		$pathInfo = (isset($_SERVER['PATH_INFO'])) ? trim($_SERVER['PATH_INFO'], '/') : '' ;
		$params = [];

		// Check if location contains a variable
		if(strstr($location, '{'))
		{
			$locationArray = explode('/', $location);
			$pathInfoArray = explode('/', $pathInfo);

			// Check if there are the same amount of array items
			if(count($locationArray) != count($pathInfoArray))
			{
				return false;
			}

			foreach($locationArray as $i => $key)
			{
				// Check if current array item has a variable character in it
				if(strstr($key, '{'))
				{
					$params[substr($key, 1, -1)] = $pathInfoArray[$i];
				}
				elseif($key != $pathInfoArray[$i])
				{
					return false;
				}
			}
		}
		else
		{
			// Check if PATH_INFO equals to location
			if($location != $pathInfo) return false;
		}

		// Check if client has permission to execute page
		if(isset($requirements['auth']))
		{
			if(!Auth::access($requirements['auth']))
			{
				// Call 403 error page
				$pageController = new PageController();
				$pageController->error_403();
				
				return false;
			}
		}

		// Get class and method from string
		$options = explode('@', $options);
		$classname = 'App\Controllers\\' . $options[0];

		// Init class and method
		$obj = new $classname;
		echo call_user_func_array([$obj, $options[1]], $params);

		return true;
	}
}