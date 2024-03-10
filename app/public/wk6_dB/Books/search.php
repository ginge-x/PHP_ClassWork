<?php ?>
<!DOCTYPE html>
<html>
<head>
  <title>SQL Injection Example</title>
</head>

<body>
  <h1>SQL Injection Example</h1>


<form action="searchbook.php" method="post">
    <p><strong>Choose Search Type:</strong><br />
        <select name="searchtype">
            <option value="Author">Author</option>
            <option value="Title">Title</option>
            <option value="ISBN">ISBN</option>
    </select>
    </p>

    <p>
        <strong>Enter Search Term:</strong><br />
        <input name="searchterm" type="text" size="40">
    </p>
    <p>
        <input type="submit" name="submit" value="Search">
    </p>
</form>

</body>
</html>