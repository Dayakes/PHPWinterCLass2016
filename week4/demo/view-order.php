<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>
        <?php
        include_once './functions/dbconnect.php';

        $db = dbconnect();
        $column = 'dataone';
        $order = 'ASC'; //DESC
        $stmt = $db->prepare("SELECT * FROM test ORDER BY $column $order");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>


<?php include './TableTemplate.php'; ?>


    </body>
</html>
