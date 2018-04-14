<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>User Added Success</title>
		<link rel="stylesheet" media="screen and (min-width: 600px)" href="./css/style.css" />
		<link rel="stylesheet" media="screen and (max-width: 599px)" href="./css/mstyle.css">
	</head>
	<body>
		<div class="form">
			<h3>User Has been successfully registered.</h3>
			<form id="small" action="" method="post" name="new">
			<input id="small" type="submit" name="new" value="Users" />
			<?php if(($_POST['new'])){
					header("Location: adj_users.php");} ?>
			</form>
		</div>
	</body>
</html>

