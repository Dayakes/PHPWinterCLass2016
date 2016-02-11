<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <h2><a href=index.php>Back to view page</a></h2>

        <?php
        include '../../Functions/dbconnect.php';
        include '../../Functions/utils-function.php';

        $db = dbconnect();

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
        $product_id = $results['product_id'];
        $category_id = $results['category_id'];
        $product = $results['product'];
        $price = $results['price'];

        //table to display the data that has been retrieved
        ?>
        <table class="table table-striped"style="width:20%;">
            <tr>
                <td>Product ID:</td>
                <td><?php echo $product_id; ?></td>
            </tr>
            <tr>
                <td>Category ID:</td>
                <td><?php echo $category_id; ?></td>
            </tr>
            <tr>
                <td>Product:</td>
                <td><?php echo $product; ?></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><?php echo $price; ?></td>
            </tr>
        </table>
        <br />
        <!--link back to the view page-->


    </body>            
</html>