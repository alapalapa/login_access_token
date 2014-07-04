<?php
session_start();

if(!isset($_SESSION['user']))
{
	header('Location: login');
}

echo "Esto no se puede ver sin login";

?>