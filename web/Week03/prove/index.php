<?php
session_start();
$products = array(
    "cpu1" => array(
        "id" => "1",
        "img-name" => "ryzen-3900x.jpg",
        "name" => "AMD Ryzen 9 3900X",
        "price" => "500.00"
    ),
    "cpu2" => array(
        "id" => "2",
        "img-name" => "intel-9900k.jpg",
        "name" => "Intel Core i9-9900K",
        "price" => "600.00"
    ),
    "cpu3" => array(
        "id" => "3",
        "img-name" => "ryzen-3600x.jpg",
        "name" => "AMD Ryzen 5 3600X",
        "price" => "240.00"
    )
);

$product_ids = array();
if (filter_input(INPUT_POST, "add-to-cart")) {
    if (isset($_SESSION["shopping-cart"])) {
        $count = count($_SESSION["shopping-cart"]);
        $product_ids = array_column($_SESSION["shopping-cart"], "id");

        if (!in_array(filter_input(INPUT_GET, "id"), $product_ids)) {
            $_SESSION["shopping-cart"][$count] = array(
                "id" => filter_input(INPUT_GET, "id"),
                "name" => filter_input(INPUT_POST, "name"),
                "price" => filter_input(INPUT_POST, "price"),
                "quantity" => filter_input(INPUT_POST, "quantity")
            );
        } else {
            for ($i = 0; $i < count($product_ids); $i++) {
                if ($product_ids[$i] == filter_input(INPUT_GET, "id")) {
                    $_SESSION["shopping-cart"][$i]["quantity"] += filter_input(INPUT_POST, "quantity");
                }
            }
        }
    } else {
        $_SESSION["shopping-cart"][0] = array(
            "id" => filter_input(INPUT_GET, "id"),
            "name" => filter_input(INPUT_POST, "name"),
            "price" => filter_input(INPUT_POST, "price"),
            "quantity" => filter_input(INPUT_POST, "quantity")
        );
    }
}

if (filter_input(INPUT_GET, "action") == "delete") {
    foreach ($_SESSION["shopping-cart"] as $key => $product) {
        if ($product["id"] == filter_input(INPUT_GET, "id")) {
            unset($_SESSION["shopping-cart"][$key]);
        }
    }
    $_SESSION["shopping-cart"] = array_values($_SESSION["shopping-cart"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <h1>Computer Processors</h1>
    <div id="container">
        <?php
        foreach ($products as $product) {
        ?>
            <div class="col-sm-4 col-md-3 products">
                <?php
                echo "<img src='images/" . $product["img-name"] . "'" . " class='img-fluid'>";
                echo $product["name"];
                echo nl2br("\r\n");
                echo "$" . $product["price"];
                ?>
                <form action="index.php?action=add&id=<?php echo $product["id"]; ?>" method="post">
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="name" value="<?php echo $product["name"]; ?>">
                    <input type="hidden" name="price" value="<?php echo $product["price"]; ?>">
                    <input id="add-to-cart" type="submit" name="add-to-cart" class="btn btn-info" value="Add to Cart">
                </form>
            </div>
        <?php
        }
        ?>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th colspan="5">
                        <h3>Order</h3>
                    </th>
                </tr>
                <tr>
                    <th width="40%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="20%">Price</th>
                    <th width="15%">Total</th>
                    <th width="5%">Action</th>
                </tr>
                <?php
                if (!empty($_SESSION["shopping-cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping-cart"] as $key => $product) {
                ?>
                        <tr>
                            <td><?php echo $product["name"]; ?></td>
                            <td><?php echo $product["quantity"]; ?></td>
                            <td>$ <?php echo $product["price"]; ?></td>
                            <td>$ <?php echo number_format($product["quantity"] * $product["price"], 2); ?></td>
                            <td>
                                <a href="index.php?action=delete&id=<?php echo $product["id"]; ?>">
                                    <div class="btn-danger">Remove</div>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $total = $total + ($product["quantity"] * $product["price"]);
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right">$ <?php echo number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <?php
                            if (isset($_SESSION["shopping-cart"])) {
                                if (count($_SESSION["shopping-cart"]) > 0) {
                            ?>
                                    <a href="checkout.php" class="button">Checkout</a>
                            <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>