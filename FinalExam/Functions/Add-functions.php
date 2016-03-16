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
    //set all of the variables
    $address_group_id = filter_input(INPUT_POST, 'address_group_id');
    $fullname = filter_input(INPUT_POST, 'fullname');
    $email = filter_input(INPUT_POST, 'email');
    $address = filter_input(INPUT_POST, 'address');
    $phone = filter_input(INPUT_POST, 'phone');
    $website = filter_input(INPUT_POST, 'website');
    $birthday = filter_input(INPUT_POST, 'birthday');
    
    //replace the phone number with the appropriate formatting
    $phoneRegex = '/^\(?([2-9]{1}[0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
    $phone = preg_replace($phoneRegex, '($1) $2-$3', $phone);

        if (strlen($fullname) < 1 || strlen($email) < 1 || strlen($address) < 1 || strlen($phone) < 1) {
            return false;
        }

        try {
            $image = uploadImage('upfile');
        } catch (RuntimeException $ex) {
            //echo $ex->getMessage();
            $image = '';
        }
        
        //connect and set statement
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
        } else {
            return false;
        }
}

function getGroups() {
    //get all of the address groups
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address_groups");
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

