<?php

include_once "conn_db.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    // Get the item ID from the form
    $product_id = $_POST['product_id'];
    $item_qty = $_POST['item_qty'];

    // If the item is already in the cart, update its quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $item_qty;
    } else {
        // Otherwise, add the item to the cart with a quantity of 1
        $_SESSION['cart'][$product_id] = $item_qty;
    }

    // Redirect the user back to the order display page
    header('Location: user_customize_checkout.php');
    exit;
}

?>