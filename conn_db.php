<?php

    // php for database connection 

   // Connect to the database
   $host = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'zcakes';

    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    define("LOGGED_IMG_FOLDER","../img");
    define("CONN",$conn);
    define("CURRENCY","Php ");

    // Check connection
    if (!$conn){
        die("Maintenance Mode.");
    }

    //functions
    include_once "func.php";
    include_once ("sql_utilities.php");
    session_start();
?>