<?
session_start();
error_reporting(E_ALL);

if(!isset($_SESSION['user']))
{
	header('Location: login');
}
?>
<html>
<head>
	<title>List of users</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

		<?php

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json"));
		curl_setopt($ch, CURLOPT_URL, "http://localhost/jaguarlabs/login_access_token/web_services/get_users.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

		$response = curl_exec($ch);
		$responseInfo = curl_getinfo($ch);

		?>
		<section class="container">
			<section class="col-lg-12">
				<?php
				if($responseInfo["http_code"] == 200)
				{
				    ?> <h3 class="text-info">List of users</h3> <?
				}
				else
				{
				    ?> <h3>There is an error searching users</h3> <?
				}
				?>
				<table class="table table-bordered table-striped table-hover">
				<tr>
					<th>id</th>
					<th>Login name</th>
					<th>Password</th>
					<th>Birthday</th>
					<th>Json string</th>
				</tr>
				<? $info = json_decode($response); ?>

				<? foreach ($info as $user): ?>

						<td><?= $user ?></td>	<!-- error for being checked -->

				<? endforeach; ?>
				</table>
			</section>
	</section>
</body>
</html>
