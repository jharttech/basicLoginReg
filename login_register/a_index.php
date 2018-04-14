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
				<tr>
					<td>
						<form action="" method="post" name="editUsers">
						<input type="submit" name="edituser" value="Edit Users" />
						<?php if(($_POST['edituser'])){
							header("Location: adj_users.php");} ?>
						</form>
					</td>
				</tr>
				<tr>
					<td>
						<form action="" method="post" name="docs">
						<input type="submit" name="docOnline" value="Online Documentation" />
						<?php if(($_POST['docOnline'])){
							header("Location: docs.php");} ?>
						</form>
					</td>
				</tr>
				<tr>
					<td>
						<form action="" method="post" name="logout">
						<input type="submit" name="logout" value="Logout" />
						<?php if(($_POST['logout'])){
							header("Location: logout.php");} ?>
						</form>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
