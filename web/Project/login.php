<html>

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
        $stmt = $db->prepare("SELECT username, userpassword FROM Users WHERE username = ?");
        $stmt->execute(array($inUsername));
        $row = $stmt->fetch();
        $passwordDB = $row["userpassword"];

        if ($row && password_verify($inPassword, $passwordDB)) {
            $_SESSION['username'] = $inUsername;
            header("location: user-menu.php");
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