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
	echo '<td id="edit"><a id="edit" href="editUser.php?id=' . $row['id'] . '">Edit</a></td>';
	echo '<td id="edit"><a id="edit" href="deleteUser.php?id=' . $row['id'] . '">Delete</a></td>';
	echo "</tr>";
}

echo "</table>"
?>
<p></br></br><a id="edit" href="newUser.php">Add a new user</a></p></br>
<p><a id="edit" href="a_index.php">Admin Page</a></p>
</body>
</html>



