<?php
session_start();
$products = array(
    "cpu1" => array(
        "id" => "1",
        "name" => "AMD Ryzen 9 3900X",
        "price" => "500.00"
    ),
    "cpu2" => array(
        "id" => "2",
        "name" => "Intel Core i9-9900KS",
        "price" => "600.00"
    ),
    "cpu3" => array(
        "id" => "3",
        "name" => "AMD Ryzen 5 3600X",
        "price" => "240.00"
    )
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
</head>

<body>
    <h1>Computer Processors</h1>
    <div class="container">

    </div>
</body>

</html>