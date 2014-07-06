<?php
session_start();

if (isset($_POST['user'])) {
	$_SESSION['user'] = $_POST['user'];
}

if(!isset($_SESSION['user']))
{
	header('Location: login');
}
?>

<html>
<head>
	<title>Main Menu</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<section class="container">
		<section class="col-lg-4">
			<p class="text-info">Logged: <?= $_SESSION['user'] ?></p>
		</section>

		<section class="col-lg-4">
		<h2 class="text-info">Main Menu</h2>
		<nav class="nav">
			<ul>
				<li><a href="users">List of Users</a></li>
				<li><a href="user">Add new User</a></li>
			</ul>
		</nav>
		</section>

		<section class="col-lg-4"></section>
	</section>
</body>
</html>