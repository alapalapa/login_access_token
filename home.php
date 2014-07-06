<?
error_reporting(E_ALL);

$data = array('user' => $_POST['user'], 'pass' => $_POST['password'], 'token' => $_POST['token']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json"));
curl_setopt($ch, CURLOPT_URL, "http://localhost/jaguarlabs/login_access_token/web_services/post_validate_user.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
$responseInfo = curl_getinfo($ch);

if($responseInfo["http_code"] == 200)
{
    echo 'Peticion exitosa';
}
else
{
    echo 'Peticion fallida';
}

echo $response;
//$info =  json_decode($response);
//echo $info;
