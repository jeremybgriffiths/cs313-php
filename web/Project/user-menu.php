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
    <link>
</head>

<body>
    <form action=""></form>
    <?php
    $bookAuthor = 'Tolkien, J.R.R.';
    $stmt = $db->prepare("SELECT title, author, genre FROM Books Where author = '$bookAuthor'");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        echo 'Title: ' . $row['title'];
        echo ' author: ' . $row['author'];
        echo ' genre: ' . $row['genre'];
        echo '<br/>';
    };
    ?>
</body>

</html>