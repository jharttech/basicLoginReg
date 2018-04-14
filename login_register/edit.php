<?php

//This will connect admin user to DB and show registered users.

include ('db.php');
require ('auth.php');
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] <> "0"){
$id=$_GET['id'];
$view = $con -> prepare("SELECT username, email, admin FROM users WHERE id=?");
$view -> bind_param("s", $id);
$view -> execute();
$meta = $view -> result_metadata();
while($field = $meta->fetch_field()){
	$params[] = & $row[$field->name];
}
call_user_func_array(array($view, 'bind_result'), $params);
echo "<h1>User to Edit</h1>";
echo "<table id='form-contents'>";
	echo "<tr id='head'>
		<th>Username</th>
		<th>Email</th>
	</tr>";

//This will loop through database records, displaying them in the table

while($view->fetch()){
//	$user = $row['username'];
	echo "<tr>";
	echo '<td id="user">' . $row['username'] . '</td>';
	echo '<td id="user">' . $row['email'] . '</td>';
}
	if($row["admin"] == '0' && $row["username"] != $_SESSION['username']){
	echo '<td><form id="small" action="" method="post" name="remove"><input id="small" type="submit" name="remove" value="Remove Admin Status" /></td>';}
	elseif($row["admin"] == '1' && $row["username"] != $_SESSION['username']){
	echo '<td><form id="small" action="" method="post" name="makeAdmin"><input id="small" type="submit" name="makeAdmin" value="Make Admin" /></td></form>';}

	if(($_POST['remove'])){
		$adval=1;
		$query =$con->prepare("UPDATE `users` SET `admin`=? WHERE `id`=?;");
		$query -> bind_param("ss", $adval, $id);
		$query -> execute();
		$query -> close();
		header("Location: adminRemoved.php");}
	elseif(($_POST['makeAdmin'])){
		$adval=0;
		$query =$con->prepare( "UPDATE `users` SET `admin`=? WHERE `id`=?;");
		$query -> bind_param("ss", $adval, $id);
		$query -> execute();
		$query -> close();
		header("Location: addedAdmin.php");}

	echo "</tr>";

$view->close();

echo "</table></br></br>";
} else {
	echo "No results!";
}
?>



