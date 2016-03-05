<?php

//address_id
//user_id
//address_group_id
//fullname 
//email
//address 
//phone
//website 
//birthday
//image
function addToBook() {
    $address_group_id = filter_input(INPUT_POST, 'address_group_id');
    $fullname = filter_input(INPUT_POST, 'fullname');
    $email = filter_input(INPUT_POST, 'email');
    $address = filter_input(INPUT_POST, 'address');
    $phone = filter_input(INPUT_POST, 'phone');
    $website = filter_input(INPUT_POST, 'website');
    $birthday = filter_input(INPUT_POST, 'birthday');

    try {
        $image = uploadImage('upfile');
    } catch (RuntimeException $ex) {
        echo $ex->getMessage();
        $image = '';
    }

    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET user_id = :user_id, address_group_id = :address_group_id, fullname = :fullname, email = :email, address = :address, phone = :phone, website = :website, birthday = :birthday, image = :image");
    $binds = array(
        ":user_id" => $_SESSION['user_id'],
        ":address_group_id" => $address_group_id,
        ":fullname" => $fullname,
        ":email" => $email,
        ":address" => $address,
        ":phone" => $phone,
        ":website" => $website,
        ":birthday" => $birthday,
        ":image" => $image
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }

    return false;
}

function getGroups() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address_groups");
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}
