<?php
include_once "conn_db.php";

$user_id = $_SESSION['user_id'];
$pickup_date = $_POST['pickup_date'];

$sql = "SELECT * FROM z_user WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "Error: User not found.";
    exit();
}

$item_ids = array_keys($_SESSION['cart']);
$item_ids_str = implode(",", $item_ids);

$sql = "SELECT * FROM z_products WHERE product_id IN ($item_ids_str)";
$result = mysqli_query($conn, $sql);
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Set the timezone to Asia/Manila
date_default_timezone_set('Asia/Manila');
$date_ordered = date('Y-m-d H:i:s');

$order_status = 'P';

$ref_num = gen_ref_num(16);
$table = "z_orders";
$field = "ref_num";
while (is_existing($conn, $ref_num, $field, $table)) {
    $ref_num = gen_ref_num(16);
}

$sql = "INSERT INTO z_orders (user_id, product_id, order_qty, date_ordered, pickup_date, order_status, ref_num, product_price) VALUES ";

foreach ($items as $item) {
    $item_id = $item['product_id'];

    // Check if the item_id exists in the $_SESSION['cart'] array
    if (isset($_SESSION['cart'][$item_id])) {
        $item_qty = $_SESSION['cart'][$item_id];

        $sql .= "($user_id, $item_id, $item_qty, '$date_ordered', '$pickup_date', '$order_status', '$ref_num', {$item['product_price']}),";
    }
}

$sql = rtrim($sql, ',');
mysqli_query($conn, $sql);

header('Location: user_orderlist.php');
exit;

?>