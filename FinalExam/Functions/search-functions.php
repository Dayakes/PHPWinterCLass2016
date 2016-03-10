<?php

function searchAddress($searchby, $searchterm, $orderby) {
    $db = dbconnect();

    $searchterm = "'"."%" . $searchterm . "%" . "'";
    
    $stmt = $db->prepare("SELECT * FROM address WHERE $searchby LIKE :searchterm ORDER BY $orderby");
    $binds = array(
        ':searchterm' => $searchterm,
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    var_dump($stmt->queryString);
    
    if (isset($results)) {
        return $results;
    }
}
