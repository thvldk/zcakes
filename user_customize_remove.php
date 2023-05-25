<?php

include_once "conn_db.php";

if(isset($_GET['details_id'])){
    $item_id = $_GET['details_id'];
    $params = array($item_id);
    
    if(query($conn, "DELETE FROM z_details WHERE details_id = ?", $params) ){
       header("location: user_customize_view.php?product_delete=done");
       exit();
    }
    else{
       header("location: user_customize_view.php?product_delete=failed");
       exit();
    } 
}
?>