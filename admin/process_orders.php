<?php 
include_once("../conn_db.php");
if(isset($_GET['conf_ord'])){
    $ref_num = mysqli_real_escape_string($conn, htmlentities($_GET['conf_ord']));
    
    $table="z_orders";
    $fields=array("order_status" => 'D');
    $filter=array("ref_num" => $ref_num);
    
    if(update($conn, $table, $fields , $filter )){
        header("location: index.php?confirm_pending_orders&status=confirmed");
    }
                                         
}
if(isset($_GET['ship_ord'])){
    $ref_num = mysqli_real_escape_string($conn, htmlentities($_GET['ship_ord']));
    
    $table="z_orders";
    $fields=array("order_status" => 'O');
    $filter=array("ref_num" => $ref_num);
    
    if(update($conn, $table, $fields , $filter )){
        header("location: index.php?ship_order&status=shipped");
    }
                                         
}

?>