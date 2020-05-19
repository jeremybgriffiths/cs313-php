<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../../db/connectToDb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
foreach ($dbUrl->query('SELECT username, userpassword FROM users') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['userpassword'];
  echo '<br/>';
};
?>