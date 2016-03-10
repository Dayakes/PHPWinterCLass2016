<?php

function deleteRow($id) {
    $db = dbconnect();
    $stmt = $db->prepare("DELETE FROM address WHERE address_id = :address_id");
    $binds = array(
        ":address_id" => $id
    );
    if ($stmt->execute($binds) && $stmt->rowcount() > 0) {
        return true;
    } else {
        return false;
    }
}
