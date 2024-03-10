<?php
require 'config.php';
header("Content-Type: text/plain");

if (!isset($_POST['ISBN']) || !isset($_POST['Author']) || !isset($_POST['Title']) || !isset($_POST['Price'])){
    echo "<p>You have not entered all the required details. <br/> Please go back and try again.</p>";
    exit;
}

$host = 'db';
$username = 'user';
$password = 'secret';
$database = 'docker-php';
$dsn = "mysql:host=$host;dbname=$database;charset=UTF8";

try {
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    if($pdo){
        echo "Connected to the $database database successfully";

        $isbn = $_POST['ISBN'];
        $author = $_POST['Author'];
        $title = $_POST['Title'];
        $price = $_POST['Price'];
        $price = doubleval($price);

        $query = "INSERT INTO Books (ISBN, Author, Title, Price) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$isbn, $author, $title, $price]);

        if ($stmt->rowCount() > 0){
            echo "<p>Book inserted into the database.</p>";
        }
        else{
            echo "<p>An error has occurred.<br/> The item was not added.</p>";
        }
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
