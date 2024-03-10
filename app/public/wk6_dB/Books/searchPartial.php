<?php

require 'config.php';
header("Content-Type: text/plain");

if(empty($_POST['searchtype']) || empty($_POST['searchterm'])) 
{
    echo "<p>You have not entered all the required details.<br /> Please go back and try again.</p>";
    exit;
}

$searchType = $_POST['searchtype'];
$searchTerm = $_POST['searchterm'];

//Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

# TODO do write code to connect to the database, execute the query and print results
# If there is an error display a message then exit.

try 
{	            
    # PDO Options
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    # TODO Create PDO instance
    

    if ($pdo) 
    {
        echo "Connected to the $db database successfully!" . "\n\n";

        # TODO Create SQL statement using asociative variable names
        
        echo "Query: " . $sql  ."\n\n";

        # Prepare statment, execute and fetch results
        
        
        var_dump($result);

        echo "\n***********************************************";

    }
    else
    {
        echo "Could not connect to the datbase!" . "\n\n";
        exit();
    }
}
catch (PDOException $e) 
{
	echo $e->getMessage();
}

?>