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
function getAllAddress() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id");
    $binds = array(
        ":user_id" => $_SESSION['user_id']
    );
}
