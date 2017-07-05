<?php namespace App\Models;

use App\Services\DB;

class Event
{
	// Define the table for this model
	public static $table = 'events';

	/**
	* Get all resources
	*/
	public static function all()
	{
		$db = DB::prepare('SELECT * FROM `' . self::$table . '` ORDER BY `ticket_id` ASC, `time` ASC');
		$db->execute();

		// Return array with objects
		return $db->fetchAll(\PDO::FETCH_OBJ);
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

	/**
	* Insert a resource
	*/
	public static function insert($input)
	{
		$title = $input['title'];
		$artist = $input['artist'];
		$ticket_id = $input['ticket_id'];
		$time = $input['time'];
		$description = $input['description'];

		// Insert user
		$user = DB::prepare('INSERT INTO `' . self::$table . '` (`title`, `artist`, `description`, `ticket_id`, `time`) VALUES(?, ?, ?, ?, ?)');
		
		$insert = $user->execute([
			$title,
			$artist,
			$description,
			$ticket_id,
			$time,
		]);

		if($insert)
		{
			return true;
		}
		
		return false;
	}

	/**
	* Insert a resource
	*/
	public static function update($input, $id)
	{
		$title = $input['title'];
		$artist = $input['artist'];
		$ticket_id = $input['ticket_id'];
		$time = $input['time'];
		$description = $input['description'];

		// Insert user
		$user = DB::prepare('UPDATE `' . self::$table . '` SET `title` = ?, `artist` = ?, `description` = ?, `ticket_id` = ?, `time` = ? WHERE `id` = ?');
		
		$insert = $user->execute([
			$title,
			$artist,
			$description,
			$ticket_id,
			$time,
			$id,
		]);

		if($insert)
		{
			return true;
		}
		
		return false;
	}

	/**
	* Destroy resource
	*/
	public function destroy($id)
	{
		$db = DB::prepare('DELETE FROM `' . self::$table . '` WHERE `id` = ?');
		
		return $db->execute([$id]);
	}
}