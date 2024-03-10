<?php

require 'config.php';

$searchTerm = $_POST['searchterm'];

$database = new mysqli($host, $user, $password, $db);

if (mysqli_connect_errno()) 
{
	echo "<p>Could not connect to database</p>";
}

$query = "SELECT * FROM Books WHERE Author = '$searchTerm'";

echo $query;
$stmt = $database->prepare($query);
$stmt->execute();

$stmt->store_result();
$stmt->bind_result($isbn, $author, $title,$price);

echo "<p>Number of books found:" . $stmt->num_rows . "</p>";

while($stmt->fetch())
{
	echo "<p>Title: "  . $title ."<br />";
	echo "Author: "  . $author ."<br />";
	echo "ISBN: "  . $isbn ."<br />";
	echo "Price: "  . $price ."<br />";
}
 
?>
