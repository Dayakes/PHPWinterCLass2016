<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
         * get and hold a database connection 
         * into the $db variable
         */
        include '../../Functions/dbconnect.php';
        include '../../Functions/utils-function.php';

        $db = dbconnect();

        $id = filter_input(INPUT_GET, 'id');

        $stmt = $db->prepare("DELETE FROM products where product_id = :id");

        $binds = array(
            ":id" => $id
        );


        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }
        ?>


        <h1> Record <?php echo $id; ?>
            <?php if (!$isDeleted): ?> 
                Not
            <?php endif; ?>
            Deleted</h1>


    </body>
</html>
