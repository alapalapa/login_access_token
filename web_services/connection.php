<?php

require_once 'constants.php';

class Connection
{

	public static function connect()
	{
		$link = mysqli_connect(HOST, USER, PASS) or die ('there is no connection');
		mysqli_select_db($link, DB) or die ('there is no selected database');

		return $link;
	}

	public static function test()
	{
		$con = Connection::connect();
		$sql = "select * from user";
		$result = mysqli_query($con, $sql) or die ('query did not success');
		$result = mysqli_fetch_assoc($result);
		
		return $result;
	}
}
