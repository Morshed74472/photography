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
                        <a class="nav-link nav-link-2 " href="photographer.php">Photographers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-3 active" aria-current="page" href="contests.php">Contests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-4" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <h1 class="tm-text-primary mb-4">Home / <span class="tm-text-secondary">Contests</span></h1>

    </div>

    <div class="container tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary text-center mb-5">
                View All Contests
            </h2>
        </div>
        <div id="contests" class="row tm-mb-74 tm-people-row">
            <div class="all-blog-posts">
                <div class="row">
                    <?php 
                        
                    $query="SELECT * FROM contests WHERE status='published'";
                    $get_contests = mysqli_query($connection, $query);

                    if(!$get_contests){

                        die("Query Failed". mysqli_error($connection));

                    }

                    while($row=mysqli_fetch_assoc($get_contests)){


                        $id  =$row['id'];
                        $title=$row['title'];
                        $details=$row['details'];
                        $entry_fee=$row['entry_fee'];
                        $prize=$row['prize'];
                        $theme=$row['theme'];
                        $submission=$row['submission'];
                        $result=$row['result'];
                        $image=$row['image'];
                        $participants=$row['participants'];
                        $status=$row['status'];

                    ?>




                    <div class="col-lg-12">
                        <div class="row post-item">
                            <div class="col-md-4 thumb">
                                <div>
                                    <a href="contest.php?c_id=<?php echo $id; ?>"><img src="../images/<?php echo $image; ?>" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-8 right-content">
                                <a href="contest.php?c_id=<?php echo $id; ?>" class="tm-text-primary">
                                    <h4><?php echo $title; ?></h4>
                                </a>
                                <p class="post-info text-secondary"><?php echo $details; ?></p>
                                <span class="post-author"><i class="fa fa-trophy"></i> Prize: <?php echo $prize; ?></span>
                                <span class="post-share"><i class="fa fa-users"></i> <strong>Participants:</strong> <?php echo $participants; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
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
