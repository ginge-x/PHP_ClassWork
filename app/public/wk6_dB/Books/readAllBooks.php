<?php

include('connect-db.php');

$query = "SELECT * FROM Books";
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

# Note content-type is HTML so HTML tags required for any output
echo "<p>Number of books found:" . $result->num_rows . "</p>";

while($row = $result->fetch_assoc())
{
    echo 'Title: '.$row['Title'].'<br>';
    echo 'Author: '.$row['Author'].'<br>';
    echo 'ISBN: '.$row['ISBN'].'<br>';
    echo 'Price: '.$row['Price'].'<br><br>';
}
$stmt->free_result();
$stmt->close();
$db->close();

?>