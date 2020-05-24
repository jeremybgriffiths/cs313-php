<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books</title>
    <link rel="stylesheet" href="styles/search-books.css">
</head>

<body>
    <h1>Add Books</h1>
    <form action="insert-books.php" method="post">
        <table>
            <tr>
                <td> Enter Title:</td>
                <td> <input type="text" name="title" size="48"> </td>
            </tr>
            <tr>
                <td> Enter Author:</td>
                <td> <input type="text" name="author" size="48"> </td>
            </tr>
            <tr>
                <td> Enter Genre:</td>
                <td> <input type="text" name="genre" size="48"> </td>
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