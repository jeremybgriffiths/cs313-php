<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <link rel="stylesheet" href="styles/display-books.css">
</head>

<body>
    <h2>All Books</h2>
    <?php
    include("../../db/connectToDb.php");

    $stmt = $db->prepare("SELECT id, title, author, genre FROM Books ORDER BY title");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
    ?>
        <table>
            <tr>
                <th>Book Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
            </tr>

            <?php foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?php echo $row["id"]; ?> </td>
                    <td><?php echo $row["title"]; ?> </td>
                    <td><?php echo $row["author"]; ?> </td>
                    <td><?php echo $row["genre"]; ?> </td>
                </tr>
        <?php
            }
        } else
            echo "<center>No books found in the library </center>";
        ?>
        </table>
        <a href="javascript:history.back()">Go Back</a>
</body>

</html>