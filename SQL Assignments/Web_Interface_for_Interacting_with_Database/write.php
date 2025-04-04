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
	<title>Write Review</title>
</head>
<body>
	<h1> Write a review here, <?php echo("{$_SESSION["name"]}"); ?>! </h1>
	<br>
	<form method="post" action="write_data.php">
		<label for = "product">Product ID:</label>
		<input type="number" name="product" max="14" min="1">
		<br><br>
		<label for = "stars">Stars:</label>
		<select name = "stars">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
		<br><br>
		<label for = "review">Review:</label>
		<input type="text" name="review">
		<br><br>
		<input type="submit" value="Go!">
	</form>
</body>
</html>