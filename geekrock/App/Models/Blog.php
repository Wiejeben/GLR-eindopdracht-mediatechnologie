<?php namespace App\Models;

use App\Services\DB;

class Blog
{
	// Define the table for this model
	public static $table = 'posts';

	/**
	* Get all resources
	*/
	public static function all()
	{
		$db = DB::prepare('SELECT * FROM `' . self::$table . '` ORDER BY `created_at` DESC');
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
		$body = $input['body'];
		$created_at = date('Y-m-d H:i:s', strtotime('now'));

		// Insert user
		$user = DB::prepare('INSERT INTO `' . self::$table . '` (`title`, `body`, `created_at`) VALUES(?, ?, ?)');
		
		$insert = $user->execute([
			$title,
			$body,
			$created_at,
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
		$body = $input['body'];

		// Insert user
		$user = DB::prepare('UPDATE `' . self::$table . '` SET `title` = ?, `body` = ? WHERE `id` = ?');
		
		$insert = $user->execute([
			$title,
			$body,
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