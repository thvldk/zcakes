<?php
include_once "../conn_db.php";

// Get the form data
$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
$item_category = mysqli_real_escape_string($conn, $_POST['item_category']);
$details_id = mysqli_real_escape_string($conn, $_POST['product_desc']);
$product_price = mysqli_real_escape_string($conn, $_POST['product_price']);

$upload_msg ="";
$target_file ="";

// Check if the product already exists in the product table
if (is_existing($conn, $product_name, 'product_name', 'z_products')) {
    
    // Get the product_id of the existing product
    $query = "SELECT product_id FROM z_products WHERE product_name='$product_name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $product_id = $row['product_id'];

    // Update the existing product's information in the products table
    $query = "UPDATE z_products SET category_id='$item_category', product_price='$product_price', product_desc='$details_id' WHERE product_id='$product_id'";
    mysqli_query($conn, $query);

}
else 
{
// Upload the image file
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["product_img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["product_img"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
// if (is_existing($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// Check file size
if ($_FILES["product_img"]["size"] > 50000000) { // 50mb image size
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
 
   // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file)) {
        $upload_msg .= "";
        // Insert the new product and related tables data into the database:
        if (!empty($product_name) && !empty($details_id) && !empty($product_price)) {
            // Insert the new product's information into the products table
            $query = "INSERT INTO z_products (product_name, category_id, product_price, details_id, product_file) VALUES ('$product_name', '$category_id', '$product_price', '$details_id', '$target_file')";
            mysqli_query($conn, $query);

            // Get the product_id of the newly inserted product
            $product_id = mysqli_insert_id($conn);
            $msg="product successfully Added";

            // Redirect the user to the product list page
            header("Location: index.php?addproduct&msg=$msg");
            exit();
        } else {
            // Display an error message if any required field is empty
            $upload_msg .= "Please fill in all required fields.";
        }
    } 
    else {
        // Display an error message if the file was not moved successfully
        $upload_msg .= "Sorry, there was an error uploading your file.";
    }
}

}

 