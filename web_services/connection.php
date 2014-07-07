<?php

require_once 'constants.php';

class Connection
{

	public static function connect()
	{
		$link = mysqli_connect(HOST, USER, PASS) or die ('There is no connection');
		mysqli_select_db($link, DB) or die ('There is no selected database');

		return $link;
	}

}
