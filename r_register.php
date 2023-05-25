<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body class="registration">
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
      <form action="r_submit.php" method="post">
        <h2>Register</h2>
        <div class="form-group">
          <label>Name</label>
          <input type="text" placeholder="Name" required name="name">
        </div>
        <div class="form-group">
          <span>Email</span>
          <input type="email" placeholder="Email" required name="email">
          <span>Username</span>
          <input type="text" placeholder="Username" required name="username">
        </div>
        <div class="form-group">
          <span>Phone Number</span>
          <input type="text" placeholder="Phone Number" required name="phone">
        </div>
        <div class="form-group">
          <span>Address</span>
          <input type="text" placeholder="Address" required name="address">
        </div>
        <div class="form-group">
          <span>Password</span>
          <input type="password" placeholder="Password" required name="password">
          <span>Confirm Password</span>
          <input type="password" placeholder="Confirm Password" required name="confirmPassword">
        </div>
        <div class="form-group">
          <input type="checkbox" name="terms" required>
          <label for="terms">I agree to the <a href="#">terms and conditions</a>.</label>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
      <div class="bottom-text">
        <p>Already have an account? <a href="l_login.php">Login here</a>.</p>
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
    <script>
    const form = document.querySelector("form");
    const passwordField = form.querySelector("input[name='password']");
    const confirmPasswordField = form.querySelector("input[name='confirmPassword']");

    form.addEventListener("submit", (event) => {
      if (passwordField.value !== confirmPasswordField.value) {
        event.preventDefault();
        const errorMessage = document.createElement("p");
        errorMessage.textContent = "Passwords do not match. Please make sure the passwords you entered match.";
        form.appendChild(errorMessage);
      }
    });
</script>
</html>
