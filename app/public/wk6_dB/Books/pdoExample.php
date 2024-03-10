<?php

require 'config.php';
header("Content-Type: text/plain");

//Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try 
{	            
    // PDO Options
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    // Create PDO instance
    $pdo = new PDO($dsn, $user, $password, $options);

	if ($pdo) 
    {
		echo "Connected to the $db database successfully!" . "\n\n";
        
        // Set up search terms
        $author = 'Thomas Down';    // String
        $price = 24.99;             //Float
        
        
        // SQL query
        $sql1 = 'SELECT * FROM Books WHERE Author = ?'; // Positional variables use ?

        echo "Query 1: " . $sql1  ."\n\n";

        // Prepare statment, execute and fetch results
        $stmt = $pdo->prepare($sql1);
        $stmt->execute([$author]);
        $result1 = $stmt->fetch();

        // Show results
        var_dump($result1);

        echo "\n*****************************************\n\n";


        // SQL query
        $sql2 = "SELECT * FROM Books WHERE Author = :author OR Price = :price"; // Use names variables aka associative

        echo "Query 2: " . $sql2  ."\n\n";

        // Prepare statment, execute and fetch results
        $stmt2 = $pdo->prepare($sql2);                
        $stmt2->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt2->bindValue(':price', $price, PDO::PARAM_STR);
    
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();
        
        var_dump($result2);
    
        echo "\n*****************************************\n\n";

        // SQL query
        $sql3 = "SELECT * FROM Books WHERE Author = ? OR Price = ?"; // Use positional variables aka numeric

        echo "Query 3: " . $sql1  ."\n\n";

        // Prepare statment, execute and fetch results
        $stmt3 = $pdo->prepare($sql3);                
        $stmt3->bindValue(1, $author, PDO::PARAM_STR);
        $stmt3->bindValue(2, $price, PDO::PARAM_STR);
    
        $stmt3->execute();
        $result3 = $stmt3->fetchAll();
        
        var_dump($result3);
    
        echo "\n*****************************************\n\n";

        
	}
} 
catch (PDOException $e) 
{
	echo $e->getMessage();
}