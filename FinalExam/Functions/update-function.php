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
function updateRow($id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday, $image) {
    $db = dbconnect();
    $stmt = $db->prepare("UPDATE address SET address_group_id = :address_group_id, fullname = :fullname, email = :email, address = :address, phone = :phone, website = :website, birthday = :birthday, image = :image WHERE address_id = :address_id");
    $binds = array(
        ":address_id" => $id,
        ":address_group_id" => $address_group_id,
        ":fullname" => $fullname,
        ":email" => $email,
        ":address" => $address,
        ":phone" => $phone,
        ":website" => $website,
        ":birthday" => $birthday,
        ":image" => $image        
    );
    if ($stmt->execute($binds) && $stmt->rowcount() > 0) {
        return true;
    } else {
        return false;
    }
}

