<?php
include('functions.php');

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
    <link rel="stylesheet" href="styles/login-form.css">
    <title>Register User</title>

    <script src="scripts/validation.js"></script>
</head>

<body>
    <div>
        <h1>Please Register</h1>
    </div>
    <br>
    <?php
    echo $message;
    echo "<form action= ' ' method='post' class=form-horizontal>";

    echo "<div>";
    echo "User Name: ";
    echo "<input type='text' name='userName' id='usernameInput' value='{$userName}'>";
    echo "</div>";

    echo "<div>";
    echo "Password: ";
    echo "<input type='password' name='password' id='passwordInput' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}'><span id='error' class='hidden'>*</span>";
    echo "<div>";
    echo "<small id='passwordInputHelp'>Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</small>";
    echo "</div>";
    echo "</div>";

    echo "<div class='form-inline'>";
    echo "<label for='passwordConfirmationInput'>Confirm Password:</label>";
    echo "<input type='password' name='passwordConfirmation' id='passwordConfirmationInput' onkeyup='checkPassword()'>";
    echo "<div>";
    echo "<small id='passwordInputHelp'>Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</small>";
    echo "</div>";
    echo "</div>";

    echo "<input type='hidden' name='action' value='{$actionValue}' onchange='checkPassword()>";
    echo "<span id='passwordCheck'></span>";
    echo "<input type='submit' value='Register'>";
    echo "</form>";
    ?>

</body>

</html>