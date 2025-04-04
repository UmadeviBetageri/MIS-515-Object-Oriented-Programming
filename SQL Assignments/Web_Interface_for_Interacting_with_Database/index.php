<?php
	session_start();

  	if (isset($_SESSION["name"])){
	session_destroy();
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
</head>
<body>
	<h1>Hello, and welcome!</h1>
	<br>
	<form method="post" action="directory.php">
		<label for = "name">What is your name?</label>
		<input type="text" name="name">
		<input type="submit" value="Go!">
	</form>
</body>
</html>