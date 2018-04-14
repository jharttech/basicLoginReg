<?php
require('db.php');
include('auth.php');
if($_POST['yes'] || $_POST['no'] && isset($_GET['id']) && is_numeric($_GET['id'])){
		if(($_POST['yes'])){
			$id=$_GET['id'];
			if($id != 1){
				$dbedit= $con->prepare("DELETE FROM `users` WHERE `id`=?");
				$dbedit -> bind_param('s', $id);
				$dbedit -> execute();
				$dbedit -> close();
				header("Location: delete_success.php");
				exit();
			}else{
			header("Location: delete_error.php");
			}
		}else if(($_POST['no'])){
			header("Location: adj_users.php");
			exit();
		}
}else {
?>
<h1>Are you sure you want to remove this user!!??</h1>
<form action="" method="post" name="delete">
<input type="submit" name="yes" value="Yes" />
<input type="submit" name="no" value="No" />
</form>
<?php } ?>
