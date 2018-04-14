<?php
require('db.php');
require('auth.php');
//If form submitted, insert values into the database.
if(($_POST['register']) && isset($_REQUEST['username']) && isset($_REQUEST['email']) && isset($_REQUEST['userPass'])){
	//removes backslashes
	$username = stripslashes($_REQUEST['username']);
	//escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$userPass = stripslashes($_REQUEST['userPass']);
	$userPass = mysqli_real_escape_string($con,$userPass);
	$trn_date = date("Y-m-d H:i:s");
	$admin = '1';
	$testKey = password_hash($userPass, PASSWORD_DEFAULT);
	//Check to see if username already exists
	$dbquery = $con->prepare("SELECT username FROM `users` WHERE `username`=?");
	$dbquery -> bind_param('s', $username);
	$dbquery -> execute();
	$dbquery_result = $dbquery -> get_result();
	$dbquery -> close();
	$con->next_result();
	if($dbquery_result->num_rows == '0' && $username != "" || $email != "" || $userPass != ""){
		$sql_query = "INSERT into `users` (username, email, userPass, trn_date, admin) VALUES (?, ?, ?, ?, ?)";
		$query = $con->prepare($sql_query);
		$query->bind_param('sssss', $username, $email, $testKey, $trn_date, $admin);
		$query -> execute();
		$query -> close();
		$con->next_result();
		$check = $con->prepare("SELECT username FROM users WHERE username=?");
		$check -> bind_param('s', $username);
		$check -> execute();
		$check_result = $check->get_result();
		$check -> close();
		$con-> next_result();
		if($check_result->num_rows == '1' && ($_POST['register'])){
			header("Location: newAdded.php");
		}
	} else if($_POST['register']){
		header("Location: newAdd_error.php");
			exit();
	}else {
		header("Location: newAdd_error.php");
	}
} elseif(($_POST['cancel'])){
	header("Location: adj_users.php");
	exit();
}else{
?>
<h1>Add New User</h1>
<form action="" method="post" name="register">
<input type="text" name="username" placeholder="Username" />
<input type="email" name="email" placeholder="Email" />
<input type="password" name="userPass" placeholder="Password" />
<input type="submit" name="register" value="Add User" />
<input type="submit" name="cancel" value="Cancel" />
</form>
</div>
<?php } ?>

