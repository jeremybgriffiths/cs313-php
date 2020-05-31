<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Menu</title>
    <link rel="stylesheet" href="styles/admin-menu.css">
</head>

<body>
    <?php
    $username = $_SESSION['username'];
    ?>

    <header>
        <h1>Admin Menu</h1>
        <div style="text-align: right"><a href="logout.php">Logout</a></div>
    </header>

    <div id="welcome"> Welcome <?php echo $username ?> </div>
    <div>
        <form id="options">
            <button formaction="view-books.php">View books</button>
            <button formaction="view-users.php">View users</button>
            <button formaction="search-books.php">Search for a Book</button>
            <button formaction="add-books.php">Add book</button>
            <button formaction="issue-book.php">Issue book</button>
            <button formaction="view-issued-books.php">View issued books</button>
            <button formaction="remove-books.php">Remove book</button>
        </form>
    </div>



    <?php
    if (!isset($_SESSION['username'])) {
        header("location:login-form.php");
    }
    ?>
</body>

</html>