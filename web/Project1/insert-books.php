<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Book</title>
    <link rel="stylesheet" href="styles/search-books.css">
</head>

<body>
    <h1>Insert Book</h1>

    <?php
    include("../../db/connectToDb.php");

    $title = $_POST["title"];
    $author = $_POST["author"];
    $genre = $_POST["genre"];

    $stmt = $db->prepare('INSERT INTO Books(title, author, genre) VALUES(:title, :author, :genre)');

    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':author', $author);
    $stmt->bindValue(':genre', $genre);

    $stmt->execute();
    ?>

    <h3> Book information is inserted successfully </h3>

    <a href="search-books.php"> To search for the Book information click here </a>
    <a href="javascript:history.back()">Go Back</a>

</body>

</html>