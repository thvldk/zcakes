<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>About Us</title>
    <style>
        body {
            background-image: url("images/img.jpg");
            background-size: cover;
            background-position: cover;
            background-position: center;
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

        /* css - bottom part START here(contacts, follow us, and location) */
        .social-media a img {
            transform: scale(0.5);
            margin: 10px;
        }

        .container-fluid * {
            font-family: "Times New Roman", Times, serif;
            font-size: medium;
            margin-top: 5px;
        }

        .container-fluid h5 {
            font-weight: bolder;
        }

        /* css - bottom part ENDS here(contacts, follow us, and location) */

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
            align-items: center; /* Center vertically */
            justify-items: center; /* Center horizontally */
        }

        .grid-container:nth-child(even) {
            grid-template-columns: 1fr 1fr !important;
        }

        .grid-container img {
            width: 100%;
            height: auto;
            max-width: 350px
        }
    </style>
</head>
<body>
    <!-- navigation bar function, filename: user_navbar_func.php -->
    <?php
        include 'user_navbar_func.php';
        renderCustomNavbar();
    ?>
    <div class="container" style="padding-top: 10px;">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-12" style="background-color: transparent; border-radius: 20px; color: black; text-align: center;">
            <h2 class="mb-4">About Us</h2>
            <div class="grid-container">
                    <div>
                        <h4 class="mb-4">Our Story</h4>
                        <p>Our system is easy to use - customers can simply visit our website and choose the customization options they want for their cake. They can select the cake size, shape, flavor, frosting, and decorations. Once they're happy with their chosen designs, they can place the order and we'll take care of the rest!</p>
                    </div>
                    <img src="images/our-story.jpg" alt="Our Story">
                </div>

                <div class="grid-container">
                    <img src="images/what-we-sell.jpg" alt="What We Sell">
                    <div>
                        <h4 class="mb-4">What We Sell</h4>
                        <p>At our website, we sell customized cakes. Customers can choose from a variety of cake flavors, sizes, shapes, and decorations, creating a unique cake that's perfect for any occasion. We also offer add-ons like custom cake toppers, candles, and other accessories to make the cake even more special.</p>
                    </div>
                </div>

                <div class="grid-container">
                    <div>
                        <h4 class="mb-4">How to Order</h4>
                        <p>Our system is easy to use - customers can simply visit our website and choose the customization options they want for their cake. They can select the cake size, shape, flavor, frosting, and decorations. Once they're happy with their chosen designs, they can place the order and we'll take care of the rest!</p>
                    </div>
                    <img src="images/order.jpg" alt="Cakes">
                </div>

                <div class="grid-container">
                    <img src="images/target-market.jpg" alt="Our Target Market">
                    <div>
                        <h4 class="mb-4">Our Market</h4>
                        <p>Our target market is anyone who loves cake and wants a customized cake that's perfect for their needs. We cater to a wide range of events and occasions, including birthdays, weddings, baby showers, graduations, and more. Whether you're looking for a simple cake for a small gathering or an elaborate cake for a big event, we've got you covered.</p>
                    </div>
                </div>

                <div class="grid-container">
                    <div>
                        <h4 class="mb-4">Delivery and Scope</h4>
                        <p>We do not offer delivery for our products; instead, we offer the option of pickup at our location. Customers need to come to the shop personally and pick up their cakes on the specified date. Currently, our delivery scope covers only the Municipality of Oas, but we are looking to expand our reach in the future.</p>
                    </div>
                    <img src="images/packaging.jpg" alt="Delivery and Scope">
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <!-- Contact us function, filename: user_navbar_func.php -->
    <?php 
        renderContactSection(); 
    ?>
</body>
</html>
