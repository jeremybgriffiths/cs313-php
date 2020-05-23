<!DOCTYPE HTML>
<html>

<body>
    <h2>Simple Library Management System</h2>
    <br>

    <?php
    include("../../db/connectToDb.php");
    $search = $_REQUEST["search"];

    $stmt = $db->prepare("SELECT id, title, author, genre from Books where title like '%$search%'");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
    ?>
        <table>
            <tr>
                <th>ID</th>
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
            echo "<center>No books found in the library by the name $search </center>";
        ?>
        </table>
</body>

</html>
<br>