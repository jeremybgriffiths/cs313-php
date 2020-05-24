<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/search-books.css">
</head>

<body>
    <div id="header">
        <h2>Simple Library Management System</h2>
    </div>
    <form action="display-books.php" method="get">
        <br>
        <div>
            <p>Enter the title of the book to be searched: </p>
            <input type="text" name="search" size="48">
            <br></br>
            <input type="submit" value="submit">
            <input type="reset" value="Reset">
        </div>
        <br>
    </form>
</body>

</html>