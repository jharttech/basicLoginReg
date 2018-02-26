<?php
require('db.php');

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
	$count = mysqli_query($con,$dbquery) or die(mysql_error());
	$nrows = mysqli_num_rows($count);
	if($nrows==0){
		$query = "INSERT into `users` (username, userPass, email, trn_date) VALUES ('$username', AES_ENCRYPT('$userPass', UNHEX(SHA2('$username',512))), '$email', '$trn_date')";
		$result = mysqli_query($con,$query);
		if($result && ($_POST['register'])){
			header("Location: reg_success.html");
		}
	} else if($_POST['register']){
		header("Location: reg_error.php");
			exit();
	}
} else{
?>
<h1>Registration</h1>
<form action="" method="post" name="register">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="userPass" placeholder="Password" required />
<input type="submit" name="register" value="Register" />
<input type="hidden" name="register" value="register" />
</form>
</div>
<?php } ?>

