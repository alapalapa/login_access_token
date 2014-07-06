<?php
session_start();
error_reporting(E_ALL);

if(!isset($_SESSION['user']))
{
	header('Location: login');
}
?>
<html>
	<head>
		<title>User Insert</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
	</head>
<body class="container">
	<div class="col-lg-4"></div>

	<div class="col-lg-4" id="form">
		<form method="POST" action="users">
			<div>
				<input type="text" name="name" placeholder="Name" class="form-control" required>
			</div>
			<div>
				<input type="text" name="lastname" placeholder="Last Name" class="form-control" required>
			</div>
			<div>
				<input type="text" name="user" placeholder="Login Name" class="form-control" required>
			</div>
			<div>
				<input type="password" name="password" placeholder="Password" class="form-control" required>
			</div>
			<div>
				<input type="date" name="birthday" class="form-control" required>
			</div>
				<input type="hidden" name="token" value="<?= $token ?>">
			<button type="submit" class="btn btn-info" id="submit">Send</button>
		</form>
	</div>

	<div class="col-lg-4"></div>
</body>