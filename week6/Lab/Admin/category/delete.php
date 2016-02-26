<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2><a href=index.php>Back to view page</a></h2>
        <?php
        /*
         * get and hold a database connection 
         * into the $db variable
         */
        include '../../Functions/dbconnect.php';
        include '../../Functions/utils-function.php';

        $db = dbconnect();

        $id = filter_input(INPUT_GET, 'id');

        $stmt = $db->prepare("DELETE FROM categories where category_id = :id");

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
                Not Deleted, Please make sure you have first deleted any products associated with this category!
            <?php else : ?>
                Deleted </h1>
        <?php endif; ?>


    </body>
</html>
