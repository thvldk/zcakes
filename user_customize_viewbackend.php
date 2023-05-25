<?php
include_once "conn_db.php";

// Your existing code

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['details_id'])) {
        $details_id = $_POST['details_id'];
        $user_id = $_SESSION['user_id'];
        
        // Check if the details_id already exists in the z_products table
        $stmt_check = $db->prepare("SELECT COUNT(*) FROM z_products WHERE details_id = :details_id");
        $stmt_check->bindValue(':details_id', $details_id);
        $stmt_check->execute();
        $count = $stmt_check->fetchColumn();

        if ($count > 0) {
            // If the details_id exists, update the date
            date_default_timezone_set('Asia/Manila');
            $date_added = date('Y-m-d H:i:s'); // Update the date to the current timestamp

            $sql_update = "UPDATE z_products SET date_added = :date_added WHERE details_id = :details_id";
            $stmt_update = $db->prepare($sql_update);
            $stmt_update->bindValue(':date_added', $date_added);
            $stmt_update->bindValue(':details_id', $details_id);
            $stmt_update->execute();
        } else {
            // If the details_id does not exist, insert the data into the z_products table
            // Retrieve the selected details from the database based on details_id
            $stmt_details = $db->prepare("SELECT * FROM z_details WHERE details_id = :details_id");
            $stmt_details->bindValue(':details_id', $details_id);
            $stmt_details->execute();
            $row = $stmt_details->fetch(PDO::FETCH_ASSOC);
            
            // Extract details from the retrieved row
            $category_id = $row['category_id'];
            $product_name = 'New Product'; // Set the appropriate product name based on the details
            $product_price = $row['total_price'];
            $product_img = ''; // Add the appropriate image URL here
            $date_added = $row['date_added'];
            $product_status = 'A'; // Set the appropriate status
            

            // Insert the data into the z_products table
            $sql_insert = "INSERT INTO z_products (user_id, category_id, details_id, product_name, product_price, product_img, date_added, product_status)
                    VALUES (:user_id, :category_id, :details_id, :product_name, :product_price, :product_img, :date_added, :product_status)";
            $stmt_insert = $db->prepare($sql_insert);
            $stmt_insert->bindValue(':category_id', $category_id);
            $stmt_insert->bindValue(':details_id', $details_id);
            $stmt_insert->bindValue(':user_id', $user_id);
            $stmt_insert->bindValue(':product_name', $product_name);
            $stmt_insert->bindValue(':product_price', $product_price);
            $stmt_insert->bindValue(':product_img', $product_img);
            $stmt_insert->bindValue(':date_added', $date_added);
            $stmt_insert->bindValue(':product_status', $product_status);
            $stmt_insert->execute();
        }

        // Redirect to checkout.php after successful insertion or update
        header("Location: user_customize_confirmation.php");
        exit;
    }
}
?>
