<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books</title>
    <link rel="stylesheet" href="styles/display-books.css">
</head>

<body>
    <h2>My Books</h2>
    <?php
    include("../../db/connectToDb.php");

    session_start();
    $userId = $_SESSION['userid'];
    echo $userId;

    $stmt = $db->prepare(
        "SELECT id, title, author, genre, c.checkout_date
            FROM Books b
            JOIN Checkout c ON c.bookid = b.id
            JOIN Users u ON u.id = c.userid
            WHERE u.id = $userId;
            ORDER BY title"
    );

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
                <th>Checkout Date</th>
            </tr>

            <?php foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?php echo $row["id"]; ?> </td>
                    <td><?php echo $row["title"]; ?> </td>
                    <td><?php echo $row["author"]; ?> </td>
                    <td><?php echo $row["genre"]; ?> </td>
                    <td><?php echo $row["checkout_date"]; ?> </td>
                </tr>
        <?php
            }
        } else
            echo "<center>You have no issued books</center>";
        ?>
        </table>
        <a href="javascript:history.back()">Go Back</a>
</body>

</html>