<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>User Info Update Successfull</title>
		<link rel="stylesheet" media="screen and (min-width: 600px)" href="./css/style.css" />
		<link rel="stylesheet" media="screen and (max-width: 599px)" href="./css/mstyle.css">
	</head>
	<body>
		<div class="form">
			<h3>User information updated successfully.</h3>
			<form id="small" action="" method="post" name="success">
				<input id="small" type="submit" name="users" value="Users" />
				<input id="small" type="submit" name="admin" value="Admin Page" />
				<?php if(($_POST['users'])){
						 header("Location: adj_users.php");
						 }elseif(($_POST['admin'])){
						 	header("Location: a_index.php");} ?>
			</form>
		</div>
	</body>
</html>

