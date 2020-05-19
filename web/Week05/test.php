<?php
require_once('../../db/connectToDb.php');


?>


<?php
foreach ($dbUrl->query('SELECT username, password FROM note_user') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
};
?>