<?php
require('db.php');
include('auth.php');
//If form submitted, insert values into the database.
if(($_POST['update']) && isset($_REQUEST['username']) && isset($_REQUEST['email'])){
	$id=$_GET['id'];
	//removes backslashes
	$username = stripslashes($_REQUEST['username']);
	//escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	//Check to see if username does currently exist
	$dbquery = $con->prepare("SELECT id FROM `users` WHERE `id`=?");
	$dbquery -> bind_param("s", $id);
	$dbquery -> execute();
	$dbquery_result = $dbquery-> get_result();
	if($dbquery_result->num_rows == '1'){
		if($dbquery_result->num_rows == '1' && $username != "" && $email != "" && ($_POST['update'])){
		$update = $con ->prepare("UPDATE `users` SET `username`=?, `email`=? WHERE id=?");
		$update -> bind_param("sss", $username, $email, $id);
		$update -> execute();
		$update -> close();
		header("Location: update_success.html");
		} elseif(($_POST['update'])) {
			header("Location: update_error.php");
			exit();
		};}else{
		echo "No Results!!";}
}elseif(($_POST['cancel'])){
	header("Location: adj_users.php");
	exit();
}else{
?>
<h1>Update User Information Here</h1>
<form action="" method="post" name="update">
<input type="text" name="username" placeholder="Username" />
<input type="email" name="email" placeholder="Email" />
<input type="submit" name="update" value="Update" />
<input type="submit" name="cancel" value="Cancel" />
</form>
</div>
<?php } ?>

