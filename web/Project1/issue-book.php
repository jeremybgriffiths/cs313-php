<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book</title>
    <link rel="stylesheet" href="styles/search-books.css">
</head>

<body>
    <h1>Issue Book</h1>
    <form action="insert-checkout.php" method="post">
        <table>
            <tr>
                <td> Enter Book Id:</td>
                <td> <input type="text" name="id" size="48"> </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit">
                    <input type="reset" value="Clear">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>