<?php

    // php for submiting the inputed data on the register

include_once "conn_db.php";

if(isset($_POST['username'])){
    $n_name=$_POST['name'];
    $n_email=$_POST['email'];
    $n_phone = $_POST['phone'];
    $n_address = $_POST['address'];

    // $n_password = password_hash($_POST['password'], PASSWORD_ARGON2ID);

    $n_username=$_POST['username'];
    $n_password=$_POST['password'];
    
    $table = "z_user";
    $fields = array('username' => $n_username
                    , 'name' => $n_name
                    , 'email' => $n_email
                    , 'phone' => $n_phone
                    , 'password' => $n_password
                    , 'address' => $n_address
                    );

    $filter = array($n_username);
    $sql = "SELECT `name`, `address`, `phone`, `email`, `username`, `password` FROM `z_user` WHERE `username` = ?";
    $result = query($conn, $sql, $filter);
                
    //if $result is empty, the param $r_emailadd does not exist in db
        if(!empty($result)) {
         header("location: index.php?registration=existing");
         exit();
         }
    
    else {
        if(insert($conn, $table, $fields) ){
        header("location: r_register.php?new_record=added");
        exit();
         }  
        else{
        header("location: r_register.php?new_record=failed");
        exit();
        }
    }
    mysqli_free_result($result);
}
?>