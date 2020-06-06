<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login-form.css">
</head>

<body>
    <div style="text-align:center">
        <h1>Library Management</h1>
    </div>
    <br>
    <form name="login" method="post" action="login.php" onsubmit="return validate();">
        <div>Username: <input type="text" name="username" /> </div>
        <div>Password: <input type="password" name="password" /> </div>
        <div>
            <input type="submit" value="Login"></input>
            <input type="reset" value="Reset"></input>
        </div>
    </form>
    <p>Don't have an account? <a href="register.php">Register</a></p>
    <script src="scripts/validation.js"></script>
</body>

</html>