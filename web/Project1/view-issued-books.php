<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued Books</title>
    <link rel="stylesheet" href="styles/display-books.css">
</head>

<body>
    <h2>Issued Books</h2>
    <?php
    include("../../db/connectToDb.php");

    $stmt = $db->prepare(
        "SELECT b.title, b.author, b.genre, u.username 
            FROM Books b 
            JOIN Checkout c ON c.bookid = b.id
            JOIN Users u ON u.id = c.userid"
    );

    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
    ?>
        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Username</th>
            </tr>

            <?php foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?php echo $row["title"]; ?> </td>
                    <td><?php echo $row["author"]; ?> </td>
                    <td><?php echo $row["genre"]; ?> </td>
                    <td><?php echo $row["username"]; ?> </td>
                </tr>
        <?php
            }
        } else
            echo "<center>No issued books found</center>";
        ?>
        </table>
</body>

</html>