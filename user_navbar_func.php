<?php

function renderCustomNavbar()
{
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent mb-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/zcakes logo.png" alt="Logo" width="100" height="100" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler bg-black" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-weight: bolder; font-family: Georgia, \'Times New Roman\', Times, serif;">
                    <li class="nav-item ">
                        <a class="nav-link active" href="home.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="products.php">FEATURED</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="user_customize.php">CUSTOMIZE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about_us.php">ABOUT US</a>
                    </li>
                </ul>
                <ul class="navbar-nav" style="font-size: smaller; font-weight: bolder; font-family: Georgia, \'Times New Roman\', Times, serif;">
                <li class="nav-item">
                <a class="nav-link active" href="user_cart.php">CART</a>
                    </li>
                 <li class="nav-item">
                <a class="nav-link active" href="user_orderlist.php">ORDERS</a>
                     </li>
                <li class="nav-item" style="border: 1px solid pink; background-color: pink; border-radius: 15px;">
                        <button type="button" class="btn btn-transparent ms-3 me-3" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            Log Out
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: pink;">
                    <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="l_logout.php" class="btn btn-primary">Log Out</a>
                </div>
            </div>
        </div>
    </div>';
}

function renderContactSection()
{
    echo '
    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-3 text-center">
                <div class="contact-info">
                    <h5>CONTACT US</h5>
                    <p>Phone: 0916 352 0506<br>
                    Email: <a href="mailto:suzethbuizacam@gmail.com">suzethbuizacam@gmail.com</a></p>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="social-media">
                    <h5>FOLLOW US</h5>
                    <a href="https://web.facebook.com/Zcakesalbay" target="_blank"><img src="images/facebook.png" alt="Facebook"></a>
                    <a href="https://www.instagram.com/zcakes_albay" target="_blank"><img src="images/instagram.png" alt="Instagram"></a>
                    <a href="https://www.tiktok.com/@zcakes_albay" target="_blank"><img src="images/tiktok.png" alt="Tiktok"></a>
                </div> 
            </div>
            <div class="col-sm-3 text-center">
                <div class="location">
                   <h5>LOCATION</h5>
                    <p>Austero Street, Iraya Sur, <br>
                    Oas, Albay, Philippines, 4505</p>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>';
}

?>