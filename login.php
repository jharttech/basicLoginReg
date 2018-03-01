<?php
require('db.php');
session_start();
//If form submitted, insert values into the database.i

if(($_POST['login']) && isset($_POST['username']) && isset($_POST['userPass'])){
		//removes backslashes
	$username = stripslashes($_REQUEST['username']);
	//removes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$userPass = stripslashes($_REQUEST['userPass']);
	$userPass = mysqli_real_escape_string($con,$userPass);
	//Checking is user exists in the database or not
	$pass = "SELECT userPass, AES_DECRYPT(AES_ENCRYPT('$userPass', UNHEX(SHA2('$username', 512))), UNHEX(SHA2('$username', 512))) FROM `users` WHERE `username`='$username' AND AES_DECRYPT(AES_ENCRYPT('$userPass', UNHEX(SHA2('$username', 512))), UNHEX(SHA2('$username', 512)))='$userPass'";
	$result = mysqli_query($con,$pass);
	$rows = mysqli_num_rows($result);
		if($rows==1){
			$_SESSION['username'] = $username;
				//Redirect user to index.php
			header("Location: index.php");
		}else if(($_POST['login']) && $rows!=1){
			header("Location: login_err.html");
		}
} else{

?>
<h1>Login</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="userPass" placeholder="Password" required />
<input id="login" type="submit" name="submit" value="Login" />
<input type="hidden" name="login" value="login" />
</form>
<?php } ?>
