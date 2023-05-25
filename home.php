<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>ZCAKES Landing Page</title>
    <style>
        body {
            background-image: url("images/img.jpg");
            background-attachment: fixed;
            overflow: auto; /* or overflow: scroll; */
            background-size: cover;
            background-position: flex;
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
        .content
        {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content .textBox
        {
            position: relative;
            max-width: 600px;
        }
        .content .textBox h2
        {
            color: black;
            font-size: 4em;
            font-weight: 1.2em;
            font-weight: 400;
            font-family: sans-serif;
        }
        .content .textBox h2 span
        {
            color: deeppink;
            font-size: 1.2em;
            font-weight: bolder;
            font-style: italic;
            font-family: 'Poppins';
        }
        .content .textBox p
        {
            color: black;
            font-family: Arial, sans-serif;
            text-align: justify;
            letter-spacing: 1px;
        }
        
        .content .imgBox
        {
            width: 600px;
            display: flex;
            justify-content: flex-end;
            padding-right: 50px;
            margin-top: 5px;
        }
        .content .imgBox img
        {
          max-width: 450px;
        }
       
        .white-container {
         background-color: white;
         padding: 20px;
        border-radius: 10px;
        }

        .category-container {
        text-align: center;
        padding: 15px;
        }

        .category-image {
        width: 100%;
        max-width: 300px; /* Adjust the max-width value as needed */
        height: auto;
        }  

        .social-media a img {
            transform: scale(0.5);
            margin: 10px;
        }
        .container-fluid * {
            font-family: "Times New Roman", Times, serif;
            font-size: medium;
            margin-top: 5px;
        }
        .container-fluid h5{
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <!-- navigation bar function, filename: user_navbar_func.php-->
    <?php
        include 'user_navbar_func.php';
        renderCustomNavbar();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="content">
                    <div class="textbox">
                        <h2 class="ms-3 mb-3">Design a cake of your own. Only <br>with <span>ZCAKES</span></h2>
                            <p>Welcome to ZCakes, your local home-based cake shop specializing in custom-made cupcakes and cakes!
                                We create unique and personalized cakes and cupcakes that are perfect for any occasion. From birthdays 
                                and weddings to baby showers and holidays! So why settle for generic store-bought cakes when you can have 
                                a custom-made dessert that reflects your individual style and taste? Come taste the difference and let us 
                                sweeten your day at ZCakes!
                            </p>
                        </div>
                    </div>
                    <div class="text-center" style="border-radius: 15px;">
                         <a class="btn btn-transparent mx-auto text-wrap bg-white me-5" href="products.php">ORDER NOW!</a>
                    </div>
            </div>
            <div class="col-sm-1 d-lg-grid"></div>
            <div class="col-sm-2">
                <div class="imgBox">
                    <img src="images/1cakes.png" alt="cake" class="zcakes">
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="white-container">
    <div class="row">
        <div class="col-12 text-center">
        <h3 class="my-4 font-weight-bold text-pink">WELCOME TO ZCAKES CORNER!</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="category-container">
                <div class="transparent-container">
                    <img src="images/cake-category.jpg" alt="Cake" class="category-image">
                    <h4 class="mb-3">Cake</h4>
                    <p>Explore our delicious assortment of custom-made cakes that are beautifully designed and crafted to perfection. From classic flavors to unique creations, we have a cake for every celebration.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="category-container">
                <div class="transparent-container">
                    <img src="images/bento-category.jpg" alt="Bento" class="category-image">
                    <h4 class="mb-3">Bento</h4>
                    <p>Indulge in our delightful bento creations that combine flavors, colors, and artistry. These personalized bento boxes are perfect for adding a touch of elegance and creativity to your special events.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="category-container">
                <div class="transparent-container">
                    <img src="images/cupcake-category.jpg" alt="Cupcake" class="category-image">
                    <h4 class="mb-3">Cupcake</h4>
                    <p>Discover our delectable assortment of cupcakes that are expertly baked and adorned with unique decorations. These bite-sized treats are perfect for any occasion or as a sweet indulgence.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
        <a class="btn btn-dark mx-auto text-wrap bg-pink me-5" href="user_customize.php">GET CUSTOMIZED</a>
        </div>
</div>
    </div>

    <hr class="my-4">

    <div class="container">
    <div class="row">
        <div class="col-12 text-center">
        <h3 class="my-4 font-weight-bold text-black" style="font-family: sans-serif;">ZCAKES GALLERY</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <img src="images/product1.jpg" alt="Product 1" class="img-fluid">
        </div>
        <div class="col-sm-4">
            <img src="images/product2.jpg" alt="Product 2" class="img-fluid">
        </div>
        <div class="col-sm-4">
            <img src="images/product3.jpg" alt="Product 3" class="img-fluid">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-4">
            <img src="images/product4.jpg" alt="Product 4" class="img-fluid">
        </div>
        <div class="col-sm-4">
            <img src="images/product5.jpg" alt="Product 5" class="img-fluid">
        </div>
        <div class="col-sm-4">
            <img src="images/product6.jpg" alt="Product 6" class="img-fluid">
        </div>
    </div>
</div>


     <?php 
        renderContactSection(); 
    ?>
</body>
<script type="text/javascript">
    function toggleMenu()
    {
      var menuToggle = document.querySelector('.toggle');
      menuToggle.classList.toggle('active')
      if (menuToggle.classList.contains('active')) 
      {
        // Show the close icon
        menuToggle.style.backgroundImage = 'url(images/close.png)';
      } else 
      {
        // Show the menu icon
        menuToggle.style.backgroundImage = 'url(images/menu.png)';
      }
      var navigation = document.querySelector('.navigation')
      navigation.classList.toggle('active')
      }
</script>

<script src="js/bootstrap.js"></script>
</html>