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

        // echo $rowsChanged;

        // If successfully inserted the user info, redirect them to the login page
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
    <meta name="description" content="W07 Team Assignment">
    <meta name="author" content="Scott Mosher">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <!-- Need to include bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>W07 Team Assignment</title>

    <script src="javascript.js"></script>
</head>

<body>
    <header>
    </header>
    <main>
        <!-- ********** NOTE Both signin forms have the same field IDs, so if both are turned on there might be issues **********  -->
        <section>
            <h2>Please Register</h2>

            <?php
            // Display the form with just a single password box
            // signUpForm('registrationRequest'); 
            ?>
        </section>
        <hr>
        <section>
            <h2>Please Register with Password Confirmation</h2>
            <p>This will use a 2nd password input box to make sure the user entered in the password they want to use. It will use an AJAX function to check the passwords to make sure they match</p>
            <?php

            echo $message;
            // Display the form
            signUpFormDoublePassword('registrationRequest');
            ?>
        </section>


    </main>
    <footer>
    </footer>
</body>

</html>