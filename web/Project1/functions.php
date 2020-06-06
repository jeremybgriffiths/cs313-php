<?php
function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientPassword);
}

function registerNewUser($userName, $password)
{
    include("../../db/connectToDb.php");
    try {
        $sql = 'INSERT INTO Users (username, userpassword, isadmin) VALUES (:username, :userpassword, :isadmin)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $userName, PDO::PARAM_STR);
        $stmt->bindValue(':userpassword', $password, PDO::PARAM_STR);
        $stmt->bindValue(':isadmin', false, PDO::PARAM_STR);
        $stmt->execute();

        $rowsChanged = $stmt->rowCount();

        $stmt->closeCursor();

        return $rowsChanged;
    } catch (Exception $ex) {
        return "Error";
    }
}

function registerForm($actionValue, $userName = '')
{
    echo "<form action= ' ' method='post' class=form-horizontal>";

    echo "<div class='form-inline'>";
    echo "<label for='usernameInput' class='control-label col-sm-1'>User Name:</label>";
    echo "<input type='text' name='userName' id='usernameInput' value='{$userName}'>";
    echo "</div>";

    echo "<div class='form-inline'>";
    echo "<label for='passwordInput' class='control-label col-sm-1'>Password:</label>";
    echo "<input type='password' name='password' id='passwordInput' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}'><span id='errorThing' class='hidden'>*</span>";

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
}
