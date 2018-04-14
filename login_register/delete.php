<?php

//This will connect admin user to DB and show registered users.

include ('db.php');
require ('auth.php');
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] <> "0"){
$id=$_GET['id'];
//$view="SELECT * FROM users WHERE id=$id";
$view = $con->prepare("SELECT id, username, email FROM users WHERE id=?");
$view -> bind_param("s", $id);
$view -> execute();
$view -> store_result();
$meta = $view -> result_metadata();
while($field = $meta->fetch_field()){
	$params[] = & $row[$field->name];
}
call_user_func_array(array($view, 'bind_result'), $params);
//$result=$con->query($view);
echo "<p><b>User to Delete</b>";
echo "<table border='1' cellpadding='10'>";
	echo "<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Email</th>
	</tr>";

//This will loop through database records, displaying them in the table

while($view->fetch()){
	echo "<tr>";
	echo '<td>' . $row['id'] . '</td>';
	echo '<td>' . $row['username'] . '</td>';
	echo '<td>' . $row['email'] . '</td>';
	echo "</tr>";
}
$view->close();

echo "</table>";
} else {
	echo "No results!";
}
?>



