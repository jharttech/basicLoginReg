<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>Registration Successful</title>
		<link rel="stylesheet" media="screen and (min-width: 600px)" href="./css/style.css" />
		<link rel="stylesheet" media="screen and (max-width: 599px)" href="./css/mstyle.css">
	</head>
	<body>
		<div class="form">
			<h3>You have been registered successfully.</h3>
			<form id="small" action="" method="post" name="regsucc">
			<input id="small" type="submit" name="reg" value="Login" />
			<?php if(($_POST['reg'])){
					header("Location: singleLogin.php");} ?>
			</form>
		</div>
	</body>
</html>

