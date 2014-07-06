<?php

header('Content-type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

$data = file_get_contents("php://input");
$user = $data['user'];
echo json_encode($user);

//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
//header("Accept: application/json");
//header("Access-Control-Allow-Origin: *");
//header("Authorization: xxx");
//header("Content-type: application/json");

