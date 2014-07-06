<?php
include 'web_service.php';
//Obtiene el contenido de la solicitud POST
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : ''; 
 
//Instancia de la clase JSON_WebService
$server = new JSON_WebService($HTTP_RAW_POST_DATA);
 
//Registra los metodos del servicio web
$server->register("getServerTime");
$server->register("sayHello");
 
//Inicializa el servicio
$server->start();
 
//Define los metodos del servicio web
function getServerTime($format)
{
     return date($format);
}
 
function sayHello($yourname)
{
     return "Hello ".$yourname."!";
}
?>