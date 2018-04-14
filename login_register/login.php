<?php
require('db.php');
session_start();
//If form submitted, insert values into the database.i

if(($_POST['login']) && isset($_POST['username']) && isset($_POST['userPass'])){
	//removes backslashes
	$username = stripslashes($_REQUEST['username']);
	//removes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$userPass = ($_REQUEST['userPass']);
	//Checking is user exists in the database or not
	$pass = $con->prepare("SELECT username FROM `users` WHERE `username`=?");
	$pass -> bind_param('s', $username);
	$pass -> execute();
	$pass_result = $pass->get_result();
	$pass -> close();
	$con -> next_result();
	if($pass_result->num_rows == '1'){
		if($pass_result->num_rows == '1' && $username != "" &&($_POST['login'])){
			$uPass = $con->prepare("SELECT userPass, id FROM users WHERE username=?");
			$uPass -> bind_param("s", $username);
			$uPass->execute();
			$res = $uPass->get_result();
			$row = $res->fetch_assoc();
			$passVar = $row['userPass'];
			$idVar = $row['id'];
			if(password_verify($userPass, $passVar)){
				if($idVar == 1){
					$_SESSION['username'] = $username;
					header("Location: a_index.php");
				}else{
					$_SESSION['username'] = $username;
					header("Location: index.php");
				}
			}else{
				header("Location: login_err.php");
			}
		}else{
			header("Location: login_error.php");
		}
	}else{
			header("Location: login_error.php");
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
