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
</head>

<body>
    <div>
        <h1>Please Register</h1>
    </div>
    <br>
    <?php
    echo $message;
    ?>
    <form action='' method='post' class=form-horizontal>
        <div>
            <?php
            echo "User Name: <input type='text' name='username' id='usernameInput' value='{$username}'>";
            ?>
        </div>

        <div>
            Password: <input type='password' name='password' id='passwordInput' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}'><span id='error' class='hidden'></span>
            <div>
                <small id='passwordInputHelp'>Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</small> <br>
            </div>
        </div>

        <div>
            Confirm Password: <input type='password' name='passwordConfirmation' id='passwordConfirmationInput' onkeyup='checkPassword()'>
        </div>
        <?php
        echo "<input type='hidden' name='action' value='{$actionValue}' onchange='checkPassword()>";
        ?>
        <span id='passwordCheck'></span>
        <input type='submit' value='Register'>
    </form>

    <script src="./scripts/validation.js"></script>
</body>

</html>