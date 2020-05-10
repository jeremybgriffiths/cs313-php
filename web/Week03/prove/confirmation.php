<?php
    session_start();

    $fullName = $_POST["full-name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <div id="thank-you">
        <h1>Thank you for your order!</h1> <br>
        <h3>Your items will be shipped to :</h3> <br>
        <p>
            <?php
                echo $fullName . "<br>";
                echo $address . "<br>";
                echo $city . ", " . $state . " " . $zip . "<br>";
            ?>
        </p>
    </div>
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
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php
    session_unset();
    session_destroy();
    ?>
</body>

</html>