<?php ?>
<!DOCTYPE html>
<html>
<head>
  <title>SQL Injection Example</title>
</head>

<body>
  <h1>SQL Injection Example</h1>

  <form action="sqlInjection.php" method="post">
  <p><strong>Author Search:</strong><br />
  <input name="searchterm" type="text" size="100"></p>

  <p><input type="submit" name="submit" value="Search"></p>
  </form>

</body>
</html>

