<?php
error_reporting(E_ALL);

require_once 'connection.php';

header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("charset=utf-8");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
//header("Accept: application/json");
//header("Access-Control-Allow-Origin: *");
//header("Authorization: xxx");
//header("Content-type: application/json");

class Validate_user
{
	private $data;
	private $test;

	public function __construct()
	{
		$this->data = json_decode(file_get_contents("php://input"));
	}

	public function validate()
	{
		$this->test = Connection::test();
		$this->send_data();
	}

	public function send_data()
	{
		//echo $this->data->user;

		echo json_encode($this->test);
	}
}

$obj = new validate_user;
$obj->validate();
