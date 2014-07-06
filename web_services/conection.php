<?php

require_once 'constants.php';

class Connection
{

	public function connect()
	{
		$link = mysqli_connect(HOST, USER, PASS) or die ('there is no connection');
		mysqli_select_db($link, DB) or die ('there is no selected database');
		return $link;
	}

	public static function test()
	{
		$link = $this->connect();
		$sql = "select login from user";
		$result = mysqli_query($link, $sql) or die ('query did not success');
		return $result;
	}
}
