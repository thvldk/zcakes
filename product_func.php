<?php 
    function getProductDetails($product_id, $conn) {
        $sql = "SELECT * FROM z_products WHERE product_id = $product_id";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    
            $product_details = array(
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'product_price' => $row['product_price'],
                'product_img' => $row['product_img']
            );
    
            return $product_details;
        } else {
            return null;
        }
    }
    
?>