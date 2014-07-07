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


class Insert_user
{

	public function __construct()
	{
		$data = json_decode(file_get_contents("php://input"));
		$login 	= $data->user;
		$pass 	= $this->encrypt($data->pass);
		$birthday = $data->birthday;

		$this->insert($login, $pass, $birthday);
	}

	private function encrypt($field)
	{
		$mcrypt_module = mcrypt_module_open('rijndael-256', '', 'ecb', '');
		//Defyning long of the key
		$long = mcrypt_create_iv(mcrypt_enc_get_iv_size($mcrypt_module), MCRYPT_DEV_RANDOM);
		$key_size = mcrypt_enc_get_key_size($mcrypt_module);
		//Creating keys
		$key = substr(md5('xy1z2vw45r7s96'), 0, $key_size);
		//Init crypt
		mcrypt_generic_init($mcrypt_module, $key, $long);
		//Crypting
		$encrypted = mcrypt_generic($mcrypt_module, $field);
		//Terminar el manejador de encriptacion
		mcrypt_module_close($mcrypt_module);

		return base64_encode($encrypted);
	}

	private function insert($login, $pass, $birthday)
	{
		$con = Connection::connect();
		$query = "INSERT INTO user (id,login,pass,birthday) VALUES (NULL,'$login','$pass','$birthday')";
		$result = mysqli_query($con, $query) or die("it didnt do the query");
		//$result = mysqli_fetch_assoc($result);

		//$this->send_data($result);
	}

	private function send_data($data)
	{
		echo json_encode($data);
	}
}


$obj = new Insert_user;