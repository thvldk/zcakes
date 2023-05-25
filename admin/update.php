<?php
include_once "../conn_db.php";

if(isset($_POST['product_id'])){
    // Get the form data
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $product_desc = mysqli_real_escape_string($conn, $_POST['product_desc']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    
    
$isPriceAdjusted = True;
 
// Upload the image file
// initialize variable
$upload_msg ="";
$product_filename="";
$target_file ="";
$target_dir = "../img/";
$uploadOk = 1;
$err_msg="";
$mode=0;
    
 // the image change so this will execute
//check if there is file to upload
if(isset($_FILES['product_image']) && $_FILES['product_image']['error'] != UPLOAD_ERR_NO_FILE ){
    $mode=1;  
    $product_filename = basename($_FILES["product_image"]["name"]);
    $target_file = $target_dir . $product_filename;
    $new_file_ind = 1;
    $uploadOk = 1;
    
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
    if($check !== false) {
        //$upload_msg .= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else {
        $upload_msg .= "File is not an image.<br>";
        $uploadOk = 0;
    }
    
        // Check file size
    if ($_FILES["product_image"]["size"] > 50000000) {
        $upload_msg .= "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp" ) {
        $upload_msg .= "Sorry, only JPG, JPEG, PNG, webp & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $upload_msg .= "Sorry, your file cannot be uploaded.<br>";
    } 
    else {
        //initialize variables
        $newbasename=$product_name . "." .$imageFileType;
        $newfilename=$target_dir . $newbasename;
         
        
        //check if upload is done.
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $newfilename)) {
                $upload_msg .= "The product Image has been updated.<br>";
                
                //initiate update parameters
                $table = "z_products";
                $fields =array("product_desc" => $product_desc,

                            "cat_id" => $category_name,
                            "product_file" => $newbasename
                            );
                $filter =array("product_id" => $product_id);
                
                update($conn, $table, $fields, $filter);
                
                //pricing
                
                if($isPriceAdjusted){
                    $update_product_price = "UPDATE z_products
                        SET product_price = ?
                        WHERE product_id = ?";
                                            
                    query($conn, $update_product_price, array($product_price, $product_id));
                                     
                    $err_msg .= "Pricing Adjusted for {$product_name}.";
                }
            
         }
         else{
                 $upload_msg .= "The file ". htmlspecialchars( $product_filename). " was not uploaded. <br>";
            }   
    }
}
else {
$mode = 2;
    // the image did not change so this will execute
    
    $table = "z_products";
    $fields =array("product_desc" => $product_desc,
                "cat_id" => $category_name
                );
    $filter =array("product_id" => $product_id);
                
    update($conn, $table, $fields, $filter);
    
    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $newfilename)) {
        $upload_msg .= "The product Image has been updated.<br>";
                    
        //initiate update parameters
        $table = "z_products";
        $fields =array("product_desc" => $product_desc,
                                    
                    "cat_id" => $category_name,
                    "product_file" => $newbasename
                    );
        $filter =array("product_id" => $product_id);
                    
        update($conn, $table, $fields, $filter);
                    
        //pricing
        
        if($isPriceAdjusted){

        $update_product_price = "UPDATE z_products
            SET product_price = ?
            WHERE product_id = ?";
                                                
            query($conn, $update_product_price, array($product_price, $product_id));
                                         
                $err_msg .= "Pricing Adjusted for {$product_name}.";
            }
                
        }
                    
    }
    if( $err_msg != "" || $upload_msg != ""){
        $err_msg = $err_msg . "</br>" . $upload_msg;
    }else{
        $err_msg = "No Updates Made for $product_name";
     }

header("location: index.php?updateproduct=$product_id&status=$err_msg&mode=$mode");
exit();
}

