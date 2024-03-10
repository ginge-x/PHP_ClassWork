<?php

$host = 'db';
$database = 'docker-php';
$user = 'user';
$password = 'secret';

$db = new mysqli($host, $user, $password, $database);

if (mysqli_connect_errno()) 
{
	echo "<p>Could not connect to database</p>";
}
else
{
	echo "<p>Connected to " . $database . "</p>";	
}

 
?>