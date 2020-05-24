<!DOCTYPE HTML>
<html>

<body>
    <h1>Insert Book</h1>

    <?php
    include("../../db/connectToDb.php");

    $title = $_POST["title"];
    $author = $_POST["author"];
    $edition = $_POST["genre"];

    $stmt = $this->pdo->prepare("INSERT INTO Books(title, author, genre) VALUES('$title', '$author', '$genre')");
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':author', $author);
    $stmt->bindValue(':genre', $genre);
    $stmt->execute();
    ?>

    <h3> Book information is inserted successfully </h3>

    <a href="search-books.php"> To search for the Book information click here </a>

</body>

</html>