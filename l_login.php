<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="login">
    <header>
        <div class="left-section">
          <a href="index.php" class="home-link"><img src="images/zcakes logo.png" alt="zcakes logo" class="logo"></a>
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="products.php">PRODUCTS</a></li>
            <li><a href="about_us.php">ABOUT US</a></li>
          </ul>
        </div>
      </header>
    <div class="container">
      <form action="l_login_con.php" method="post">
        <h2>Login</h2>
        <div class="form-group">
          <span>Username</span>
          <input type="text" placeholder="Username" name="username">
        </div>
        <div class="form-group">
          <span>Password</span>
          <input type="password" placeholder="Password" name="password">
        </div>
        <div class="button">
          <input type="submit" value="Login">
        </div>
      </form>
      <div class="switch">
        <p>Don't have an account yet?</p>
        <a href="r_register.php">Register</a>
      </div>
    </div>
    <footer>
        <div class="contact-info">
          <h4>CONTACT US</h4>
          <p>Phone:    0916 352 0506</p>
          <p>Email:    <a href="mailto:suzethbuizacam@gmail.com">suzethbuizacam@gmail.com</a></p>
        </div>
        <div class="social-media">
          <h4>FOLLOW US</h4>
          <a href="https://web.facebook.com/Zcakesalbay" target="_blank"><img src="images/facebook.png" alt="Facebook"></a>
          <a href="https://www.instagram.com/zcakes_albay" target="_blank"><img src="images/instagram.png" alt="Instagram"></a>
          <a href="https://www.tiktok.com/@zcakes_albay" target="_blank"><img src="images/tiktok.png" alt="Tiktok"></a>
        </div>    
        <div class="location">
          <h4>LOCATION</h4>
          <p>Austero Street, Iraya Sur, <br>
            Oas, Albay, Philippines, 4505</p>
        </div>
      </footer>  
  </body>
</html>
