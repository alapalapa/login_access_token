<?php
session_start();

$token = $_SESSION['token'] = md5(uniqid());

?>
<html>
	<head>
		<title>Haz Login</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
	</head>
<body class="container">
	<div class="col-lg-4"></div>

	<div class="col-lg-4" id="form">
		<form method="POST" action="index">
			<div>
				<input type="text" name="user" placeholder="User Here!" class="form-control" required>
			</div>
			<div>
				<input type="password" name="password" placeholder="Password Here" class="form-control" required>
			</div>
				<input type="hidden" name="token" value="<?= $token ?>">
			<button type="submit" class="btn btn-info" id="submit">Send</button>
		</form>
	</div>

	<div class="col-lg-4"></div>
</body>
