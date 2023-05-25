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
//    if(isset($_POST['add'])){
//        $item_selected = $_POST['checkout-items'];
//        $item_qty = $_POST['item_qty'];
//        $item_id = $_POST['product_id'];

//        echo $item_qty;
//        echo $item_id;
//        echo $item_selected;
//        exit();
//     }
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

        h1 {
            color: black;
        }

        hr {
            border-color: #28a745;
        }

        table {
            margin-bottom: 20px;
        }

        th,
        td {
            vertical-align: middle;
        }

        img {
            max-width: 50px;
            height: auto;
        }

        .btn-cancel {
            margin-right: 10px;
        }

        .btn-place-order {
            background-color: #28a745;
            color: #fff;
        }
    </style>
</head>
<body>

<!-- navigation bar function, filename: user-navbar.php -->
<?php
    include 'user_navbar_func.php';
    renderCustomNavbar();
?>

<h1 class="text-center">Checkout</h1>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php
            
    // If the user submitted a form to add an item to the cart
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['item_qty'])) {
    // Get the item ID and quantity from the form
    $item_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_NUMBER_INT);
    $item_qty = filter_input(INPUT_POST, 'item_qty', FILTER_SANITIZE_NUMBER_INT);

    // Validate the item ID and quantity
    if (!is_numeric($item_id) || !is_numeric($item_qty)) {
        // Redirect the user back to the order display page with an error message
        header('Location: user_customize_view.php?error=invalid_input');
        exit;
    }

    // If the item is already in the cart, update its quantity
    if (isset($_SESSION['cart'][$user_id][$item_id])) {
        $_SESSION['cart'][$user_id][$item_id] += (int)$item_qty;
    } else {
        // Otherwise, add the item to the cart with the specified quantity
        $_SESSION['cart'][$user_id][$item_id] = (int)$item_qty;
    }

    // Redirect the user back to the order display page
    header('Location: user_customize_view.php');
    exit;
}
?>
            <?php
                // Initialize total amount to 0
                $total_amount = 0;

                    // Display the contents of the cart
                    echo "<table class='table table-bordered'>";
                    echo '<thead><tr>';
                    echo '<th>Item Name</th>';
                    echo '<th>Quantity</th>';
                    echo '<th>Price</th>';
                    echo '<th>Subtotal</th>';
                    echo '</tr></thead>';
                    
                    foreach ($_SESSION['cart'] as $item_id => $item_qty) {          
                        // Get the details of the item from the database
                        $query = "SELECT product_name, product_price
                                    FROM z_products
                                    WHERE product_id = ?";

                        $stmt = $db->prepare($query);
                        $stmt->execute([$item_id]);
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                        // Check if the query was successful
                        if ($result) {
                            // Calculate the subtotal for the item
                            $subtotal = $item_qty * $result['product_price'];
                            // Add the subtotal to the total amount
                            $total_amount += $subtotal;
                    
                            // Display a row for the item in the cart                   
                            echo '<tr>';                        
                            echo '<td>' . $result['product_name'] . '</td>';                                          
                            echo '<td>' . $item_qty . '</td>';                                          
                            echo '<td>' . $result['product_price'] . '</td>';                                           
                            echo '<td>' . $subtotal . '</td>';               
                            echo '</tr>';                                  
                        } else {                                     
                            // If the query was not successful, display an error message                             
                            echo '<tr><td colspan="5">Error retrieving item details from database</td></tr>';                                  
                        }              
                    }
             
                    // Display the total amount                       
                    echo '<tr>';                       
                    echo '<td colspan="3"></td>';                         
                    echo '<td><strong>Total Amount: Php</strong> ' . $total_amount . '</td>';
                    echo '</tr>';
                    echo '</table>';
    
                    // Display a link to the checkout page if the cart is not empty
                    if (!empty($_SESSION['cart'])) {              
                        
                    } else {
                        // If the cart is empty, display a message              
                        echo 'Your cart is empty.' . "<br>";
                }     
            ?>
            

                    </tbody>

            <form action="checkout_backend.php" method="post">
                <table class='table table-bordered'>
                <div class="mb-3">
                <label for="pickup_date" class="form-label">Pickup Date</label>
                    <input type="datetime-local" required id="pickup_date" name="pickup_date" class="form-control" value="<?php echo isset($pickup_date) ? $pickup_date : ''; ?>">
                </div>
                <div class='text-end'>
                    <a class="btn btn-danger me-2" href="user_cart.php">back</a>
                    <input name='place_order' value='Place Order' type='submit' class='btn btn-success btn-place-order'>
                </div>
            </form>

            <script src="js/bootstrap.js"></script>
            <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the necessary elements
    const quantityInputs = document.querySelectorAll('input[name="quantity[]"]');
    const totalPriceElement = document.getElementById('total-price');
    let totalPrice = 0;

    // Calculate the initial total price
    calculateTotalPrice();

    // Update the total price when the quantity changes
    quantityInputs.forEach(function(input) {
      input.addEventListener('input', calculateTotalPrice);
    });

    function calculateTotalPrice() {
      totalPrice = 0;
      quantityInputs.forEach(function(input) {
        const quantity = parseInt(input.value);
        const productPrice = parseFloat(input.parentNode.previousElementSibling.textContent);
        totalPrice += quantity * productPrice;
      });

      // Update the total price display
      totalPriceElement.textContent = totalPrice.toFixed(2);
    }
  });
  
                function cancelOrder() {
                    // Implement cancellation logic here, such as clearing the cart or redirecting to a different page
                    alert("Order has been canceled.");
                }

                function placeOrder() {
                    // Implement order placement logic here, such as saving the order details to the database
                    alert("Order has been placed.");
                }
            </script>
        </div>
    </div>
</div>

</body>
</html>
