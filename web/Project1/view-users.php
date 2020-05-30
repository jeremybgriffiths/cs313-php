<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="styles/display-books.css">
</head>

<body>
    <h2>Users</h2>
    <?php
    include("../../db/connectToDb.php");

    $stmt = $db->prepare("SELECT username, isadmin FROM Users ORDER BY username");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
    ?>
        <table>
            <tr>
                <th>Username</th>
                <th>Admin</th>
            </tr>

            <?php foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?php echo $row["username"]; ?> </td>
                    <td><?php echo $row["isadmin"] ? 'true' : 'false'; ?> </td>
                </tr>
        <?php
            }
        } else
            echo "<center>No users found</center>";
        ?>
        </table>
</body>

</html>