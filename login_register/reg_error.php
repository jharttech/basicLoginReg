<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>Registration Error</title>
		<link rel="stylesheet" media="screen and (min-width: 600px)" href="./css/style.css" />
		<link rel="stylesheet" media="screen and (max-width: 599px)" href="./css/mstyle.css">
	</head>
	<body>
		<div>
			<h3>Username already exists.  Please try a different Username.</h3>
			<form action="" method="post" name="singleLog">
			<input type="submit" name="singlelog" value="Login" />
			<?php if(($_POST['singlelog'])){
				header("Location: singleLogin.php");} ?>
			<form action="" method="post" name="singleReg">
			<input type="submit" name="singleReg" value="Register" />
			<?php if(($_POST['singleReg'])){
				header("Location: singlereg.php");} ?>
		</div>
	</body>
</html>
