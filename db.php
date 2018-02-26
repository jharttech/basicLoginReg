<?php
//Entere your Host, username, password, databae below.
//Leave passowrd empty if you do not set password on localhost.
//Replace USERNAME with your mysql username and PASSWORD with your mysql password.
$con = mysqli_connect("localhost","USERNAME","PASSWORD","register");
//check connection
if(mysqli_connect_errno()){
	echo "Failed to connect to Database, Please try again later.";
}


?>

