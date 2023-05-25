<head>
    <?php include_once "conn_db.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Products</title>
    <style>
        body {
            background-image: url("images/23.jpg");
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

    </style>
</head>
    <body>
    <!-- navigation bar function, filename: user-navbar.php-->
    <?php
        include 'user_navbar_func.php';
        renderCustomNavbar();
    ?>
    
    <div class="container  mt-3" style="font-family: Georgia, 'Times New Roman', Times, serif;">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-5" data-value="TRACKING MY ORDERS STATUS">ORDERS STATUS</h1>
            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" style="background-color: pink;" role="presentation">
                <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Order Pending</button>
            </li>
            <li class="nav-item" style="background-color: pink;" role="presentation">
                <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="false">Order History</button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="row">
                    <div class="col">
                        <div class="card ">
                            <!-- Order Pending content (e.g., table) -->
                            <?php echo displayOrdersByStatus($conn, 'P'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <!-- Order History content (e.g., table) -->
                            <?php echo displayOrdersByStatus($conn, 'D'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        </tbody>
        </table>
    
    </body>
    <script src="js/bootstrap.js"></script>
</head>