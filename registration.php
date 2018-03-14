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
	$regPass = stripslashes($_REQUEST['regPass']);
	$regPass = mysqli_real_escape_string($con,$regPass);
	$verif = "SELECT * FROM `users` WHERE `id` = '1'";
	$regVer = mysqli_query($con,$verif);
	while($checkVer=mysqli_fetch_array($regVer)){
		$verPass=$checkVer["regPass"];
		$testVer=$checkVer["username"];}
	//Check to see if username already exists
	$dbquery = "SELECT username FROM `users` WHERE `username`='$username'";
	$count = mysqli_query($con,$dbquery);
	$nrows = mysqli_num_rows($count);
	if($nrows==0){
		$query = "INSERT into `users` (username, email, userPass, trn_date, regPass, temp, verify) VALUES ('$username', '$email', AES_ENCRYPT('$userPass', SHA2('$username',512)), '$trn_date', NULL, NULL, AES_ENCRYPT('$regPass', SHA2('$testVer', 512)))";
		$result = mysqli_query($con,$query);
		$regQuery="SELECT * FROM `users` WHERE `username`='$username'";
		$verQuery=mysqli_query($con,$regQuery);
		while($checking=mysqli_fetch_array($verQuery)){
			$tempRegVer=$checking["verify"];}
		if($result && $verPass==$tempRegVer && ($_POST['register'])){
			header("Location: reg_success.php");
		}else if(($_POST['register']) && $verPass!=$tempRegVer){
			$drop = "DELETE from `users` WHERE `username`='$username' AND `email`='$email'";
			$dropRow = mysqli_query($con,$drop);
			header("Location: reg_error.php");}
	} else if(($_POST['register'])){
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
<input type="password" name="regPass" placeholder="Registration Password" />
<input type="submit" name="register" value="Register" />
</form>
</div>
<?php } ?>

