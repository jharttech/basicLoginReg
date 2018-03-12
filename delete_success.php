<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>Delete Successfull</title>
		<link rel="stylesheet" media="screen and (min-width: 600px)" href="./css/style.css" />
		<link rel="stylesheet" media="screen and (max-width: 599px)" href="./css/mstyle.css" />
	</head>
	<body>
		<div>
			<h3>User has been successfully removed.</h3>
			<form id="small" action="" method="post" name="delsuc">
			<input id="small" type="submit" name="adminp" value="Admin Page" />
			<?php if(($_POST['adminp'])){
					header("Location: a_index.php");} ?>
		</div>
	</body>
</html>
