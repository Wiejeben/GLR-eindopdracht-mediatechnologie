<?php namespace App\Services;

class Mail
{
	/**
	* Send mail with basic parameters
	*/
	public static function send($to, $subject = '', $message = '')
	{
		// Overwrite to email address because we (might) cannot mail external
		$to = ($GLOBALS['config']['mail']['to'] !== NULL) ? $GLOBALS['config']['mail']['to'] : $to ;

		// Set required headers
		$headers = '';
		$headers = 'From: noreply@geekrock.nl' . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$message = '
			<html>
			<head>
				<title>' . $subject . '</title>
			</head>
			<body>
				' . $message . '
			</body>
			</html>
		';

		return mail($to, $subject, $message, $headers);
	}
}