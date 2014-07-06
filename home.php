<?

$data = array('user' => $_POST['user'], 'pass' => $_POST['password'], 'token' => $_POST['token']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json"));
curl_setopt($ch, CURLOPT_URL, "http://localhost/jaguarlabs/login_access_token/web_services/user.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$resposeText = curl_exec($ch);
$resposeInfo = curl_getinfo($ch);

if($resposeInfo["http_code"] == 200)
{
    echo 'Peticion exitosa';
}
else
{
    echo 'Peticion fallida';
}

echo $resposeText;