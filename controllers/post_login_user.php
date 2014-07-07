<?
session_start();
error_reporting(E_ALL);


$data = array('user' => $_POST['user'], 'pass' => $_POST['password']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json"));
curl_setopt($ch, CURLOPT_URL, "http://localhost/jaguarlabs/login_access_token/web_services/post_login_user.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
$responseInfo = curl_getinfo($ch);

if($responseInfo["http_code"] == 200)
{
	echo "The request is done";
}
else
{
	echo "There is an error at insert users";
}

echo json_decode($response);

//header('Location: ../index');
