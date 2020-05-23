<!DOCTYPE HTML>
<html>

<body>
    <h2>Simple Library Management System</h2>
    <br>

    <?php
    include("../../db/connectToDb.php");
    $search = $_REQUEST["search"];

    $query = "select ISBN,Title,Author,Edition,Publication from book_info where title like '%$search%'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) if (mysqli_num_rows($result) > 0) {
    ?>
        <table>
            <tr>
                <th> ISBN </th>
                <th> Title </th>
                <th> Author </th>
                <th> Edition </th>
                <th> Publication </th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["ISBN"]; ?> </td>
                    <td><?php echo $row["Title"]; ?> </td>
                    <td><?php echo $row["Author"]; ?> </td>
                    <td><?php echo $row["Edition"]; ?> </td>
                    <td><?php echo $row["Publication"]; ?> </td>
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