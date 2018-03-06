<?php

//This will connect admin user to DB and show registered users.

include ('db.php');
require ('auth.php');
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] <> "10"){
$id=$_GET['id'];
$view="SELECT * FROM users WHERE id=$id";
$result=mysqli_query($con,$view);
echo "<h1>User to Edit</h1>";
echo "<table id='form-contents'>";
	echo "<tr id='head'>
		<th>Username</th>
		<th>Email</th>
	</tr>";

//This will loop through database records, displaying them in the table

while($row=mysqli_fetch_array($result)){
	echo "<tr>";
	echo '<td id="user">' . $row['username'] . '</td>';
	echo '<td id="user">' . $row['email'] . '</td>';
	echo "</tr>";
}

echo "</table></br></br>";
} else {
	echo "No results!";
}
?>



