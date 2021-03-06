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
        //include functions
        include '../../Functions/utils-function.php';
        include '../../Functions/dbconnect.php';

        $db = dbconnect();

        $result = '';
        //if it is a post request then set the variable accordingly
        if (isPostRequest()) {
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            $id = filter_input(INPUT_POST, 'id');
            $oldimage = filter_input(INPUT_POST, 'oldimage');
            
            include '../../Functions/upload-function.php';
            try {
                $image = uploadImage('upfile');
            } catch (RuntimeException $ex) {
                echo $ex->getMessage();
                $image = $oldimage;
            }


            //the sql statement
            $stmt = $db->prepare("UPDATE products set product = :product, price = :price, image = :image where product_id = :id");
            
            //binds for the sql statement
            $binds = array(
                ":product" => $product,
                ":price" => $price,
                ":id" => $id,
                ":image" => $image
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $result = 'Record updated';
            }
            //if it is not a post request then get the id and display what data matches with that id
        } else {
            $id = filter_input(INPUT_GET, 'id');
            $stmt = $db->prepare("SELECT * FROM products where product_id = :id");
            $binds = array(
                ":id" => $id
            );
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            if (!isset($id)) {
                die('Record not found');
            }
            $product = $results['product'];
            $price = $results['price'];
            $image = $results['image'];
        }
        ?>

        <h1><?php echo $result; ?></h1>



        <?php //form for inputing data for update   ?>
        <form method="post" action="#" enctype="multipart/form-data">
            Product<br><input type="text" value="<?php echo $product; ?>" name="product" />
            <br />
            <br>
            Price<br><input type="text" value="<?php echo $price; ?>" name="price" />
            <br>
            <br>
            Img<br><img src="./images/<?php echo $image; ?>" />
            <input name="upfile" type="file" />
            <br />
            <input type="hidden" value="<?php echo $image; ?>" name="oldimage" />
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>

        <?php //link back to the view page  ?>

    </body>
</html>
