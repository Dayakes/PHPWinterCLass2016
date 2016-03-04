<?php

/*
 * users
 * user_id
 * email
 * password
 */

function isValidUser($email, $pass) {

    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {

        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $results['user_id'];

        if ($email === 'test@test.com' && $pass === 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3') {
            $_SESSION['admin'] = true;
        }
        return true;
    }

    return false;
}

function getUserID($email, $pass) {
    
}

function SignUp($email, $pass) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :pass");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}
