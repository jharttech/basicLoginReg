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
	$pass = "SELECT *, AES_DECRYPT(userPass, SHA2('$username', 512)) FROM `users` WHERE `username`='$username'";
	$result = mysqli_query($con,$pass);
	while($check=mysqli_fetch_array($result)){
		$verify=$check["AES_DECRYPT(userPass, SHA2('$username', 512))"];
		$id=$check["id"];}
	$rows = mysqli_num_rows($result);
		if($rows==1 && $verify == $userPass){
			if($id==1){
			$_SESSION['username'] = $username;
				//Redirect user to a_index.php
			header("Location: a_index.php");
			} else{
				//Redirect user to index.php
				$_SESSION['username'] = $username;
				header("Location: index.php");
			}
		}elseif(($_POST['login']) && $verify != $userPass){
			header("Location: login_err.php");
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
