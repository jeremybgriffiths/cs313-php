<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Books</title>
    <link rel="stylesheet" href="styles/search-books.css">
</head>

<body>
    <h1>Remove Books</h1>
    <form action="delete-books.php" method="post">
        <table>
            <tr>
                <td> Enter Book Id:</td>
                <td> <input type="text" name="book-id" size="48" required> </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Submit">
                    <input type="reset" value="Clear">
                </td>
            </tr>
        </table>
        <a href="javascript:history.back()">Go Back</a>
    </form>
</body>

</html>