<?php namespace App\Models;

use App\Services\DB;
use App\Services\Session;

class Ticket
{
	// Define the table for this model
	public static $table = 'tickets';

	/**
	* Get all resources
	*/
	public static function all()
	{
		$db = DB::prepare('SELECT * FROM `' . self::$table . '` ORDER BY `id` ASC');
		$db->execute();

		// Return array with objects
		return $db->fetchAll(\PDO::FETCH_OBJ);
	}

	/**
	* Insert a ticket registration
	*/
	public static function reserve($ticket_id, $user_id = NULL)
	{
		// Auto detect user ID
		$user_id = ($user_id == NULL) ? Session::get('user_id') : $user_id ;

		// Check if email wasn't already taken
		if(!self::hasTicket($ticket_id, $user_id))
		{
			// Register ticket
			$user = DB::prepare('INSERT INTO `user_ticket` (`user_id`, `ticket_id`) VALUES(?, ?)');
			
			$insert = $user->execute([
				$user_id,
				$ticket_id,
			]);

			if($insert)
			{
				return true;
			}
		}
		
		return false;
	}

	/**
	* Does the user already this a ticket?
	*/
	public static function hasTicket($ticket_id, $user_id = NULL)
	{
		// Auto detect user ID
		$user_id = ($user_id == NULL) ? Session::get('user_id') : $user_id ;

		// Check if email wasn't already taken
		$db = DB::prepare("SELECT * FROM `user_ticket` WHERE `user_id` = ? AND `ticket_id` = ?");
		$db->execute([$user_id, $ticket_id]);

		if($db->rowCount() == 0)
		{
			return false;
		}
		
		return true;
	}

	/**
	* Get all resources
	*/
	public static function find($id)
	{
		$db = DB::prepare('SELECT * FROM `' . self::$table . '` WHERE `id` = ?');
		$db->execute([$id]);

		// Return object
		return $db->fetch(\PDO::FETCH_OBJ);
	}

	// /**
	// * Insert a resource
	// */
	// public static function insert($input)
	// {
	// 	$title = $input['title'];
	// 	$artist = $input['artist'];
	// 	$ticket_id = $input['ticket_id'];
	// 	$time = $input['time'];
	// 	$description = $input['description'];

	// 	// Insert user
	// 	$user = DB::prepare('INSERT INTO `' . self::$table . '` (`title`, `artist`, `description`, `ticket_id`, `time`) VALUES(?, ?, ?, ?, ?)');
		
	// 	$insert = $user->execute([
	// 		$title,
	// 		$artist,
	// 		$description,
	// 		$ticket_id,
	// 		$time,
	// 	]);

	// 	if($insert)
	// 	{
	// 		return true;
	// 	}
		
	// 	return false;
	// }

	// /**
	// * Insert a resource
	// */
	// public static function update($input, $id)
	// {
	// 	$title = $input['title'];
	// 	$artist = $input['artist'];
	// 	$ticket_id = $input['ticket_id'];
	// 	$time = $input['time'];
	// 	$description = $input['description'];

	// 	// Insert user
	// 	$user = DB::prepare('UPDATE `' . self::$table . '` SET `title` = ?, `artist` = ?, `description` = ?, `ticket_id` = ?, `time` = ? WHERE `id` = ?');
		
	// 	$insert = $user->execute([
	// 		$title,
	// 		$artist,
	// 		$description,
	// 		$ticket_id,
	// 		$time,
	// 		$id,
	// 	]);

	// 	if($insert)
	// 	{
	// 		return true;
	// 	}
		
	// 	return false;
	// }

	// /**
	// * Destroy resource
	// */
	// public function destroy($id)
	// {
	// 	$db = DB::prepare('DELETE FROM `' . self::$table . '` WHERE `id` = ?');
		
	// 	return $db->execute([$id]);
	// }
}