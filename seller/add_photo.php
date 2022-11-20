<?php session_start(); ?>
<?php error_reporting(0); ?>
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
                        <a class="nav-link nav-link-1 active" aria-current="page" href="index.php">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" href="photographer.php">Photographers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-3" href="contests.php">Contests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-4" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <h1 class="tm-text-primary mb-4">Home / <span class="tm-text-secondary">Add Photo</span></h1>
    </div>

    <div class="container-fluid tm-mt-60">
        <div class="row tm-mb-50">
            <div class="col-md-8 col-12 mb-5 mx-auto">
               <?php 
                    $user_id = $_SESSION['user_id'];
                    $fullname = $_SESSION['fullname'];
                
                    $sql = "SELECT * FROM `sellers` WHERE user_id = '$user_id'";
                    $get_seller_id = mysqli_query($connection, $sql);
                    while($row=mysqli_fetch_assoc($get_seller_id)){
                        $seller_id=$row['seller_id'];
                    }
                
                    if($seller_id == null) {
                        echo "<h1 class='tm-text-primary text-center mb-5'>Complete your Profile First <br> </h1>";
                        echo "<h2 class='tm-text-primary text-center mt-5'>Go to: <a class='tm-text-secondary' href='profile.php'>Profile</a></h2>";
                    }
                    else {

                ?>
                <h2 class="tm-text-primary text-center mb-5">Add New Photo</h2>
                <?php 
                
  
                        if(isset($_POST['submit'])){

                            $title=$_POST['title'];
                            $format=$_POST['format'];
                            $height=$_POST['height'];
                            $width=$_POST['width'];
                            $price=$_POST['price'];
                            $image=$_POST['image'];
                            $tags=$_POST['tags'];
                            $details=$_POST['details'];

                            $query="INSERT INTO `photos`(`title`, `details`, `height`, `width`, `format`, `tags`, `price`, `image`, `seller_id`, `icode`, `status`) VALUES ('{$title}','{$details}','{$height}','{$width}','{$format}','{$tags}','{$price}','{$image}','{$seller_id}','[value-11]','unapproved')";
                            $add_photo_query = mysqli_query($connection, $query);

                            if(!$add_photo_query){

                                die("Query Failed". mysqli_error($connection));

                            }
                            else {
                                $sql = "SELECT * FROM `photos` ORDER BY photo_id desc Limit 1;";
                                $get_photo_id = mysqli_query($connection, $sql);
                                while($row=mysqli_fetch_assoc($get_photo_id)){
                                    $photo_id=$row['photo_id'];
                                }

                                $sql2 = "UPDATE `photos` SET `icode`='p10{$photo_id}' WHERE photo_id='$photo_id'";
                                $update_icode = mysqli_query($connection, $sql2);

                                echo "
                                <script>
                                        alert('Photo Added!');
                                        window.location.href='index.php';
                                </script>";
                            }
                        }
                    
                
                ?>
                <form id="contact-form" action="" method="POST">
                    <div class="form-group">
                        <input type="title" name="title" class="form-control rounded-0" placeholder="Title" />
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control rounded-0" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="contact-select" name="format">
                            <option>Format</option>
                            <option value="JPG">JPG</option>
                            <option value="PNG">PNG</option>
                            <option value="GIF">GIF</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="height" name="height" class="form-control rounded-0" placeholder="Height" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="width" name="width" class="form-control rounded-0" placeholder="Width" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control rounded-0" placeholder="Price" required />
                    </div>
                    <div class="form-group">
                        <input type="tags" name="tags" class="form-control rounded-0" placeholder="Tags" required />
                    </div>
                    <div class="form-group">
                        <textarea rows="8" name="details" class="form-control rounded-0" placeholder="Details" required=></textarea>
                    </div>


                    <div class="form-group tm-text-right">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <?php } ?>
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
