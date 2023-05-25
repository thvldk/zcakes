<?php

include_once "conn_db.php";

if(isset($_GET['product_id'])){
    $item_id = $_GET['product_id'];
    $params = array($item_id);
    
    if(query($conn, "DELETE FROM z_products WHERE product_id = ?", $params) ){
       header("location: user_customize_confirmation.php?product_delete=done");
       exit();
    }
    else{
       header("location: user_customize_confirmation.php?product_delete=failed");
       exit();
    } 
}

?>