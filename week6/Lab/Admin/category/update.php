<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <h2><a href=index.php>Back to view page</a></h2>
        <?php
        include '../../Functions/dbconnect.php';
        include '../../Functions/utils-function.php';

        $db = dbconnect();

        $result = '';
        //if it is a post request then set the variable accordingly
        if (isPostRequest()) {
            $category = filter_input(INPUT_POST, 'category');

            //the sql statement
            $stmt = $db->prepare("UPDATE categories set category = :category");
            //binds for the sql statement
            $binds = array(
                ":category" => $category,
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $result = 'Record updated';
            }
            //if it is not a post request then get the id and display what data matches with that id
        } else {
            $id = filter_input(INPUT_GET, 'id');
            $stmt = $db->prepare("SELECT * FROM categories where category_id = :id");
            $binds = array(
                ":id" => $id
            );
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            if (!isset($id)) {
                die('Record not found');
            }
            $category = $results['category'];
        }
        ?>

        <h1><?php echo $result; ?></h1>



        <?php //form for inputing data for update  ?>
        <form method="post" action="#">
            Category<br><input type="text" value="<?php echo $category; ?>" name="category" />
            <br />
            <br>
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>

        <?php //link back to the view page ?>

    </body>
</html>
