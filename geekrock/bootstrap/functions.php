<?php

/**
* Escape string
*/
function e($input) {
	return htmlentities($input);
}

/**
* Dump variables and die
*/
function dd($input) {
	echo '<pre>';
	print_r($input);
	echo '</pre>';

	die();
}

/**
* Generate url with HTTP://
*/
function url($url = '')
{
	if(!empty($url))
	{
		// Cleanup input URL
		$url = trim($url, '/');

		return trim('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '/' . $url, '/');
	}

	return trim('http://' . $_SERVER['HTTP_HOST'] .  trim($_SERVER['SCRIPT_NAME'], 'index.php') . $url, '/');
}