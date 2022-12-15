<?php

require 'koneksi.php';


$login = new Login();
if (isset($_SESSION['username'])) {
	header("Location: DataMhs.php");
}

if (isset($_POST['submit'])) {
	$result = $login->login($_POST["email"], md5($_POST['password']));
	if ($result == 1) {
		$_SESSION["login"] = true;
		$_SESSION["id"] = $login->idUser();

		header("Location: DataMhs.php");
	} else if ($result == 2) {
		echo
		"<script> alert('Wrong Password or Email'); </script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="/Tugas7/style/style.css">

	<title>Login</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a></p>
		</form>
	</div>
</body>

</html>