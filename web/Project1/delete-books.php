<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book</title>
    <link rel="stylesheet" href="styles/search-books.css">
</head>

<body>
    <h1>Delete Book</h1>

    <?php
    include("../../db/connectToDb.php");

    $bookId = $_POST["book-id"];

    $stmt = $db->prepare('DELETE FROM Books WHERE id = :bookId');
    $stmt->bindValue(':bookId', $bookId);
    $stmt->execute();
    ?>

    <h3> Book information deleted successfully </h3>

    <a href="javascript:history.back()">Go Back</a>

</body>

</html>