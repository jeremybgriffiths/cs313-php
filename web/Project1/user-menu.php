<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Menu</title>
    <link rel="stylesheet" href="styles/user-menu.css">
</head>

<body>
    <?php
    session_start();
    $username = $_SESSION['username'];
    ?>

    <header>
        <h1>User Menu</h1>
        <div style="text-align: right"><a href="logout.php">Logout</a></div>
    </header>

    <div id="welcome"> Welcome <?php echo $username ?> </div>
    <a href="view-books.php">View Books</a>
    <a href="search-books.php">Search for a Book</a>
    <a href="add-books.php">Add books</a>



    <?php
    if (!isset($_SESSION['username'])) {
        header("location:login-form.php");
    }
    ?>
</body>

</html>