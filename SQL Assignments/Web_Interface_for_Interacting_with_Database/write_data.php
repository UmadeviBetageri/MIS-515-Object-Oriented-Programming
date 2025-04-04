<?php

session_start();

	if (!(isset($_SESSION['name']))){
		die("<h3>Sorry, you need to enter your name on the homepage before proceeding. <a href=\"index.php\">Home Page</a></h3>");
	}
	
	if ($_POST['product'] == null) {
		die("<h3>Please enter the Product ID. <a href=\"write.php\">Write Review</a></h3>");
	} 
	elseif ($_POST["review"] == null) {
		die("<h3>Please enter a Review. <a href=\"write.php\">Write Review</a></h3>");
	}
?>

<html>
<head>
	<title>TITLE HERE</title>
</head>
<body>
<?php

# Set up parameters to connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Products_Review";

# Create connection to database
$conn = mysqli_connect($servername, $username, $password, $dbname);

# Check the connection was successful
if (!$conn) {
	die(mysqli_connect_error());
}

$date = date("Y-m-d");

# SQL query to run
$sql = <<<SQL
INSERT INTO Reviews (Product_ID, Site_ID, Star_rating, Date_of_Post, Review_text) 
VALUES ({$_POST["product"]}, 1, {$_POST["stars"]}, "{$date}", "{$_POST["review"]}");
SQL;

# Send SQL query to the database
$result = mysqli_query($conn, $sql);

# Check if the modification was performed successfully
if ($result) {
	echo("<h3>Congradulations! Your review was accepted.</h3>");
	echo("<h3>Want to write another review? <a href=\"write.php\">Write Review</a></h3>");
	echo("<h3><a href=\"index.php\">Homepage</a></h3>");
} else {
	echo("<h3>Sorry! your review not accepted. Please try agian</h3>");
}

?>


<body>
</html>