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
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id order by address_group_id");
    $binds = array(
        ":user_id" => $_SESSION['user_id']
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    if (isset($results)) {
        return $results;
    }
}
