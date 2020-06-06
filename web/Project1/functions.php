<?php
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkPassword($clientPassword) {
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientPassword);
}

function registerNewUser($userName, $password) {
    include("../../db/connectToDb.php");
    try {
        $sql = 'INSERT INTO Users (username, userpassword, isadmin) VALUES (:username, :userpassword, :isadmin)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $userName, PDO::PARAM_STR);
        $stmt->bindValue(':userpassword', $password, PDO::PARAM_STR);
        $stmt->bindValue(':isadmin', false, PDO::PARAM_STR);        
        $stmt -> execute();

        $rowsChanged = $stmt->rowCount();

        $stmt->closeCursor();

        return $rowsChanged;

    } catch (Exception $ex) {
        return "Error";
    }
}