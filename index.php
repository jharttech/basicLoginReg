<?php
//Include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>Welcome Home</title>
		<link rel="stylesheet" media="screen and (min-width: 600px)" href="css/style.css" />
		<link rel="stylesheet" media="screen and (max-width: 599px)" href="css/mstyle.css" />
	</head>
	<body>
		<div class="form">
			<h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
			<h2>What would you like to do?</h2>
			<table id="form-contents">
				<tr id="indexr">
					<td id="index">
						<form action="" method="post" name="documents">
						<input type="submit" name="docu" value="Online Documentation" />
						<?php if(($_POST['docu'])){
							header("Location: doc.php");} ?>
					</td>
				</tr>
				<tr id="indexr">
					<td id="index">
						<form action="" method="post" name="logout">
						<input type="submit" name="logout" value="Logout" />
						<?php if(($_POST['logout'])){
							header("Location: logout.php");} ?>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
