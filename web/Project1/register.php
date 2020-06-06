<?php
require_once('functions.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = validateInput($_POST['username']);
    $password = validateInput($_POST['password']);
    $passwordConfirmation = validateInput($_POST['passwordConfirmation']);

    $isPasswordGood = checkPassword($password);

    if ($isPasswordGood && ($password == $passwordConfirmation)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $rowsChanged = registerNewUser($username, $hashedPassword);
        if ($rowsChanged == 1) {
            header('Location: login-form.php?username=' . $username . "&registrationSuccessfull=true");
            die();
        }
    } else {
        $message = "<h3 class='text-danger'>Sorry, passwords don't match</h3>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/login-form.css">
    <title>Register User</title>

    <script src="validation.js"></script>
</head>

<body>
    <header>
    </header>
    <main>
        <section>
            <h2>Please Register</h2>
            <?php
            echo $message;
            registerForm('registrationRequest');
            ?>
        </section>
    </main>
    <footer>
    </footer>
</body>

</html>