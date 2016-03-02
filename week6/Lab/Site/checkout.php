<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2><a href="index.php">Continue Shopping</a></h2>
        <?php
        require_once '../includes/session-start.req-inc.php';
        require_once '../functions/cart-functions.php';
        require_once '../functions/dbconnect.php';
        require_once '../Functions/utils-function.php';
        require_once '../functions/category-functions.php';
        require_once '../functions/products-functions.php';

        if (isPostRequest()) {
            $clearcart = filter_input(INPUT_POST, 'clearcart');
            if ($clearcart === 'clear') {
                $_SESSION['cart'] = null;
            }
        } else {

            startCart();

            $total = 0.0;

            $checkoutProducts = array();

            $items = getCart();

            foreach ($items as $id) {
                $checkoutProducts[] = getProduct($id);
                $prices = getPrice($id);
                $total = $total + $prices['price'];
            }
        }

        include '../includes/checkout.html.php';
        ?>
        <form method="post" action="#">
            <button type="submit" name="clearcart" value="clear">Clear Cart</button>
        </form>
    </body>
</html>
