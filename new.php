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
	//Check to see if username already exists
	$dbquery = "SELECT username FROM `users` WHERE `username`='$username'";
	$count = mysqli_query($con,$dbquery);
	$nrows = mysqli_num_rows($count);
	if($nrows==0 && $username != "" || $email != "" || $userPass != ""){
		$query = "INSERT into `users` (username, userPass, email, trn_date) VALUES ('$username', AES_ENCRYPT('$userPass', SHA2('$username',512)), '$email', '$trn_date')";
		$result = mysqli_query($con,$query);
		if($result && ($_POST['register'])){
			header("Location: newAdded.html");
		}
	} else if($_POST['register']){
		header("Location: newAdd_error.php");
			exit();
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

