<?php

class DB
{
	const USER = "artemka";
	const PASS = "nT9p5iWk7OqyP2Ju";
	const HOST = "localhost";
	const DB = "weathersite";
	
	public static function connToDB()
	{
		$user = self::USER;
		$pass = self::PASS;
		$host = self::HOST;
		$db = self::DB;
		$conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
		return $conn;
	}
}
?>