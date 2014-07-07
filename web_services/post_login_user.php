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

	public function __construct()
	{
		$data = json_decode(file_get_contents("php://input"));
		$user = $data->user;
		$pass = $data->pass;
		$this->validate($user, $pass);
	}

	public function validate($u, $p)
	{
		$con = Connection::test();
		$query = "SELECT * FROM user WHERE login = '$u' AND pass = '$p'";
		$result = mysqli_query($con, $query);
		$this->send_data();
	}

	public function send_data($status)
	{
		//echo $this->data->user;

		echo json_encode($this->test);
	}
}

$obj = new validate_user;
