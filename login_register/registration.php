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
	$regPassNull = "";
	$admin = '1';
	$trn_date = date("Y-m-d H:i:s");
	$regPass = ($_REQUEST['regPass']);
	$regPassSet = "haven3hVerify";
	$testKey = password_hash($userPass, PASSWORD_DEFAULT);
	$regPassHash = password_hash($regPass, PASSWORD_DEFAULT);
	$regPassInfo = $con -> prepare("SELECT regPass FROM users WHERE id=?");
	$regPassInfo -> bind_param("s", $testID);
	$regPassInfo -> execute();
	$reg_result = $regPassInfo->get_result();
	$row_regInfo = $reg_result ->fetch_assoc();
	$regPassInfo -> close();
	$con ->next_result();

	//Check to see if username already exists
	$dbquery = $con->prepare("SELECT username FROM `users` WHERE `username`=?");
	$dbquery -> bind_param('s', $username);
	$dbquery -> execute();
	$dbquery_result = $dbquery-> get_result();
	$dbquery -> close();
	$con->next_result();
	if($dbquery_result->num_rows == '0'){
		$sql_query = "INSERT into `users` (username, email, userPass, trn_date, regPassHash, regPass, admin) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$query = $con->prepare($sql_query);
		$query->bind_param('sssssss', $username, $email, $testKey, $trn_date, $regPassHash, $regPass, $admin);
		$query -> execute();
		$query -> close();
		$con->next_result();
		$check = $con->prepare("SELECT username FROM users WHERE username=?");
		$check -> bind_param('s', $username);
		$check -> execute();
		$check_result =$check->get_result();
		$check ->close();
		$con->next_result();
		if(($_POST['register']) && $check_result->num_rows =='1'){
			if(password_verify($regPassSet, $regPassHash )){
				header("Location: reg_success.php");
			}else{
				header("Location: reg_errorVer.php");
			}
		} elseif(($_POST['register']) && $check_result->num_rows != '1'){
		header("Location: reg_error.php");
			exit();
		}
	}else{
		header("Location: reg_error.php");
	}
} else{
?>
<h1>Registration</h1>
<form action="" method="post" name="register">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="userPass" placeholder="Password" required />
<!--<input type="password" name="confirm" placeholder="Password Confirm" required />-->
<input type="password" name="regPass" placeholder="Registration Password" />
<input type="submit" name="register" value="Register" />
</form>
</div>
<?php } ?>

