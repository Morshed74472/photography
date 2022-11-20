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
            <div class="col-md-12">
                <div class="invoice max-auto">
                    <div class="row">
                        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3 max-auto">
                            <div class="row">
                                <div class="receipt-header receipt-header-mid">
                                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                        <div class="receipt-right">
                                            <h5>Customer Name </h5>
                                            <p><b>Mobile :</b> +1 12345-4569</p>
                                            <p><b>Email :</b> customer@gmail.com</p>
                                            <p><b>Address :</b> New York, USA</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="receipt-left">
                                            <h3>INVOICE # 102</h3>
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
                                        <tr>
                                            <td class="col-md-9">Payment for August 2016</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i> 15,000/-</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-9">Payment for June 2016</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i> 6,00/-</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-9">Payment for May 2016</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i> 35,00/-</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <p>
                                                    <strong>Total Amount: </strong>
                                                </p>
                                                <p>
                                                    <strong>Late Fees: </strong>
                                                </p>
                                                <p>
                                                    <strong>Payable Amount: </strong>
                                                </p>
                                                <p>
                                                    <strong>Balance Due: </strong>
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <strong><i class="fa fa-inr"></i> 65,500/-</strong>
                                                </p>
                                                <p>
                                                    <strong><i class="fa fa-inr"></i> 500/-</strong>
                                                </p>
                                                <p>
                                                    <strong><i class="fa fa-inr"></i> 1300/-</strong>
                                                </p>
                                                <p>
                                                    <strong><i class="fa fa-inr"></i> 9500/-</strong>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="text-right">
                                                <h2><strong>Total: </strong></h2>
                                            </td>
                                            <td class="text-left text-danger">
                                                <h2><strong><i class="fa fa-inr"></i> 31.566/-</strong></h2>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="receipt-header receipt-header-mid receipt-footer">
                                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                        <div class="receipt-right">
                                            <p><b>Date :</b> 15 Aug 2016</p>
                                            <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="receipt-left">
                                            <h1>Stamp</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
