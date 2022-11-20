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
        <h1 class="tm-text-primary mb-4">Home / <span class="tm-text-secondary">Invoice</span></h1>
    </div>
    


    
    
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row tm-mb-74 tm-people-row">
            <div class="col-md-12">
              <?php 


                $user_id = $_SESSION['user_id'];
                $fullname = $_SESSION['fullname'];
                $email = $_SESSION['email'];
                $phone = $_SESSION['phone'];


                $query= "SELECT * FROM orders where user_id = $user_id";
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
                            You don't have any orders yet.
                        </h2>";
                }
                else {


                ?>
                <div class="invoice">
                    <div class="row mx-auto">
                        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3 mx-auto">
                            <div class="row">
                                <div class="receipt-header receipt-header-mid row">
                                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                        <div class="receipt-right">
                                            <h5><?php echo $fullname; ?> </h5>
                                            <p><b>Mobile :</b> <?php echo $phone; ?> </p>
                                            <p><b>Email :</b> <?php echo $email; ?> </p>
                                            <p><b>Address :</b> <?php echo $db_address; ?> </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="text-right">
                                            <h4>Invoice # <?php echo $db_order_id; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
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
                                        <tr>
                                            <td class="col-md-9"><?php echo $db_item_name; ?> (<?php echo $db_item_cat; ?>)</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $db_price; ?>/-</td>
                                        </tr>
                                        
                                        <?php 
                                            
                                        $grand_total += $db_price; 
                                        } 
                                        
                                        ?>
                                        <tr>
                                            <td class="text-right">
                                                <p>
                                                    <strong> </strong>
                                                </p>
                                                <p>
                                                    <strong></strong>
                                                </p>
                                                <p>
                                                    <strong></strong>
                                                </p>
                                                <p>
                                                    <strong></strong>
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <strong><i class="fa fa-inr"></i> </strong>
                                                </p>
                                                <p>
                                                    <strong><i class="fa fa-inr"></i> </strong>
                                                </p>
                                                <p>
                                                    <strong><i class="fa fa-inr"></i> </strong>
                                                </p>
                                                <p>
                                                    <strong><i class="fa fa-inr"></i> </strong>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="text-right">
                                                <h2><strong>Total: </strong></h2>
                                            </td>
                                            <td class="text-left text-danger">
                                                <h2><strong><i class="fa fa-inr"></i> <?php echo $grand_total; ?>/-</strong></h2>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="receipt-header receipt-header-mid receipt-footer row">
                                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                        <div class="receipt-right">
                                            <p><b>Date :</b> <?php echo $db_order_time; ?></p>
                                            <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="text-right">
                                            <h1><button class="btn btn-secondary" onclick="window.print()"><i class="fa fa-print mr5"></i> Print</button></h1>
                                        </div>
                                    </div>
                                </div>
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
        $(window).on("load", function () {
            $('body').addClass('loaded');
        });
    </script>
</body>

</html>
