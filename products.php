<?php 
include_once "conn_db.php";

include("product_func.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Products</title>
    <style>
        body {
            background-image: url("images/bgg.jpg");
            background-attachment: fixed;
            overflow: auto; /* or overflow: scroll; */
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

        .bottom-part {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .bottom-part h2 {
            font-size: 60px;
            margin-bottom: 10px;
        }

        .bottom-part p {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #ff6b6b;
            color: black;
        }

        #product-cards h1 {
            text-align: center;
            font-weight: bold;
            background-color: pink;
            color: deeppink;
            text-shadow: 1px 1px 1px black;
            padding: 10px;
        }

        #product-cards h4 {
            font-weight: bold;
            margin-bottom: 15px;
            padding-bottom: 15px;
            color: black;
            border-bottom: 2px solid rgba(161, 109, 14, 1);
        }

        #product-cards .row {
            justify-content: center;
            margin-top: 20px;
        }

        #product-cards .col-md-6 {
            margin-bottom: 20px;
        }

        #product-cards .card {
            background-color: #FA9884;
            box-shadow: 0 0 6px black;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        #product-cards .card:hover {
            transform: translateY(-5px);
        }

        #product-cards .card-body {
            padding: 10px;
            text-align: center;
        }

        #product-cards .card-body h6 {
            font-size: 15px;
            color: black;
            font-weight: bold;
            margin-top: 10px;
        }

        .buy-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .buy-button:hover {
            background-color: #ff6b6b;
            color: black;
        }
        /* Order Now button */
        .button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .button:hover{
            background-color: #ff6b6b;
            color: black;
        }
        .card_size{
            width: 280px;
            
        }
    </style>
</head>

<body>
    <!-- navigation bar function, filename: user-navbar.php-->
    <?php
        include 'user_navbar_func.php';
        renderCustomNavbar();
    ?>

    <section id="product-cards">
        <div class="container">
            <h1>FEATURED CAKES</h1>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/bento1.png" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(1, $conn); // Replace 1 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/bento2.png" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(2, $conn); // Replace 1 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>"; 
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/bento3.png" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(3, $conn); // Replace 1 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/bento4.png" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(4, $conn); // Replace 1 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

            <!-- <div class="row">
                
            </div> -->

            <h4 class="mt-5">Cakes</h4>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/lay1.jpg" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(5, $conn); // ok na dito produc_id 1 for blue bento

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>"; 
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/lay2.jpg" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(6, $conn); // Replace 1 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                               echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>"; 
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/lay3.jpg" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(7, $conn); // Replace 1 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>"; 
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/lay5.jpg" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(8, $conn); // Replace 1 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>"; 
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

            <!-- <div class="row">
                
            </div> -->

            <h4 class="mt-5">Cupcakes</h4>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/cc8.png" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(9, $conn); // Replace 123 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>"; // Replace 1 with the desired product ID
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/cc9.png" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(10, $conn); // Replace 123 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>"; // Replace 1 with the desired product ID
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/cc10.png" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(11, $conn); // Replace 123 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>"; // Replace 1 with the desired product ID
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card_size">
                        <img src="images/cc11.png" alt="">
                        <div class="card-body">
                        <?php
                            $product_details = getProductDetails(12, $conn); // Replace 123 with the desired product ID

                            if ($product_details) {
                                $product_id = $product_details['product_id'];
                                $product_name = $product_details['product_name'];
                                $product_price = $product_details['product_price'];

                                echo "<h5>$product_name</h5>";
                                echo "<h6>Php. $product_price</h6>";

                                echo "<form action='user_addcheck.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>";
                                echo "<button type='submit' class='buy-button'>Buy</button>";
                                echo "</form>";

                                echo "<form action='user_addcart.php' method='POST'>";
                                echo '<input type="hidden" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                                echo "<input type='hidden' name='product_id' value='$product_id'>"; // Replace 1 with the desired product ID
                                echo "<button type='submit' class='buy-button'>Add to Cart</button>";
                                echo "</form>";
                            } else {
                                echo "Product not found.";
                            }
                        ?>
                        </div>
                    </div>
                </div>

            <!-- <div class="row">
                
            </div> -->

    <div class="bottom-part">
            <h2>Only at ZCakes!</h2>
        </div>
    </div>


    <!-- Contact us function, filename: user_navbar_func.php-->
    <?php 
        renderContactSection(); 
    ?>
</body>
    <script src="js/bootstrap.js"></script>

    <!-- <script src="js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->

</html>
