<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    include_once("../../db/connectToDb.php");
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            echo
                "Incorrect username or password";
            header("location: login-form.php");
        }

        $inUsername = $_POST["username"];
        $inPassword = $_POST["password"];
        $stmt = $db->prepare("SELECT username, userpassword, isadmin FROM Users WHERE username = ?");
        $stmt->execute(array($inUsername));
        $row = $stmt->fetch();
        $passwordDB = $row["userpassword"];
        $isAdmin = (bool)$row["isadmin"];

        if ($row && $inPassword == $passwordDB) {
            $_SESSION['username'] = $inUsername;
            $header = null;
            if ($isAdmin) {
                $header = "location: admin-menu.php";
            } else {
                $header = "location: user-menu.php";
            }
            header($header);
        } else {
            echo "Incorrect username or password";
    ?>
            <a href="login-form.php">Login</a>
    <?php
        }
    }
    ?>
</body>

</html>