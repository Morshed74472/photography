<?php session_start(); ?>
<?php $connection= mysqli_connect('localhost', 'root', '', 'photography'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photograph-Y</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- Page Loader -->
    <!--
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-film mr-2"></i>
                Photograph-Y
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-1" href="index.php">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" aria-current="page" href="photographer.php">Photographers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-3" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-4" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <h1 class="tm-text-primary mb-4">Home / <span class="tm-text-secondary">Photographers</span></h1>

    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Orders
            </h2>
        </div>
        <div class="row tm-mb-74 tm-people-row">
            <div class="table-responsive">
                <table class="table">
                    <thead class="">
                        <tr>
                            <th>User Name </th>
                            <th>Package</th>
                            <th>Price</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 


                        $user_id = $_SESSION['user_id'];

                        $query="SELECT * FROM sellers WHERE user_id='$user_id'";
                        $get_sellers = mysqli_query($connection, $query);



                        if(!$get_sellers){

                            die("Query Failed". mysqli_error($connection));

                        }
                        while($row=mysqli_fetch_assoc($get_sellers)){

                            $seller_id =$row['seller_id'];
                            $user_id=$row['user_id'];
                            $fullname=$row['fullname'];
                            $details=$row['details'];
                            $category=$row['category'];
                            $experiance=$row['experiance'];
                            $image=$row['image']; 
                            $icode=$row['icode'];

                        }

                        $query = "SELECT * FROM cart WHERE icode = '$icode' AND is_ordered = 'yes'";
                        $get_cart_item = mysqli_query($connection, $query);

                        if(!$get_cart_item){

                        die("Query Failed". mysqli_error($connection));

                        }
                        while($row=mysqli_fetch_assoc($get_cart_item)){

                            $db_id=$row['id'];
                            $db_user_id=$row['user_id'];
                            $db_item_name=$row['item_name'];
                            $db_item_cat=$row['item_cat'];
                            $db_price=$row['price'];
                            $db_start_date=$row['start_date'];
                            $db_end_date=$row['end_date'];
                            $db_icode=$row['icode'];
                            $db_status=$row['status'];
                            $db_is_ordered=$row['is_ordered'];

                            $query= "SELECT * FROM users WHERE user_id={$db_user_id}";
                            $select_user= mysqli_query($connection,$query);


                            while($row= mysqli_fetch_array($select_user)){
                                $db_fullname= $row['fullname'];
                            }

                            if($db_price == 5000) {
                                $package = '1 Day Basic Package';
                            }
                            else if($db_price == 8000){
                                $package = '2 Day Medium Package';
                            }
                            else if($db_price == 10000){
                                $package = '3 Day Ultimate Package';
                            }
                            else {
                                $package = null;
                            }

                            echo "<tr>";

                            echo "<td>$db_fullname</td>";
                            echo "<td>$package</td>";
                            echo "<td>$db_price</td>";
                            echo "<td>$db_start_date</td>";
                            echo "<td>$db_end_date</td>";
                            echo "<td>$db_status</td>";
                            echo "<td class='text-danger'><a href='orders.php?delete={$db_id}'>Delete</a> </td>";

                            echo "</tr>";

                        } 
                        
                        
                        if(isset($_GET['delete'])){
                            $the_item_id=$_GET['delete'];

                            $query="DELETE FROM cart WHERE id= {$the_item_id}";
                            $delete_query= mysqli_query($connection,$query);
                            if(!$delete_query){

                                die("Query Failed". mysqli_error($connection));

                            }
                            else {
                                echo"<script>alert('Photographer Removed');
                                window.location.href='orders.php';
                                </script>";
                            }
                        }
                        
                        
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Photograph-Y</h3>
                    <p>Where picture enthusiasts will snap their preferred images. And it's simple to locate
                        photographers at home using this website. Hiring photographers for special occasions is not a
                        cause for concern. The most creative or expert photography contest entries are available here.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="add_photo.php">Add Photos</a></li>
                        <li><a href="orders.php">Orders</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="../includes/logout.php" class="tm-text-gray text-right d-block mb-2">Log Out</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    Copyright 2022 Photograph-Y Company. All rights reserved.
                </div>
            </div>
        </div>
    </footer>

    <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });

    </script>
</body>

</html>
