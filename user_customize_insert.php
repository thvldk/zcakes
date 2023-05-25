<?php
include_once "conn_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST["cat_id"];
    $shape = $_POST["shape"];
    $size = $_POST["size"];
    $flavor = $_POST["flavor"];
    $frosting = $_POST["frosting"];

    $cc_size = $_POST["cc_size"];
    $filling = $_POST["cc_filling"];

    $sh_price = $_POST["shape_price"];
    $si_price = $_POST["size_price"];
    $fl_price = $_POST["flavor_price"];
    $fr_price = $_POST["frosting_price"];

    $cc_price = $_POST["cc_price"];
    $fi_price = $_POST["filling_price"];

    $dedication = mysqli_real_escape_string($conn, $_POST['item_desc']);

    $user_id = $_SESSION['user_id'];

    if ($category_id == 1) {
        // Calculate the total price
        $total_price = $sh_price + $si_price + $fl_price + $fr_price;

        // Perform the database query to insert the values
        $sql = "INSERT INTO z_details (user_id, category_id, shape_id, cake_size_id, flavor_id, frosting_id, total_price, dedication)
                VALUES ('$user_id', '$category_id', '$shape', '$size', '$flavor', '$frosting', '$total_price', '$dedication')";
    
    } else if ($category_id == 2) {
        // Calculate the total price
        $total_price = $sh_price + $fl_price + $fr_price;

        // Perform the database query to insert the values
        $sql = "INSERT INTO z_details (user_id, category_id, shape_id, flavor_id, frosting_id, total_price, dedication)
                VALUES ('$user_id', '$category_id', '$shape', '$flavor', '$frosting', '$total_price', '$dedication')";
    
    } else if ($category_id == 3) {
        // Calculate the total price
        $total_price = $cc_price + $fi_price + $fl_price + $fr_price;

        // Perform the database query to insert the values
        $sql = "INSERT INTO z_details (user_id, category_id, cupcake_size_id, cc_filling_id, flavor_id, frosting_id, total_price, dedication)
                VALUES ('$user_id', '$category_id', '$cc_size', '$cc_size', '$filling', '$frosting', '$total_price', '$dedication')";
        
    } else {
        // Handle the case when the category_id is not 1, 2, or 3
        echo "Invalid category ID.";
        exit; // Stop further execution
    }

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect to user_customize_view.php
        header("Location: user_customize_view.php");
        exit; // Make sure to exit after redirecting
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}

?>
