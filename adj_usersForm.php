<!DOCTYPE html>
<html>
<head>
<meta name="utf-8">
<meta name="viewport" content="width+device-width,initial-scale=1.0">
<title>Users Info</title>
<link rel="stylesheet" media="screen and (min-width: 600px)" href="./css/style.css" />
<link rel="stylesheet" media="screen and (max-width: 599px)" href="./css/mstyle.css" />
</head>
<body>
<?php

//This will connect admin user to DB and show registered users.

include ('db.php');
require ('auth.php');
$view="SELECT * FROM users";
$result=mysqli_query($con,$view);
echo "<h1>All Users</h1>";
echo "<table id='form-contents'>";
	echo "<tr id='head'>
		<th>ID</th>
		<th>Username</th>
		<th>Email</th>
	</tr>";

//This will loop through database records, displaying them in the table

while($row=mysqli_fetch_array($result)){
	echo "<tr>";
	echo '<td id="user">' . $row['id'] . '</td>';
	echo '<td id="user">' . $row['username'] . '</td>';
	echo '<td id="user">' . $row['email'] . '</td>';
	echo '<td><form id="small" action="" method="post" name="edituser"><input id="small" type="submit" name="'. $row['id'] . '" value="Edit" /></td>';
	echo '<td><input id="small" type="submit" name="'. $row['username'] . '" value="Delete" /></td></form>';
	if(($_POST[$row['id']])){
		header("Location: editUser.php?id=$row[id]");
	}elseif(($_POST[$row['username']])){
		header("Location: deleteUser.php?id=$row[id]");};}
	echo "</tr>";
	echo "</table>";

?>
<form id="small"  action="" method="post" name="nav">
<input id="small" type="submit" name="addNew" value="Add New User" />
<input id="small" type="submit" name="adminP" value="Admin Page" />
<?php if(($_POST['addNew'])){
	header("Location: newUser.php");
	}elseif(($_POST['adminP'])){
		header("Location: a_index.php");} ?>
</body>
</html>



