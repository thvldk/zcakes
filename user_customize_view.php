<?php
    include_once "conn_db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" 
	content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Cake Customization View</title>
<style>

        body {
            background-image: url("images/bgg.jpg");
            background-attachment: fixed;
            overflow: auto; /* or overflow: scroll; */
            background-size: cover;
            background-position: flex;
            background-repeat: repeat;
            height: 100%;
        }
        .navbar-nav li a {
            color: black !important;
        }

    .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
        }

.image-size{
    width: 100px; 
    height: 100px;"
}
</style>

</head>
<?php
        include 'user_navbar_func.php';
        renderCustomNavbar();

        include("user_customize_func.php");
    ?>
<body>

    <div class="container  mt-3" style="font-family: Georgia, 'Times New Roman', Times, serif;">
        <div class="row">
            <div class="col-12">
            <h2 class="mb-3" style="background-color: pink; text-align: center; font-family:'Times New Roman', Times, serif;">View Customize</h2>
            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" style="background-color: pink;" role="presentation">
                <button class="nav-link active" id="cake-tab" data-bs-toggle="tab" data-bs-target="#cake" type="button" role="tab" aria-controls="cake" aria-selected="true">CAKE</button>
            </li>
            <li class="nav-item" style="background-color: pink;" role="presentation">
                <button class="nav-link" id="bento-tab" data-bs-toggle="tab" data-bs-target="#bento" type="button" role="tab" aria-controls="bento" aria-selected="false">BENTO CAKE</button>
            </li>
            <li class="nav-item" style="background-color: pink;" role="presentation">
                <button class="nav-link" id="cupcake-tab" data-bs-toggle="tab" data-bs-target="#cupcake" type="button" role="tab" aria-controls="cupcake" aria-selected="false">CUPCAKE</button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="cake" role="tabpanel" aria-labelledby="cake-tab">
                <div class="row">
                <div class="col">
                        <div class="card">
                            <!-- CAKE VIEW -->
                            <div class="container">
                                <?php 
                                    $z_details =getDetails(1);
                                    $stmt_products = $db->prepare($z_details);
                                    $stmt_products->execute();
                                    $customize= $stmt_products->fetchAll(PDO::FETCH_ASSOC);
                                    echo "<table class='table table-bordered text-center'>";
                                    echo "<thead>";
                                        echo "<th>Category Name</th>";
                                        echo "<th>Cake Name</th>";
                                        echo "<th>Cake Shape</th>";
                                        echo "<th>Cake Size</th>";
                                        echo "<th>Cake Flavor</th>";
                                        echo "<th>Cake Frosting</th>";
                                        echo "<th>Dedication</th>";
                                        echo "<th>Total</th>";
                                        echo "<th>Action</th>";
                                    echo "</thead>";
                                $Grandtotal = 0; // Initialize grand total
                                foreach($customize as $key => $row){
                                    // calculate Grand total
                                    $Grandtotal += $row['total'];
                                    echo "<tr>";
                                        echo "<td>" . $row['cat_name'] . "</td>";
                                        echo "<td>" . $row['flavor'] ." " . $row['frosting'] . " " . $row['cat_name'] . "</td>";
                                        echo "<td>" . $row['shape'] . "</td>";
                                        echo "<td>" . $row['size'] . "</td>";
                                        echo "<td>" . $row['flavor'] . "</td>";
                                        echo "<td>" . $row['frosting'] . "</td>";
                                        echo "<td>" . $row['dedication'] . "</td>";
                                        echo "<td>Php " . $row['total'] . "</td>";
                                        echo "<td><a class='btn btn-danger' href='user_customize_remove.php?details_id=". $row['details_id'] ."'> Remove </a> </td>";
                                        echo "</tr>";
                                    echo '<form action="user_customize_viewbackend.php" method="post">';
                                    echo "<td colspan='8'></td>"; 
                                    echo '<input type="hidden" name="details_id" value="' . $row['details_id'] . '" />';         
                                    echo '<td><button type="submit" class="btn btn-success">Checkout</button></td>';                 
                                    echo "</tr>";
                                    echo "</form>";
                                    }
                                    echo "<td colspan='9'><strong>Grand Total: </strong>Php " . $Grandtotal . " </td>"; 
                                    echo "</table>";   
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="bento" role="tabpanel" aria-labelledby="bento-tab">
                <div class="row">
                <div class="col">
                        <div class="card">
                            <!-- BENTO VIEW -->
                            <div class="container">
                                <?php 
                                    $z_details =getDetails(2);
                                    $stmt_products = $db->prepare($z_details);
                                    $stmt_products->execute();
                                    $customize= $stmt_products->fetchAll(PDO::FETCH_ASSOC);
                                    echo "<table class='table table-bordered text-center'>";
                                    echo "<thead>";
                                        echo "<th>Category Name</th>";
                                        echo "<th>Bento Name</th>";
                                        echo "<th>Bento Shape</th>";
                                        echo "<th>Bento Flavor</th>";
                                        echo "<th>Bento Frosting</th>";
                                        echo "<th>Dedication</th>";
                                        echo "<th>Total</th>";
                                        echo "<th>Action</th>";
                                    echo "</thead>";
                                $Grandtotal = 0; // Initialize grand total
                                foreach($customize as $key => $row){
                                    // calculate Grand total
                                    $Grandtotal += $row['total'];
                                    echo "<tr>";
                                        echo "<td>" . $row['cat_name'] . "</td>";
                                        echo "<td>" . $row['flavor'] . " " . $row['frosting'] . " " . $row['cat_name'] . "</td>";
                                        echo "<td>" . $row['shape'] . "</td>";
                                        echo "<td>" . $row['flavor'] . "</td>";
                                        echo "<td>" . $row['frosting'] . "</td>";
                                        echo "<td>" . $row['dedication'] . "</td>";
                                        echo "<td>Php " . $row['total'] . "</td>";
                                        echo "<td><a class='btn btn-danger' href='user_customize_remove.php?details_id=". $row['details_id'] ."'> Remove </a> </td>";
                                        echo "</tr>";
                                    echo '<form action="user_customize_viewbackend.php" method="post">';
                                    echo "<td colspan='7'></td>"; 
                                    echo '<input type="hidden" name="details_id" value="' . $row['details_id'] . '" />';         
                                    echo '<td><button type="submit" class="btn btn-success">Checkout</button></td>';                 
                                    echo "</tr>";
                                    echo "</form>";
                                    }
                                    echo "<td colspan='8'><strong>Grand Total: </strong>Php " . $Grandtotal . " </td>"; 
                                    echo "</table>";   
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="cupcake" role="tabpanel" aria-labelledby="cupcake-tab">
                <div class="row">
                <div class="col">
                        <div class="card">
                            <!-- CUPCAKE VIEW -->
                            <div class="container">
                                <?php 
                                    $z_details =getDetails(3);
                                    $stmt_products = $db->prepare($z_details);
                                    $stmt_products->execute();
                                    $customize= $stmt_products->fetchAll(PDO::FETCH_ASSOC);
                                    echo "<table class='table table-bordered text-center'>";
                                    echo "<thead>";
                                        echo "<th>Category Name</th>";
                                        echo "<th>Cupcake Name</th>";
                                        echo "<th>Cupcake Size</th>";
                                        echo "<th>Cake Filling</th>";
                                        echo "<th>Cake Flavor</th>";
                                        echo "<th>Cake Frosting</th>";
                                        echo "<th>Dedication</th>";
                                        echo "<th>Total</th>";
                                        echo "<th>Action</th>";
                                    echo "</thead>";
                                $Grandtotal = 0; // Initialize grand total
                                foreach($customize as $key => $row){
                                    // calculate Grand total
                                    $Grandtotal += $row['total'];
                                    echo "<tr>";
                                        echo "<td>" . $row['cat_name'] . "</td>";
                                        echo "<td>" . $row['flavor'] . " " . $row['frosting'] . " " . $row['cat_name'] . "</td>";
                                        echo "<td>" . $row['cc_size'] . "</td>";
                                        echo "<td>" . $row['cc_filling'] . "</td>";
                                        echo "<td>" . $row['flavor'] . "</td>";
                                        echo "<td>" . $row['frosting'] . "</td>";
                                        echo "<td>" . $row['dedication'] . "</td>";
                                        echo "<td>Php " . $row['total'] . "</td>";
                                        echo "<td><a class='btn btn-danger' href='user_customize_remove.php?details_id=". $row['details_id'] ."'> Remove </a> </td>";
                                        echo "</tr>";
                                    echo '<form action="user_customize_viewbackend.php" method="post">';
                                    echo "<td colspan='8'></td>"; 
                                    echo '<input type="hidden" name="details_id" value="' . $row['details_id'] . '" />';         
                                    echo '<td><button type="submit" class="btn btn-success">Checkout</button></td>';                 
                                    echo "</tr>";
                                    echo "</form>";
                                    }
                                    echo "<td colspan='9'><strong>Grand Total: </strong>Php " . $Grandtotal . " </td>"; 
                                    echo "</table>";   
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
    <script src="js/bootstrap.js"></script>

</html>