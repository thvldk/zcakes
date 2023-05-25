<?php
    include_once 'conn_db.php';
    include 'user_navbar_func.php';
    renderCustomNavbar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        body {
            background-image: url("images/23.jpg");
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

        .cart-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .subtotal {
            font-weight: bold;
        }

        .grand-total {
            font-size: 24px;
            margin-top: 20px;
            font-weight: bold;
        }

        .btn-cancel {
            margin-right: 10px;
        }

        .btn-proceed {
            background-color: #28a745;
            color: #fff;
        }

        .quantity-counter {
            display: flex;
            align-items: center;
        }

        .counter-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
            margin-right: 5px;
        }

        .counter-input {
            width: 40px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- navigation bar function, filename: user-navbar.php -->

<h1 class="text-center">Shopping Cart</h1>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php
            // Display the contents of the cart that the user ordered, m_displaycart.php
            echo "<hr>";
            if (!empty($_SESSION['cart'])) { // check if the cart is not empty
                echo "<form action='user_checkout.php' method='post'>";
                echo "<table class='table table-bordered'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Select</th>"; // Select column
                echo "<th>Product Name</th>";
                echo "<th>Quantity</th>";
                echo "<th>Price</th>"; // column for item price
                echo "<th>Subtotal</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";

                // Fetch all the item details from the database

                $total = 0; // initialize total variable
                foreach ($_SESSION['cart'] as $product_id => $item_qty) {
                    // Get the details of the item from the database
                    $query = "SELECT product_id, product_name, product_price
                            FROM z_products
                            WHERE product_id = ?";

                    $stmt = $db->prepare($query);
                    $stmt->execute([$product_id]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Calculate the subtotal for the item
                    $subtotal = $item_qty * $result['product_price'];
                    $total += $subtotal;
                    // $item_id = $result['item_id'];
                    // $item_ = $result['item_id'];
                    // echo '<form method="POST" action="">'
                    echo '<tr>';
                    echo '<td><input type="checkbox" name="checkout-items[]" value="' . $product_id . '"></td>'; // Checkbox for selecting items
                    echo '<td>' . $result['product_name'] . '</td>';
                    echo '<td>';
                    echo '<div class="quantity-counter">';
                    
                    echo '<input class="counter-input" type="number" name="item_qty' . $product_id . '" value="' . $item_qty . '" min="1" max="99" onchange="updateSubtotal(' . $product_id . ', this.value)" disabled>';
                    
                    echo '</div>';
                    echo '</td>';

                    echo '<input type="hidden" name="product_id[]" value="<?php echo $product_id; ?>">';

                    echo '<td class="price-' . $product_id . '">' . $result['product_price'] . '</td>'; // Display item price
                    echo '<td class="subtotal-' . $product_id . '">' . $subtotal . '</td>';
                    echo '<td><a class="btn btn-danger" href="user_addcart.php?remove=' . $product_id . '">Remove</a></td>';
                    echo '</tr>';

                    // Add the subtotal to the total amount if the item is selected
                    if (isset($_POST['checkout-items']) && in_array($product_id, $_POST['checkout-items'])) {
                        $total += $subtotal;
                    }
                }

                // Add a row for the total amount and checkout button
                echo "<tr>";
                echo "<td colspan='5'><strong>Total Amt: </strong>Php " . $total . "";
                echo '<td><input type="submit" name="add" class="btn btn-success me-5" value="Checkout"></td>';
                echo "</tr>";

                echo "</table>";
                echo "</form>";
            } else {
                // Display a message if the cart is empty
                echo "<hr>";
                echo "<table class='table table-bordered'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Select</th>";
                echo "<th>Product Name</th>";
                echo "<th>Quantity</th>";
                echo "<th>Price</th>";
                echo "<th>Subtotal</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";
                echo "<tr>";
                echo "<td colspan='6'>Your cart is currently empty. Place an order.</td>";
                echo "</tr>";
                echo "</tbody>";

                echo "</table>";
            }
            ?>
        </div>
    </div>
</div>

<script src="js/bootstrap.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Update grand total on page load
    updateGrandTotal();

    // Add event listeners for quantity change and item selection
    var quantityInputs = document.querySelectorAll("input[name^='quantity-']");
    var checkboxes = document.querySelectorAll("input[name='checkout-items[]']");

    quantityInputs.forEach(function (input) {
        input.addEventListener("change", function () {
            var productId = input.name.split("-")[1];
            updateSubtotal(productId, parseInt(input.value));
            updateGrandTotal();
        });
    });

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener("change", function () {
            updateGrandTotal();
        });
    });
});

function changeQuantity(productId, change) {
    var input = document.querySelector("input[name='quantity-" + productId + "']");
    var currentValue = parseInt(input.value);
    var newValue = currentValue + change;

    if (newValue >= 1 && newValue <= 20) {
        input.value = newValue;
        updateSubtotal(productId, newValue);
        updateGrandTotal();
    }
}

function updateSubtotal(productId, quantity) {
    var price = parseFloat(document.querySelector(".price-" + productId).textContent);
    var subtotal = quantity * price;
    var subtotalElement = document.querySelector(".subtotal-" + productId);
    subtotalElement.textContent = subtotal.toFixed(2);
}

function updateGrandTotal() {
    var checkboxes = document.querySelectorAll("input[name='checkout-items[]']");
    var grandTotal = 0;

    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            var row = checkbox.parentNode.parentNode;
            var productId = checkbox.value;
            var quantity = parseInt(row.querySelector("input[name='quantity-" + productId + "']").value);
            var price = parseFloat(row.querySelector(".price-" + productId).textContent);
            grandTotal += quantity * price;
        }
    });

    var grandTotalElement = document.querySelector("#grand-total");
    grandTotalElement.textContent = grandTotal.toFixed(2);
}
</script>
</body>
</html>
