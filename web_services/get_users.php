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

class Get_users
{
	public function get_all_users()
	{
		$con = Connection::connect();
		$query = "SELECT * FROM user";
		$result = mysqli_query($con, $query) or die ('query did not success');

		while($data = mysqli_fetch_assoc($result)){
			$rows = $data;
		}
		$this->send_data($rows);
	}

	public function send_data($data)
	{

		echo json_encode($data);
	}
}

$obj = new Get_users;
$obj->get_all_users();
