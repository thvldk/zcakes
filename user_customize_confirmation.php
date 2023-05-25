<?php 
    include_once 'conn_db.php';
    include 'product_func.php';
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    
    // If the user is logged in, store their user ID in the session
    if (isset($_SESSION['user_id'])) {
        // Retrieve user information from the database
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM z_user WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            // User found, fill the form fields with user data
            $row = mysqli_fetch_assoc($result);    
            $name = $row['name'];  
            $address = $row['address'];   
            $contact_number = $row['phone']; 
        } else {   
            // User not found, show an error message    
            echo "User not found.";  
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        body {
            background-image: url("images/bgg.jpg");
            background-attachment: fixed;
            overflow: auto;
            background-size: cover;
            background-position: flex;
            background-repeat: repeat;
            height: 100%;
        }

        .navbar-nav li a {
            color: black !important;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
        }

    </style>
</head>
<body>

<!-- navigation bar function, filename: user-navbar.php -->
<?php
    include 'user_navbar_func.php';
    renderCustomNavbar();
?>

<h1 class="text-center">Order Confimation</h1>

<div class="container">
<?php 
$user_id = $_SESSION['user_id'];

$z_details = "SELECT
    p.product_id,
    p.product_name,
    p.product_price,
    p.product_img,
    p.date_added AS product_date_added,
    p.product_status,
    c.item_category AS category,
    d.total_price AS total
FROM
    z_products p
    LEFT JOIN z_user u ON p.user_id = u.user_id
    LEFT JOIN z_category c ON p.category_id = c.category_id
    LEFT JOIN z_details d ON p.details_id = d.details_id
WHERE
    u.user_id = '$user_id'";

$stmt_products = $db->prepare($z_details);
$stmt_products->execute();
$customize = $stmt_products->fetchAll(PDO::FETCH_ASSOC);


$Grandtotal = 0; // Initialize grand total

?>
<div class="row text-center">
    <?php foreach ($customize as $key => $row): ?>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body" style="background-color: pink;">
                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                <img src="images/cc9.png" alt="New Product" class="img-fluid" style="width: 150px; height: 150px; border-radius: 50%;">
                <p class="card-text">
                    <strong>Category:</strong> <?php echo $row['category']; ?><br>
                    <strong>Total:</strong> Php <?php echo $row['total']; ?>
                </p>
                    <form action="user_customize_addcart.php" method="post" class="mt-2">
                        <input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">
                        <a class="btn btn-danger" href="user_customize_delete.php?product_id=<?php echo $row['product_id']; ?>">Remove</a>
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
                        <button type="submit" class="btn btn-success">Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


        


</body>
</html>
