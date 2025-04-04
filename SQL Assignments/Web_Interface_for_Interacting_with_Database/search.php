<?php

session_start();

if (!(isset($_SESSION['name']))) {
	die("<h3>Sorry, you need to enter your name on the homepage before proceeding. <a href=\"index.php\">Home Page</a></h3>");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Analyze Reviews</title>
</head>
<body>
	<h1> Search for the product reviews here, <?php echo("{$_SESSION["name"]}!"); ?> </h1>
	<br>
	<form method="post" action="search_result.php">
		<label for = "site">Site:</label>
		<select name = "site">
			<option value = "Amazon">Amazon</option>
			<option value = "Target">Target</option>
			<option value = "Walmart">Walmart</option>
		</select>
		<br><br>
		<label for = "stars">Stars:</label>
		<select name = "stars">
			<option value = "1">1</option>
			<option value = "2">2</option>
			<option value = "3">3</option>
			<option value = "4">4</option>
			<option value = "5">5</option>
		</select>
		<br><br>
		<label for = "search">Search term:</label>
		<input type="text" name="search">
		<br><br>
		<input type="submit" value="Go!">
	</form>
</body>
</html>