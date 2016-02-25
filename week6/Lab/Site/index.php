<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="checkout.php">Checkout</a>
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
            include_once '../includes/products.html.php';
            
            
            
        ?>
    </body>
</html>
