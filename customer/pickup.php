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
                        <a class="nav-link nav-link-4" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <h1 class="tm-text-primary mb-4">Home / <span class="tm-text-secondary">Pick Up</span></h1>
    </div>





    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row tm-mb-74 tm-people-row">
            <div class="col-md-12">
                <?php 


                $user_id = $_SESSION['user_id'];
                $fullname = $_SESSION['fullname'];
                $email = $_SESSION['email'];
                $phone = $_SESSION['phone'];


                $query= "SELECT * FROM orders where user_id = $user_id AND status ='approved'";
                $select_order= mysqli_query($connection,$query);

                $user_count = mysqli_num_rows($select_order);

                while($row=mysqli_fetch_assoc($select_order)){
                    $db_order_id =$row['order_id'];
                    $db_card_holder=$row['card_holder'];
                    $db_card_number=$row['card_number'];
                    $db_exp_date=$row['exp_date'];
                    $db_address=$row['address'];
                    $db_status=$row['status'];
                    $db_order_time=$row['order_time'];


                }

                if($user_count == 0 ){
                    echo "<h2 class='col-12 tm-text-primary text-center'>
                            You have nothing to collect.
                        </h2>";
                }
                else {


                ?>
                <div class="invoice">
                    <div class="row mx-auto">
                        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3 mx-auto">

                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <h5 class="text-center mt-3 mb-5">This is the contact information of the photographer you have hired</h5>
                                        </tr>
                                        
                                        <tr>
                                            <th>Photographer</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $query= "SELECT * FROM `cart` WHERE user_id=$user_id AND status='complete' AND  icode LIKE 's___%'";
                                        $select_cart= mysqli_query($connection,$query);
                    
                                        $photographer_count = mysqli_num_rows($select_cart);
                    
                                        if($photographer_count == 0 ){
                                        echo "<h2 class='col-12 tm-text-primary text-center'>
                                                You have nothing to collect.
                                            </h2>";
                                        }
                                        else {

                                            while($row=mysqli_fetch_assoc($select_cart)){
                                                $db_id=$row['id'];
                                                $db_item_name=$row['item_name'];
                                                $db_item_cat=$row['item_cat'];
                                                $db_price=$row['price'];
                                                $db_start_date=$row['start_date'];
                                                $db_end_date=$row['end_date'];
                                                $db_icode=$row['icode'];
                                                $db_image=$row['image'];

                                                $query= "SELECT * FROM `sellers` WHERE icode='{$db_icode}'";
                                                $select_photographer= mysqli_query($connection,$query);

                                                while($row=mysqli_fetch_assoc($select_photographer)){


                                                    $seller_id =$row['seller_id'];
                                                    $user_id=$row['user_id'];
                                                    $fullname=$row['fullname'];
                                                    $details=$row['details'];
                                                    $category=$row['category'];
                                                    $experiance=$row['experiance'];
                                                    $image=$row['image'];
                                                    $icode=$row['icode'];
                                                    
                                                    
                                                    $query="SELECT * FROM users WHERE user_id ='{$user_id}'";
                                                    $user_info = mysqli_query($connection, $query);
                                                    
                                                    while($row=mysqli_fetch_assoc($user_info)){

                                                        $db_user_id=$row['user_id'];
                                                        $db_fullname=$row['fullname'];
                                                        $db_email=$row['email'];
                                                        $db_phone=$row['phone'];
                                                        $db_role=$row['role'];
                                                        $db_status=$row['status'];

                                                    

                                        ?>
                                        <tr>
                                            <td class="col-md-6"><?php echo $db_fullname; ?></td>
                                            <td class="col-md-3"><a class="text-dark" href="mailto:<?php echo $db_email; ?>"><?php echo $db_email; ?></a></td>
                                            <td class="col-md-3"><a class="text-dark" href="callto:<?php echo $db_phone; ?>"><?php echo $db_phone; ?></a></td>
                                        </tr>

                                        <?php 
                                                    }

                                                } 
                                            }
                                        }
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>


    <!-- container-fluid, tm-container-content -->

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
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="invoice.php">Order</a></li>
                        <li><a href="pickup.php">Pick UP</a></li>
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
