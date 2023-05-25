<?php
include_once "../conn_db.php";

if(isset($_POST['username'])){
    $n_name=$_POST['name'];
    $n_email=$_POST['email'];
    $n_username=$_POST['username'];
    $n_password=$_POST['password'];
    $p_address = $_POST['address'];
    $p_phone = $_POST['phone'];
    
    $p_user_type = $_POST['user_type'];
    $p_user_type = strtoupper($p_user_type);
    
    $table = "z_user";
    $fields = array('username' => $n_username
                    , 'name' => $n_name 
                    , 'email' => $n_email  
                    , 'password' => $n_password
                    , 'address' => $p_address
                    , 'phone' => $p_phone
                    , 'user_type' => $p_user_type 
                   );
    
    if(insert($conn, $table, $fields) ){
        header("location: index.php?newuser&new_record=added");
        exit();
    }  
    else{
        header("location: new_user.php?newuser&new_record=failed");
        exit();
    }
}
?>