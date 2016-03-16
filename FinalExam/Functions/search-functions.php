<?php

function searchAddress($searchby, $searchterm, $orderby) {
    $db = dbconnect();

    $searchterm = "%" . $searchterm . "%";
    
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id AND $searchby LIKE :searchterm ORDER BY $orderby");
    $binds = array(
        ':searchterm' => $searchterm,
        ':user_id' => $_SESSION['user_id']
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    if (isset($results)) {
        return $results;
    }
}
