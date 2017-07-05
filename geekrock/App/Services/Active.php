<?php namespace App\Services;

class Active
{
	/**
	* Check if given url equals to the current URL
	*/
	public static function url($url = NULL)
	{
		// Check if we are on the front-page
		if($_SERVER['REQUEST_URI'] == '/')
		{
			$current = 'http://' . $_SERVER['HTTP_HOST'];
		}
		else
		{
			$current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		}

		if(url($url) == $current || $url == NULL && substr(trim($_SERVER['ORIG_PATH_INFO'], '/'), -10) == '/index.php')
		{
			return 'active';
		}

		
		return false;
	}
}