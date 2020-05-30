<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search</title>
    <link rel="stylesheet" href="styles/search-books.css">
</head>

<body>
    <h1>Book Search</h1>
    <form action="display-books.php" method="get">
        <div>
            <p>Enter the title of the book to be searched: </p>
            <input type="text" name="search" size="48">
            <br></br>
            <input type="submit" value="Submit">
            <input type="reset" value="Clear">
        </div>
        <br>
    </form>
</body>

</html>