<?php

session_start();

if ($_POST["name"] == null) {
	die("<h3>Please add your name in home page and come back to this page. <a href=\"index.php\">Home Page</a></h3>");
} 

$_SESSION['name'] = $_POST['name']

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Directory</title>
</head>
<body> 
	<h1> Welcome,  
		<?php echo("{$_POST["name"]}!"); ?></h1>
	<p>In this system, you can either analyze product reviews or create your own. What would you like to do?</p>
	<a href="search.php">Analyze existing reviews</a>
	<br><br>
	<a href="write.php">Write your own review</a>
</body>
</html>