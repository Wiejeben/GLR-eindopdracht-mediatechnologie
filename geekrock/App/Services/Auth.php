<?php namespace App\Services;

class Auth
{
	/**
	* Attempt loggin in
	*/
	public static function attempt($email, $password)
	{
		$db = DB::prepare("SELECT * FROM `users` WHERE `email` = ?");
		$db->execute([$email]);

		if($db->rowCount() > 0)
		{
			$result = $db->fetch(\PDO::FETCH_OBJ);

			// Check if password is correct
			if(Hash::check($password, $result->password))
			{
				// Check if mail has been validated
				if(empty($result->email_validation))
				{
					// Set user sessions
					Session::set('user_id', $result->id);
					Session::set('email', $result->email);
					Session::set('name', $result->name);
					Session::set('admin', $result->admin);

					return true;
				}
				else
				{
					return 'Uw account is nog niet geactiveerd';
				}
			}
		}
		
		return 'Incorrecte gebruikersnaam/wachtwoord combinatie.';
	}

	/**
	* Register a new user
	*/
	public static function create($options)
	{

		// Set variables and generate password + email validation
		$email = $options['email'];
		$password = Hash::make($options['password']);
		$email_validation = md5($password);
		$name = $options['name'];
		$city = $options['city'];
		$street = $options['street'];
		$zipcode = $options['zipcode'];

		// Check if email wasn't already taken
		$mailCheck = DB::prepare("SELECT * FROM `users` WHERE `email` = ?");
		$mailCheck->execute([$email]);

		if($mailCheck->rowCount() != 0) return 'Gebruiker bestaat al';

		// Insert user
		$user = DB::prepare("INSERT INTO `users` (`email`, `password`, `email_validation`, `name`, `city`, `street`, `zipcode`) VALUES(?, ?, ?, ?, ?, ?, ?)");
		
		$insert = $user->execute([
			$email,
			$password,
			$email_validation,
			$name,
			$city,
			$street,
			$zipcode
		]);

		if($insert)
		{
			// Send validation mail
			$url = url('auth/activate/' . $email .  '/' . $email_validation);
			$message = '
				Beste ' . $name . ',<br />
				<br />
				Welkom bij GeekRock, klik op de onderstaande link om uw account te activeren:<br />
				<a href="' . $url . '">' . $url . '</a><br />
				<br />
				Met vriendelijke groet,<br />
				GeekRock 2014
			';

			Mail::send($email, 'Activeer uw GeekRock account.', $message);

			return true;
		}

		return false;
	}

	/**
	* Activate user
	*/
	public static function activate($email, $key)
	{
		$db = DB::prepare("UPDATE `users` SET `email_validation` = NULL WHERE `email` = ? AND `email_validation` = ?");
		$db->execute([$email, $key]);

		if($db->rowCount() == 1)
		{

			return true;
		}

		return false;
	}

	public static function access($role = '')
	{
		if($role == 'admin')
		{
			// dd(Session::get('admin'));
			if(Session::get('admin'))
			{
				return true;
			}
		}
		else
		{
			if(Session::get('user_id'))
			{
				return true;
			}
		}

		return false;
	}
}