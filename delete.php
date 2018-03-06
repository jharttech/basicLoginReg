<?php

//This will connect admin user to DB and show registered users.

include ('db.php');
require ('auth.php');
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] <> "10"){
$id=$_GET['id'];
$view="SELECT * FROM users WHERE id=$id";
$result=mysqli_query($con,$view);
echo "<p><b>User to Delete</b>";
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
	echo "</tr>";
}

echo "</table>";
} else {
	echo "No results!";
}
?>



