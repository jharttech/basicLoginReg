<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>User Records</title>
<link rel="stylesheet" media="screen and (min-width: 600px)" href="./css/style/css" />
<link rel="stylesheet" media="screen (max-width: 599px)" href="./css/mstyle.css" />
</head>
<body>
<?php

//This will connect admin user to DB and show registered users.

include ('db.php');
require ('auth.php');
$view="SELECT * FROM users";
$result=mysqli_query($con,$view);
echo "<p><b>All Users</b>";
echo "<table border='1' cellpadding='10'>";
	echo "<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Email</th>
	</tr>";

//This will loop through database records, displaying them in the table

while($row=mysqli_fetch_array($result)){
	echo "<tr>";
	echo '<td>' . $row['id'] . '</td>';
	echo '<td>' . $row['username'] . '</td>';
	echo '<td>' . $row['email'] . '</td>';
	echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
	echo '<td><a href="delete.php?id' . $row['id'] . '">Delete</a></td>';
	echo "</tr>";
}

echo "</table>"
?>
<p><a href="new.php">Add a new user</a></p>
</body>
</html>



