<?php

session_start();

	if (!(isset($_SESSION['name']))){
		die("<h3>Sorry, you need to enter your name on the homepage before proceeding. <a href=\"index.php\">Home Page</a></h3>");
	} 

	if ($_POST["search"] == null) {
		die("<h3>Please enter the search term. <a href=\"search.php\">Search</a></h3>");
		} 

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Results</title>
	<link rel="stylesheet" type="text/css" href="https://dgoldberg.sdsu.edu/686/table_style.css">
</head>
<body>
	<table>
		<tr>
			<th>Site Name</th><th>Product Name</th><th>Star Rating</th><th>Review Text</th>
		</tr>
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

# SQL query to run
$sql = <<<SQL
SELECT S.Site_Name, P.Product_Name, R.Star_Rating, R.Review_Text
FROM Reviews R
JOIN Sites S
ON R.Site_ID = S.Site_ID
JOIN Products P
ON R.Product_ID = P.Product_ID
WHERE S.Site_Name LIKE "{$_POST["site"]}" 
AND R.Star_Rating LIKE {$_POST["stars"]} 
AND R.Review_Text LIKE "%{$_POST["search"]}%";
SQL;

# Send SQL query to the database
$result = mysqli_query($conn, $sql);

# Fetch results from the SQL query
# OPTIONAL: MYSQLI_ASSOC setting
# Without this setting, the fields numbered. The first field is [0], the second is [1], etc.
# With this setting, the fields are named. First name is ["First_Name"], etc.
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

$no_of_records = count($data);
echo("<h3>{$no_of_records} Records found</h3>");


# Loop through query results row-by-row
# Each row will be stored in the $row variable
foreach ($data as $key => $value) {
	echo("<tr><td>{$value["Site_Name"]}</td><td>{$value["Product_Name"]}</td><td>{$value["Star_Rating"]}</td><td>{$value["Review_Text"]}</td></tr>");
}

?>
	</table>
	<h3>Want to search another review? <a href="search.php">Search</a></h3>
	<h3><a href="index.php">Home</a></h3>
<body>
</html>