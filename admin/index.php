<?php include_once "../conn_db.php"; 
if(isset($_GET['signout'])){
    session_destroy();
    header("Location:../index.php");
    exit();
}
session_check(array('A'), '../index.php?not_admin');


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>This is ZCAKES Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.css">

    <style>
        body {
            background-image: url('../images/ZCAKES.gif');
            background-attachment: fixed;
            overflow: auto; /* or overflow: scroll; */
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            height: 100%
        }
         
        /* set the height of the accordion content */
        .accordion-content {
            height: 75%;
            overflow-y: auto;
        }
    </style>

</head>

<body class="bg-light">
    
    <!-- Sidebar navigation -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center bg- border border-dark">
                <h1>ZCAKES ADMIN DASHBOARD</h1>
            </div>
        </div>

        <div class="row">
            <div class="px-0 bg- text-dark col-md-3 col-lg-3 d-none d-md-block sidebar h-100">
                <div class="card pt-3">
                    <img src="../images/zcakes logo.png" width="100px" alt="" class="img-responsive d-block mx-auto mt-1">
                    <div class="card-body">
                        <div class="mx-auto d-block text-center">
                            <h6 class="display-6">@<?php echo $_SESSION['user']['username'];?></h6>
                            <h6 class="display">Email: <?php echo $_SESSION['user']['email'];?></h6>
                            <a href="?profile" class="btn btn-link">Profile</a> | 
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#signOutModal">
                                Sign out
                            </button>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div id="accordion">
                        <div class="card border border-dark">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0 text-center">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <!-- MANAGE ORDERS -->
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body accordion-content">
                                    <!-- content for Manage Orders -->
                                    <ul>
                                        <!-- <li><a href="?orders">View All Orders</a></li> -->
                                        <!-- <li><a href="?confirm_pending_orders">Confirm Pending Orders</a></li> -->
                                        <!-- <li><a href="?ship_order">To be Picked Up</a></li> -->
                                        <!-- <li><a href="?delivered">Order Completed</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card border border-dark">
                            <div class="card-header bg-" id="headingTwo">
                                <h5 class="mb-0 text-center">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        MANAGE PRODUCTS
                                    </button>
                                </h5>
                            </div>
                            
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body accordion-content">
                                <!-- content for Manage products -->
                                <ul>
                                    <li><a href="?viewproduct">View products</a></li>
                                    <!-- <li><a href="?addproduct">Add products</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card border border-dark">
                        <div class="card-header bg-" id="headingThree">
                            <h5 class="mb-0 text-center">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    SHOW REPORTS
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body accordion-content">
                                <!-- content for Show Reports -->
                                <ul>
                                    <li><a href="?sales">Sales Report</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card border border-dark">
                        <div class="card-header bg-" id="headingFour">
                            <h5 class="mb-0 text-center">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    SHOW USERS
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body accordion-content">
                                <!-- content for Show Users -->
                                <ul>
                                    <li><a href="?user">View Users</a></li>
                                    <li><a href="?newuser">New Admin Users</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Signout -->
            <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true" style="font-family: Georgia, 'Times New Roman', Times, serif;">
                <div class="modal-dialog">
                    <div class="modal-content border border-danger">
                        <div class="modal-header" style="background: orange;">
                            <h5 class="modal-title" id="signOutModalLabel">Sign Out</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to sign out?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="?signout" class="btn btn-outline-danger">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-lg-9 bg-light py-3 overflow-y-auto z-0" style="height:100%">
            <!-- contents-->
                <?php
                if(isset($_POST['search'])){
                    $k = htmlentities($_POST['search']);
                    $order_sql = "SELECT o.ref_num AS ref_num,
                                        u.name AS name,
                                        u.address AS address,
                                        u.phone AS phone,
                                        CAST(o.date_ordered AS date) AS date_ordered,
                                        COUNT(*) AS order_count
                                    FROM z_orders o
                                    INNER JOIN zuser u ON o.user_id = u.user_id
                                    WHERE (o.ref_num = '$k'
                                        OR CONCAT(u.name) LIKE '%$k%')
                                    AND o.order_status = ?
                                    GROUP BY o.ref_num,
                                        u.name, 
                                        u.address,
                                        u.phone,
                                        CAST(o.date_ordered AS date)
                                    ORDER BY o.date_ordered DESC;
                                    ";
                }
                else{
                    $order_sql = "SELECT o.ref_num AS ref_num,
                                    u.name AS name,
                                    u.address AS address,
                                    u.phone AS phone,
                                    CAST(o.date_ordered AS date) AS date_ordered,
                                    COUNT(*) AS order_count
                                FROM orders o
                                INNER JOIN z_user u ON o.user_id = u.user_id
                                WHERE o.order_status = ?
                                GROUP BY o.ref_num,
                                    u.name,
                                    u.address,
                                    u.phone,
                                    CAST(o.date_ordered AS date)
                                 ORDER BY o.date_ordered DESC
                                LIMIT 50;
                                ";                                   
                   }
                   
                    $sql_productize = "SELECT p.product_id,
                                    p.product_name,
                                    p.product_img,
                                    o.order_id,
                                    p.product_price,
                                    o.order_qty
                                FROM z_orders o
                                INNER JOIN z_products p ON o.product_id = p.product_id
                                WHERE order_status = ?
                                AND o.ref_num = ?;
                                ";
                
                  
                ?>
                    <form action="" method="POST">
                        <div class="input-group mb-3 w-50">
                            <input type="search" required name="search" value="<?php if(isset($_POST['search'])){ echo $_POST['search']; }else{ echo ""; }?>" placeholder="ORDER REFERENCE NUMBER or Full Name" class="form-control">
                            <input type="hidden" name="orders" class="form-control">
                            <button class="btn btn-outline-primary">Search</button>
                        </div>
                    </form>
                
                <?php 
                  
                if(isset($_GET['msg'])){ ?>
                     <div class="alert alert-success"><?php echo $_GET['msg']; ?></div>
                <?php }

                if(isset($_GET['user'])){
                include_once "view_user.php";
                }

                if(isset($_GET['profile'])){
                    include_once "profile.php";
                    }

                if(isset($_GET['newuser'])){
                    include_once "new_user.php";
                    }

                /*Reports*/
                if(isset($_GET['sales'])){
                    
                    include_once "sales_report.php";
                }
                /*orders*/
                if(isset($_GET['orders'])){ 
                    include_once "orders.php";
                }
                if(isset($_GET['confirm_pending_orders'])){  ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                  
                                      <h3 class="display-6">Confirm Pending Orders</h3> 
                                    <?php admin_retrieve_orders($conn, $order_sql,$sql_productize, 'P' , 'E'); ?>
                                </div>
                            </div>
                        </div>
            <?php    
                }
                
                if(isset($_GET['ship_order'])){ ?>
                     <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                  
                                      <h3 class="display-6">Ship Orders</h3> 
                                    <?php admin_retrieve_orders($conn, $order_sql,$sql_productize, 'C' , 'E'); ?>
                                </div>
                            </div>
                        </div>
                <?php }
                
                
                if(isset($_GET['delivered'])){ ?>
                     <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                  
                                      <h3 class="display-6">Picked Up by Customer</h3> 
                                    <?php admin_retrieve_orders($conn, $order_sql,$sql_productize, 'D' , 'E'); ?>
                                </div>
                            </div>
                        </div>
                <?php }
                
                /*products*/
                if(isset($_GET['addproduct'])){
                    include_once "add_item.php";
                }
                if(isset($_GET['viewproduct'])){
                    if(isset($_GET['deacproduct'])){
                    
                    $product=htmlentities($_GET['deacproduct']);
                    $fields = array("product_status" => 'D');
                    $filter = array("product_id" => $product);
                        if(update($conn, "z_products", $fields, $filter)){ ?>
                          <div class="alert alert-danger mb-0">product Deactivated</div>
                        <?php } 
                    }
                    if(isset($_GET['reacproduct'])){
                    
                    $product=htmlentities($_GET['reacproduct']);
                    $fields = array("product_status" => 'A');
                    $filter = array("product_id" => $product);
                        if(update($conn, "z_products", $fields, $filter)){ ?>
                          <div class="alert alert-success mb-0">product Reactivated</div>
                        <?php } 
                    }
                    if($_GET['viewproduct'] == '2'){
                    include_once "view_item_tiled.php";
                    }
                    else{
                    include_once "view_item.php";
                    }
                } 
                
                if(isset($_GET['updateproduct'])){
                    $product_id=htmlentities($_GET['updateproduct']);
                    include_once "update_product.php";
                }
              
                ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <!-- Link to jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Link to Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>