<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2><a href="checkout.php">Checkout</a></h2>
        <?php
            require_once '../includes/session-start.req-inc.php';
            require_once '../Functions/cart-functions.php';
            require_once '../Functions/dbconnect.php';
            require_once '../Functions/utils-function.php';
            require_once '../Functions/category-functions.php';
            require_once '../Functions/products-functions.php';
                        
            startCart();            
            
            $allCategories = getAllCategories();            
            $allProducts = getAllProducts();
            
            $categorySelected = filter_input(INPUT_GET, 'cat');
            $action = filter_input(INPUT_POST, 'action');
                       
            
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
                  
           
            include_once '../includes/categories.html.php';
            
            if(!isset($categorySelected))
            {
            include_once '../includes/products.html.php';
            }
            else
            {
                include_once '../Includes/catselectedproducts.html.php';
            }
            
            
            
        ?>
    </body>
</html>
