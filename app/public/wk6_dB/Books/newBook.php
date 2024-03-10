
<!DOCTYPE html>
<html>
<head>
  <title>Book-O-Rama - New Book Entry</title>
</head>

<body>
    <h1>Book-O-Rama - New Book Entry</h1>
    
    <form action="insertbook.php" method="post">
    <fieldset>
        <p><label for="ISBN">ISBN-10</label>
        <input type="text" id="ISBN" name="ISBN" maxlength="13" size="13" /></p>

        <p><label for="Author">Author</label>
        <input type="text" id="Author" name="Author" maxlength="30" size="30" /></p>

        <p><label for="Title">Title</label>
        <input type="text" id="Title" name="Title" maxlength="60" size="30" /></p>
    
        <p><label for="Price">Price (£)</label>
        <input type="text" id="Price" name="Price" maxlength="7" size="7" /></p> 
    </fieldset>
  <p><input type="submit" value="Add New Book" /></p>
  </form>

</body>
</html>
