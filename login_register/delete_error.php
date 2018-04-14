<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>Delete Error</title>
		<link rel="stylesheet" media="screen and (min-width: 600px)" href="./css/style.css" />
		<link rel="stylesheet" media="screen and (max-width: 599px)" href="./css/mstyle.css">
	</head>
	<body>
			<div>
				<h3>You cannot delete this account, it is the admin account.</h3>
				<form id="small" action="" method="post" name="userpage">
				<input id="small" type="submit" name="userP" value="Users Page" />
				<?php if(($_POST['userP'])){
					header("Location: adj_users.php");} ?>
				</form>
			</div>
	</body>
</html>
