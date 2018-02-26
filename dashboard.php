<?php
require('db.php');
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link ref="stylesheet" media="screen and (min-width: 600px)" href="css/style.css" />
<link ref="stylesheet" media="screen and (max-width: 599px)" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Dashboard</p>
<p>This is another secured page.</p>
<p><a href="index.php">Home</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>
