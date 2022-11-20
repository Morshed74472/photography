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
    <link rel="stylesheet" href="css/style2.css">

</head>

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
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
                        <a class="nav-link nav-link-2" href="photographer.php">Photographers</a>
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
        <h1 class="tm-text-primary mb-4">Home / <span class="tm-text-secondary">Checkout</span></h1>

    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary text-center mt-2 mb-5">
                Checkout
            </h2>
        </div>
        <div class="row tm-mb-74 tm-people-row">
            <div class="col-lg-12" style="justify-content:center;">
                <div class="window mx-auto">
                    <div class="order-info">
                        <div class='order-info-content'>
                            <h2>Order Summary</h2>
                            <?php

                                $user_id = $_SESSION['user_id'];

                                $query= "SELECT * FROM cart where user_id = $user_id";
                                $select_cart= mysqli_query($connection,$query);
                                $grand_total = 0;

                                while($row=mysqli_fetch_assoc($select_cart)){
                                    $db_id=$row['id'];
                                    $db_item_name=$row['item_name'];
                                    $db_item_cat=$row['item_cat'];
                                    $db_price=$row['price'];
                                    $db_start_date=$row['start_date'];
                                    $db_end_date=$row['end_date'];
                                    $db_icode=$row['icode'];
                                    $db_image=$row['image'];
                                    $db_status=$row['status'];

                            ?>
                            <table class='order-table'>
                                <tbody>
                                    <tr>
                                        <td><img src='../images/<?php echo $db_image; ?>' class='full-width'>
                                        </td>
                                        <td>
                                            <br> <span class='thin h5'><?php echo $db_item_name; ?></span>
                                            <br> <?php echo $db_item_cat; ?><br>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <div class='price'><?php echo $db_price; ?> Taka</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <?php

                                    $grand_total += $db_price; 
                                } 

                            ?>
                            <table class='order-table'>
                                <div class='total'>
                                    <span style='float:left;'>
                                        TOTAL
                                    </span>
                                    <span style='float:right; text-align:right;'>
                                        <?php echo $grand_total; ?> Taka
                                    </span>
                                </div>
                            </table>
                        </div>
                    </div>

                    <div class='credit-info'>
                       
                       <?php 
                        
                        
                        $user_id = $_SESSION['user_id'];

                        if(isset($_POST['order'])){

                            $this_user_id=$user_id;    
                            $card_holder=$_POST['card_holder'];                        
                            $card_number=$_POST['card_number'];
                            $exp_date=$_POST['exp_date'];
                            $address=$_POST['address'];


                            $sql= "INSERT INTO `orders`(`user_id`, `card_holder`, `card_number`, `exp_date`, `address`, `status`, `order_time`) VALUES ('{$this_user_id}','{$card_holder}','{$card_number}','{$exp_date}','{$address}','unapproved',now())";

                            $place_order_query= mysqli_query($connection,$sql);

                            if(!$place_order_query){
                                    die("Query Failed". mysqli_error($connection));
                                }
                            else{
                                
                                $sql = "UPDATE `cart` SET `is_ordered` = 'yes' WHERE user_id = '$user_id'";
                                $is_ordered_query= mysqli_query($connection,$sql);
                            
                                echo"<script>
                                        alert('Checkout Compeleted');
                                        window.location.href='invoice.php';
                                    </script>";
                            }

                        }

                        
                        ?>
                        <form action="" method="post">
                            <div class='credit-info-content'>
                                <img src='img/checkout.png' height='80' class='credit-card-image' id='credit-card-image'>
                                Card Number
                                <input type="number" class='input-field' name="card_number">
                                Card Holder
                                <input type="name" class='input-field' name="card_holder">
                                <table class='half-input-table'>
                                    <tr>
                                        <td> Expires
                                            <input type="date" class='input-field' name="exp_date">
                                        </td>
                                        <td>Address
                                            <input type="address" class='input-field' name="address">
                                        </td>
                                    </tr>
                                </table>
                                <button type="submit" name="order" class='pay-btn'>Checkout</button>

                            </div>
                        </form>
                    </div>
                </div>
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
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
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
