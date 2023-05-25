<?php
    include_once "conn_db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" 
	content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Cake Customization Form</title>
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
        .c-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .c-button:hover {
            background-color: #ff6b6b;
            color: black;
        }

        .c-button:hover{
            background-color: #ff6b6b;
            color: black;
        }

        .card_size{
            width: 280px;
            margin: 30px;
        }

    </style>

</head>
<?php
        include 'user_navbar_func.php';
        renderCustomNavbar();

        include("user_customize_func.php");
    ?>
<body>
    <div class="container">
        <h1 class='text-center'>Choose What You Want to Customize</h1>
    </div>

    <div class="container" id="product-cards">
        <div class="row text-center">

            <!-- Cake -->
            <div class="col-sm-4 card_size">
                <div class="card" style="width: 18rem;">

                    <?php
                        $cat_details = getCategory(1, $conn); // Replace 1 with the desired product ID

                        if ($cat_details) {
                            $cat_id = $cat_details['category_id'];
                            $cat_name = $cat_details['item_category'];
                            $cat_photo = $cat_details['category_photo'];

                            echo "<input type='hidden' name='cat_id' value='$cat_id'>";

                            echo "<img src='$cat_photo' class='card-img-top' alt='Cake'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>$cat_name</h5>";
                            echo "<p> A homemade customized cake is a personalized and delectable creation, crafted with love and adorned with unique designs to make any occasion extra special.</p>";
                            echo "<div class='text-center'>";
                            echo "<a href='user_customize_cake.php' class='c-button btn btn-dark'>Customize</a>";
                            echo "</div>";
                            echo "</div>";
                        }else{
                            echo "Category not found.";
                        }
                    ?>
                </div>
            </div>

            <!-- Bento Cake -->
            <div class="col-sm-4 card_size">
                <div class="card" style="width: 18rem;">

                    <?php
                        $cat_details = getCategory(2, $conn); // Replace 1 with the desired product ID

                        if ($cat_details) {
                            $cat_id = $cat_details['category_id'];
                            $cat_name = $cat_details['item_category'];
                            $cat_photo = $cat_details['category_photo'];

                            echo "<input type='hidden' name='cat_id' value='$cat_id'>";

                            echo "<img src='$cat_photo' class='card-img-top' alt='Cake'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>$cat_name</h5>";
                            echo "<p> A bento cake is a delightful and edible work of art, meticulously designed to resemble a traditional Japanese bento box, filled with adorable and delicious treats.</p>";
                            echo "<div class='text-center'>";
                            echo "<a href='user_customize_bento.php' class='c-button btn btn-dark'>Customize</a>";
                            echo "</div>";
                            echo "</div>";
                        }else{
                            echo "Category not found.";
                        }
                    ?>
                </div>
            </div>
    
            <!-- Cupcake -->
            <div class="col-sm-4 card_size">
                <div class="card" style="width: 18rem;">

                    <?php
                        $cat_details = getCategory(3, $conn); // Replace 1 with the desired product ID

                        if ($cat_details) {
                            $cat_id = $cat_details['category_id'];
                            $cat_name = $cat_details['item_category'];
                            $cat_photo = $cat_details['category_photo'];

                            echo "<input type='hidden' name='cat_id' value='$cat_id'>";

                            echo "<img src='$cat_photo' class='card-img-top' alt='Cake'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>$cat_name</h5>";
                            echo "<p>A homemade cupcake, where moist cake and creamy frosting combine in a single bite, adorned with delightful decorations that reflect your personal style and celebration.</p>";
                            echo "<div class='text-center'>";
                            echo "<a href='user_customize_cupcake.php' class='c-button btn btn-dark'>Customize</a>";
                            echo "</div>";
                            echo "</div>";
                        }else{
                            echo "Category not found.";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

           


</body>
    <script src="js/bootstrap.js"></script>
</html>


