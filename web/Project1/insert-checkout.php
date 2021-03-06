<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Checkout</title>
    <link rel="stylesheet" href="styles/search-books.css">
</head>

<body>
    <h1>Insert Checkout</h1>

    <?php
    include("../../db/connectToDb.php");

    $bookId = $_POST['book-id'];
    $userId = $_POST['user-id'];

    $checkoutDate = date("F j, Y, g:i a");

    $stmt = $db->prepare('INSERT INTO Checkout(bookid, userid, checkout_date) VALUES(:bookId, :userId, :checkoutDate)');
    $stmt->bindValue(':bookId', $bookId);
    $stmt->bindValue(':userId', $userId);
    $stmt->bindValue(':checkoutDate', $checkoutDate);

    $stmt->execute();
    ?>

    <h3>Checkout information is inserted successfully</h3>

    <a href="view-issued-books.php">To view issued books click here</a>
    <a href="javascript:history.back()">Go Back</a>

</body>

</html>