<?php
require'config.php';
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

$host = 'db';
$username = 'user';
$password = 'secret';
$database = 'docker-php';

$db = new mysqli($host, $username, $password, $database);

if (mysqli_connect_errno()){
    echo "<p>Could not connect to database</p>";
}else{
    echo "<p>Connected to " . $database . "</p>";
}

try 
{               
    # PDO Options
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new  PDO($dsn, $username, $password, $options);

    if ($pdo) 
    {
        echo "Connected to the $database database successfully!" . "\n\n";

        # TODO Create SQL statement using associative variable names
        $sql = "SELECT * FROM Books WHERE ISBN = :searchTerm";
        
        echo "Query: " . $sql  ."\n\n";

        # TODO Prepare statement, execute and fetch results
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':searchTerm', $searchTerm, PDO::PARAM_STR);


        $stmt->execute();
        $result = $stmt->fetchAll();

        var_dump($result);

        echo "\n***********************************************";

    }
    else
    {
        echo "Could not connect to the database!" . "\n\n";
        exit();
    }
}
catch (PDOException $e) 
{
    echo $e->getMessage();
}

?>
