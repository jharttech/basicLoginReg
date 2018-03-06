<?php
require('db.php');
include('auth.php');
//If form submitted, insert values into the database.
if(($_POST['update']) && isset($_REQUEST['username']) && isset($_REQUEST['email'])){
	//removes backslashes
	$username = stripslashes($_REQUEST['username']);
	//escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	//Check to see if username does currently exist
	$dbquery = "SELECT * FROM `users` WHERE `id`='$id'";
	$count = mysqli_query($con,$dbquery);
	$nrows = mysqli_num_rows($count);
	if($nrows==1){
		$query = "UPDATE `users` SET `username`='$username', `email`='$email' WHERE id='$id'";
		if($result && $username != "" && $email != "" && ($_POST['update'])){
			$result = mysqli_query($con,$query);
			header("Location: update_success.html");
		} elseif(($_POST['update'])) {
			header("Location: update_error.php");
			exit();
		}
	}
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

