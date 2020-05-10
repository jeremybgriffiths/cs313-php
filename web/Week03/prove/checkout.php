<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <h1>Checkout</h1>
    <div class="checkout">
        <form action="confirmation.php" method="post">
            <label for="full-name">Full Name: </label>
            <input type="text" name="full-name" class="form-control" required>

            <label for="full-name">Address: </label>
            <input type="text" name="address" class="form-control" placeholder="1600 Pennsylvania Ave" required>

            <label for="full-name">City: </label>
            <input type="text" name="city" class="form-control" required>

            <label for="full-name">State: </label>
            <input type="text" name="state" class="form-control" required>

            <label for="full-name">Zip Code: </label>
            <input type="text" name="zip" class="form-control" required>

            <input id="confirm" type="submit" name="confirm" class="btn btn-info" value="Confirm Order">
        </form>
        <div id = continue-button>
            <button id="continue" class="btn btn-info" onclick="location.href='index.php'">Continue Shopping</button>
        </div>
    </div>
</body>

</html>