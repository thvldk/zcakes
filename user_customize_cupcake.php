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
    <title>Cupcake Customization</title>
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

.step {
    display: none;
}

.summary {
    margin-top: 20px;
}

.progress-bar {
    transition: width 0.3s ease-in-out;
}

.options {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.options .form-check-input {
    display: none;
}

.next-btn,
.prev-btn {
    margin-top: 10px;
}

.image-size{
    width: 100px; 
    height: 100px;"
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
        <form action="user_customize_insert.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3 border border-dark" style="background-color: pink;">
                        <div class="card-body">
                            <h1 class="card-title text-center">Build Your Own Cupcake</h1>
                        </div>
                            <?php
                                $cat_details = getCategory(3, $conn); // Replace 1 with the desired product ID
                                if ($cat_details) {
                                    $cat_id = $cat_details['category_id'];
                                    echo "<input type='hidden' name='cat_id' value='$cat_id'>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="mt-4 progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="progressBar">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width: 100%">Progress</div>
                </div>
          
                <!-- Cupcake Shape -->

                <div class="card mt-3 border border-dark" style="background-color: pink;">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Step 1: Select Cupcake Filling</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $filling = getCcFilling(1, $conn);
                                        if ($filling) {
                                            $filling_id = $filling['cc_filling_id'];
                                            $cc_filling = $filling['cupcake_filling'];
                                            $filling_photo = $filling['cc_filling_img'];
	                                        $filling_price = $filling['filling_price']; ?>
                                    <input class="form-check-input" type="radio" name="cc_filling" id="<?php echo "filling$filling_id"; ?>" value="<?php echo $filling_id; ?>" onchange="updateProgressBar(25, 'filling')" required>
                                    <label class="form-check-label" for="<?php echo "filling$filling_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $filling_photo; ?>" alt="<?php echo $filling_photo; ?>">
                                        <div class="text-center"><?php echo $cc_filling; ?></div>

                                        <input type='hidden' name='filling_price' value='<?php echo "$filling_price"; ?>'>

                                    </label>
                                    <?php 
                                    } else { echo "Shape not found."; } ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $filling = getCcFilling(2, $conn);
                                        if ($filling) {
                                            $filling_id = $filling['cc_filling_id'];
                                            $cc_filling = $filling['cupcake_filling'];
                                            $filling_photo = $filling['cc_filling_img'];
	                                        $filling_price = $filling['filling_price']; ?>
                                    <input class="form-check-input" type="radio" name="cc_filling" id="<?php echo "filling$filling_id"; ?>" value="<?php echo $filling_id; ?>" onchange="updateProgressBar(25, 'filling')" required>
                                    <label class="form-check-label" for="<?php echo "filling$filling_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $filling_photo; ?>" alt="<?php echo $filling_photo; ?>">
                                        <div class="text-center"><?php echo $cc_filling; ?></div>

                                        <input type='hidden' name='filling_price' value='<?php echo "$filling_price"; ?>'>

                                    </label>
                                    <?php 
                                    } else { echo "Shape not found."; } ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $filling = getCcFilling(3, $conn);
                                        if ($filling) {
                                            $filling_id = $filling['cc_filling_id'];
                                            $cc_filling = $filling['cupcake_filling'];
                                            $filling_photo = $filling['cc_filling_img'];
	                                        $filling_price = $filling['filling_price']; ?>
                                    <input class="form-check-input" type="radio" name="cc_filling" id="<?php echo "filling$filling_id"; ?>" value="<?php echo $filling_id; ?>" onchange="updateProgressBar(25, 'filling')" required>
                                    <label class="form-check-label" for="<?php echo "filling$filling_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $filling_photo; ?>" alt="<?php echo $filling_photo; ?>">
                                        <div class="text-center"><?php echo $cc_filling; ?></div>

                                        <input type='hidden' name='filling_price' value='<?php echo "$filling_price"; ?>'>

                                    </label>
                                    <?php 
                                    } else { echo "Shape not found."; } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Capcake Size -->

                <div class="card mt-3 border border-dark" style="background-color: pink;">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Step 2: Select Cupcake Size</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $size = getCcsize(1, $conn); // Replace 1 with the desired size ID
                                        if ($size) {
                                            $cc_size_id = $size['cupcake_size_id'];
                                            $cc_size = $size['cupcake_size'];
                                            $cc_img = $size['cc_size_img'];
                                            $cc_price = $size['cc_size_price'];
                                        ?>
                                    <input class="form-check-input" type="radio" name="cc_size" id="<?php echo "size$cc_size_id"; ?>" value="<?php echo $cc_size_id; ?>" onchange="updateProgressBar(25, 'size')" required>
                                    <label class="form-check-label" for="<?php echo "size$size_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $cc_img; ?>" alt="<?php echo $cc_img; ?>">
                                        <div class="text-center"><?php echo $cc_size; ?></div>

                                        <input type='hidden' name='cc_price' value='<?php echo "$cc_price"; ?>'>

                                    </label>
                                    <?php 
                                    } else { echo "Size not found."; } ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $size = getCcsize(2, $conn); // Replace 1 with the desired size ID
                                        if ($size) {
                                            $cc_size_id = $size['cupcake_size_id'];
                                            $cc_size = $size['cupcake_size'];
                                            $cc_img = $size['cc_size_img'];
                                            $cc_price = $size['cc_size_price'];
                                        ?>
                                    <input class="form-check-input" type="radio" name="cc_size" id="<?php echo "size$cc_size_id"; ?>" value="<?php echo $cc_size_id; ?>" onchange="updateProgressBar(25, 'size')" required>
                                    <label class="form-check-label" for="<?php echo "size$size_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $cc_img; ?>" alt="<?php echo $cc_img; ?>">
                                        <div class="text-center"><?php echo $cc_size; ?></div>
                                        
                                        <input type='hidden' name='cc_price' value='<?php echo "$cc_price"; ?>'>

                                    </label>
                                    <?php 
                                    } else { echo "Size not found."; } ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Cupcake Flavor -->

                <div class="card mt-3 border border-dark" style="background-color: pink;">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Step 3: Select Cupcake Flavor</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $flavor = getFlavor(1, $conn); // Replace 1 with the desired flavor ID
                                        if ($flavor) {
                                            $flavor_id = $flavor['flavor_id'];
                                            $cake_flavor = $flavor['cake_flavor'];
                                            $flavor_img = $flavor['flavor_img'];
                                            $flavor_price = $flavor['flavor_price']; ?>
                                    <input class="form-check-input" type="radio" name="flavor" id="<?php echo "flavor$flavor_id"; ?>" value="<?php echo $flavor_id; ?>" onchange="updateProgressBar(25, 'flavor')" required>
                                    <label class="form-check-label" for="<?php echo "flavor$flavor_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $flavor_img; ?>" alt="<?php echo $flavor_img; ?>">
                                        <div class="text-center"><?php echo $cake_flavor; ?></div>
                                        
                                        <input type='hidden' name='flavor_price' value='<?php echo "$flavor_price"; ?>'>
                                        
                                    </label>
                                    <?php 
                                    } else { echo "Flavor not found."; } ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $flavor = getFlavor(2, $conn); // Replace 1 with the desired flavor ID
                                        if ($flavor) {
                                            $flavor_id = $flavor['flavor_id'];
                                            $cake_flavor = $flavor['cake_flavor'];
                                            $flavor_img = $flavor['flavor_img'];
                                            $flavor_price = $flavor['flavor_price']; ?>
                                    <input class="form-check-input" type="radio" name="flavor" id="<?php echo "flavor$flavor_id"; ?>" value="<?php echo $flavor_id; ?>" onchange="updateProgressBar(25, 'flavor')" required>
                                    <label class="form-check-label" for="<?php echo "flavor$flavor_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $flavor_img; ?>" alt="<?php echo $flavor_img; ?>">
                                        <div class="text-center"><?php echo $cake_flavor; ?></div>

                                        <input type='hidden' name='flavor_price' value='<?php echo "$flavor_price"; ?>'>

                                    </label>
                                    <?php 
                                    } else { echo "Flavor not found."; } ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $flavor = getFlavor(3, $conn); // Replace 1 with the desired flavor ID
                                        if ($flavor) {
                                            $flavor_id = $flavor['flavor_id'];
                                            $cake_flavor = $flavor['cake_flavor'];
                                            $flavor_img = $flavor['flavor_img'];
                                            $flavor_price = $flavor['flavor_price']; ?>
                                    <input class="form-check-input" type="radio" name="flavor" id="<?php echo "flavor$flavor_id"; ?>" value="<?php echo $flavor_id; ?>" onchange="updateProgressBar(25, 'flavor')" required>
                                    <label class="form-check-label" for="<?php echo "flavor$flavor_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $flavor_img; ?>" alt="<?php echo $flavor_img; ?>">
                                        <div class="text-center"><?php echo $cake_flavor; ?></div>

                                        <input type='hidden' name='flavor_price' value='<?php echo "$flavor_price"; ?>'>

                                    </label>
                                    <?php 
                                    } else { echo "Flavor not found."; } ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $flavor = getFlavor(4, $conn); // Replace 1 with the desired flavor ID
                                        if ($flavor) {
                                            $flavor_id = $flavor['flavor_id'];
                                            $cake_flavor = $flavor['cake_flavor'];
                                            $flavor_img = $flavor['flavor_img'];
                                            $flavor_price = $flavor['flavor_price']; ?>
                                    <input class="form-check-input" type="radio" name="flavor" id="<?php echo "flavor$flavor_id"; ?>" value="<?php echo $flavor_id; ?>" onchange="updateProgressBar(25, 'flavor')" required>
                                    <label class="form-check-label" for="<?php echo "flavor$flavor_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $flavor_img; ?>" alt="<?php echo $flavor_img; ?>">
                                        <div class="text-center"><?php echo $cake_flavor; ?></div>

                                        <input type='hidden' name='flavor_price' value='<?php echo "$flavor_price"; ?>'>
                                        
                                    </label>
                                    <?php 
                                    } else { echo "Flavor not found."; } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Cupcake Frosting -->

                <div class="card mt-3 border border-dark" style="background-color: pink;">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Step 4: Select Cupcake Frosting</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $frosting = getFrosting(1, $conn); // Replace 1 with the desired frosting ID
                                        if ($frosting) {
                                            $frosting_id = $frosting['frosting_id'];
                                            $cake_frosting = $frosting['cake_frosting'];
                                            $frosting_img = $frosting['frosting_img'];
                                            $frosting_price = $frosting['frosting_price']; ?>
                                    <input class="form-check-input" type="radio" name="frosting" id="<?php echo "frosting$frosting_id"; ?>" value="<?php echo $frosting_id; ?>" onchange="updateProgressBar(25, 'frosting')" required>
                                    <label class="form-check-label" for="<?php echo "frosting$frosting_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $frosting_img; ?>" alt="<?php echo $cake_frosting; ?>">
                                        <div class="text-center"><?php echo $cake_frosting; ?></div>

                                        <input type='hidden' name='frosting_price' value='<?php echo "$frosting_price"; ?>'>

                                    </label>
                                    <?php 
                                    } else { echo "frosting not found."; } ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $frosting = getFrosting(2, $conn); // Replace 1 with the desired frosting ID
                                        if ($frosting) {
                                            $frosting_id = $frosting['frosting_id'];
                                            $cake_frosting = $frosting['cake_frosting'];
                                            $frosting_img = $frosting['frosting_img'];
                                            $frosting_price = $frosting['frosting_price']; ?>
                                    <input class="form-check-input" type="radio" name="frosting" id="<?php echo "frosting$frosting_id"; ?>" value="<?php echo $frosting_id; ?>" onchange="updateProgressBar(25, 'frosting')" required>
                                    <label class="form-check-label" for="<?php echo "frosting$frosting_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $frosting_img; ?>" alt="<?php echo $cake_frosting; ?>">
                                        <div class="text-center"><?php echo $cake_frosting; ?></div>

                                        <input type='hidden' name='frosting_price' value='<?php echo "$frosting_price"; ?>'>

                                    </label>
                                    <?php 
                                    } else { echo "frosting not found."; } ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <?php
                                        $frosting = getFrosting(3, $conn); // Replace 1 with the desired frosting ID
                                        if ($frosting) {
                                            $frosting_id = $frosting['frosting_id'];
                                            $cake_frosting = $frosting['cake_frosting'];
                                            $frosting_img = $frosting['frosting_img'];
                                            $frosting_price = $frosting['frosting_price']; ?>
                                    <input class="form-check-input" type="radio" name="frosting" id="<?php echo "frosting$frosting_id"; ?>" value="<?php echo $frosting_id; ?>" onchange="updateProgressBar(25, 'frosting')" required>
                                    <label class="form-check-label" for="<?php echo "frosting$frosting_id"; ?>">
                                        <img class="image-size border border-dark" src="<?php echo $frosting_img; ?>" alt="<?php echo $cake_frosting; ?>">
                                        <div class="text-center"><?php echo $cake_frosting; ?></div>

                                        <input type='hidden' name='frosting_price' value='<?php echo "$frosting_price"; ?>'>
                                        
                                    </label>
                                    <?php 
                                    } else { echo "frosting not found."; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3 border border-dark" style="background-color: pink;">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Step 5: Enter Message or Request</h3>
                        <div class="row">
                            <div class="form-group">
                                <textarea class="form-control" name="item_desc"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col text-center">
        <button type="button" class="btn btn-secondary mb-3 btn-lg" onclick="goBack()">BACK</button>
        <button type="submit" class="btn btn-success mb-3 btn-lg btn-block">SUBMIT</button>
    </div>
</form>

</body>
    <script src="js/bootstrap.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>

    <script>
  const selectedCards = {};

  function updateProgressBar(value, cardType) {
    if (!selectedCards[cardType]) {
      const progressBar = document.getElementById('progressBar');
      const currentWidth = parseInt(progressBar.getAttribute('aria-valuenow'));
      const newWidth = currentWidth + value;
      progressBar.setAttribute('aria-valuenow', newWidth);
      progressBar.style.width = newWidth + '%';

      selectedCards[cardType] = true;
    }
  }
  function goBack() {
        window.history.back();
    }
</script>

</html>