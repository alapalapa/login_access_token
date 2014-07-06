<?php
session_start();

if(!isset($_SESSION['user']))
{
	header('Location: login');
}

echo "this could not see without login";

?>