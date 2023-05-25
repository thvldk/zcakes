<?php

if(isset($_GET['user_id'])){
    $user_id  = $_GET['user_id'];
    $name=$_GET['name'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $username = $_GET['username'];
    $address = $_GET['address'];
    $phone = $_GET['phone'];
    $user_type = $_GET['user_type'];
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <!-- Link to Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

    <style>
        body {
            /* background: linear-gradient(to bottom, #009efd, #2af598); */
            background-image: url('../assets/Cell_waneella.gif');
            background-attachment: fixed;
            overflow: auto; /* or overflow: scroll; */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh
        }
        
        .blur {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.5);
        }
        
    </style>
</head>

<body>
<div class="container-fluid bg-transparent text-dark">  
    <div class="row">
            <div class="col-12 text-center bg-warning border border-dark">
                <h1>ADMIN DASHBOARD</h1>
            </div>
        </div> 
        <div class="row">
            <div class="col-12">
                <h3 class="display mt-3 mb-3">
                    
                </h3>
    <div class="container">
        <div class="row">
        <div class="col-3"></div>
        <div class="col-6 blur bg-transparent blur border border-info mb-2 text-light">
                <h3 class="mt-3 text-center text-light">UPDATE RECORD</h3>
                <form action="view_user_update.php" method="POST">
                    <div class="mt-4 mb-3">
                       <label for="">Name</label>
                        <input type="text" name="Name" placeholder="Enter Name" value="<?php echo $Name; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                       <label for="">Email</label>
                        <input type="text" hidden name="user_id" value="<?php echo $user_id; ?>" class="form-control">
                        <input type="email" name="email" placeholder="Enter Email" value="<?php echo $email; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                       <label for="">Username</label>
                        <input type="text" hidden name="user_id" value="<?php echo $user_id; ?>" class="form-control">
                        <input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                       <label for="">Password</label>
                        <input type="password" name="password" placeholder="" value="<?php echo $password; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" placeholder="Enter Address" value="<?php echo $address; ?>" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="form-label">Contact Number</label>
                        <input type="text" name="phone" placeholder="Enter Contact Number" value="<?php echo $phone; ?>" class="form-control">
                    </div>
                    <div class="mb-4 text-center">
                        <label for="user_type" class="form-label">C = Client , D = Delivery Service , A = ADMIN</label>
                        <input type="text" name="user_type" placeholder="Enter User Type" value="<?php echo $user_type; ?>" class="form-control">
                    </div>
                    <a class="btn btn-primary mb-3" href="index.php?user">back</a>
                    <input type="submit" class="btn btn-success float-end">
                </form>
            </div>
            <div class="col-3"></div>
            
        </div>
    </div>

    <!-- Link to jQuery -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <!-- Link to Bootstrap JS -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

</body>

</html>