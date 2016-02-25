<?php

include './Functions/dbconnect.php';

$db = dbconnect();

$stmt = $db->prepare("SELECT * FROM products");
$results = array();
if ($stmt->execute() && $stmt->rowCount() > 0) {
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3>Rows Found: " . $stmt->rowCount() . "</h3>";
}

session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['action']) and $_POST['action'] == 'Buy') {
    // Add item to the end of the $_SESSION['cart'] array
    $_SESSION['cart'][] = $_POST['id'];
    header('Location: .');
    exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Empty cart') {
    // Empty the $_SESSION['cart'] array
    unset($_SESSION['cart']);
    header('Location: ?cart');
    exit();
}

if (isset($_GET['cart'])) {
    $cart = array();
    $total = 0;
    foreach ($_SESSION['cart'] as $id) {
        foreach ($items as $product) {
            if ($product['id'] == $id) {
                $cart[] = $product;
                $total += $product['price'];
                break;
            }
        }
    }

    include 'cart.html.php';
    exit();
}

include 'catalog.html.php';

