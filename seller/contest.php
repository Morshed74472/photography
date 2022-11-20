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
                        <a class="nav-link nav-link-1 " aria-current="page" href="index.php">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" href="photographer.php">Photographers</a>
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
        <h1 class="tm-text-primary mb-4">Home / <span class="tm-text-secondary">Contest</span></h1>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">


        <?php 
        
        //Fetching Data for specific contest
        
        if(isset($_GET['c_id'])){
            $the_contest_id=$_GET['c_id'];
        }

        $query="SELECT * FROM contests WHERE id = '$the_contest_id'";
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


        } 
        ?>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary"><?php echo $title; ?></h2>
        </div>
        <div class="row tm-mb-90">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <img src="../images/<?php echo"$image"; ?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <h4 class="tm-text-gray-dark mb-3">About the Contest</h4>
                    <p class="mb-4">
                        <?php echo"$details"; ?>
                    </p>
                    <div class="mb-4 d-flex flex-wrap justify-content-between">
                        <div class="mr-4">
                            <span class="tm-text-gray-dark">Entry Fee: </span><span class="tm-text-primary"><?php echo"$entry_fee"; ?>/=</span>
                        </div>
                        <div class="mr-5 pr-5">
                            <span class="tm-text-gray-dark">Prize: </span><span class="tm-text-primary"><?php echo"$prize"; ?>/=</span>
                        </div>
                    </div>
                    <div class="mr-4 mb-3">
                        <span class="tm-text-gray-dark">Theme: </span><span class="tm-text-primary"><?php echo"$theme"; ?></span>
                    </div>
                    <div class="mr-4 mb-3">
                        <span class="tm-text-gray-dark">Submission Deadline: </span><span class="tm-text-primary"><?php echo"$submission"; ?></span>
                    </div>
                    <div class="mr-4 mb-3">
                        <span class="tm-text-gray-dark">Result Announcement: </span><span class="tm-text-primary"><?php echo"$result"; ?></span>
                    </div>
                    <div>

                        <?php 
                        
                        // Application as participants
                        
                        if(isset($_POST['submit'])) {
                            
                            
                            $user_id = $_SESSION['user_id'];
                            
                            $sql = "SELECT * FROM `sellers` WHERE user_id = '$user_id'";
                            $get_seller_info = mysqli_query($connection, $sql);
                            
                            while($row=mysqli_fetch_assoc($get_seller_info)){
                                $seller_id=$row['seller_id'];
                                $fullname=$row['fullname'];
                            }
                            $image_1 = $_POST['image_1'];
                            $image_2 = $_POST['image_2'];
                            $image_3 = $_POST['image_3'];
                            $description = $_POST['description'];
                            
                            $query = "INSERT INTO `participants`(`contest_id`, `seller_id`,  `seller_name`, `image_1`, `image_2`, `image_3`, `desciption`, `submission_time`, `status`) VALUES ('{$the_contest_id}','{$seller_id}','{$fullname}','{$image_1}','{$image_2}','{$image_3}','{$description}',now(),'unapproved')";
                            $insert_participant = mysqli_query($connection, $query);
                            
                            if(!$insert_participant){

                                die("Query Failed". mysqli_error($connection));

                            }
                            else {
                                
                                $query= "UPDATE contests SET participants = participants+1 WHERE id = $the_contest_id";
                                $update_participants_count= mysqli_query($connection,$query);
                                echo "
                                <script>
                                        alert('Application Submitted!');
                                        window.location.href='contests.php';
                                </script>";
                            }
                        }
                        
                        
                        ?>
                        <form id="contact-form" action="" method="POST" class="tm-contact-form">
                            <h4 class="tm-text-gray-dark">Select Images</h4>
                            <div class="form-group">
                                <input class="form-control" type="file" name="image_1">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="file" name="image_2">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="file" name="image_3">
                            </div>

                            <h4 class="tm-text-gray-dark mb-3">Description</h4>
                            <div class="form-group">
                                <textarea rows="4" name="description" class="form-control rounded-0" placeholder="Description"> </textarea>
                            </div>
                            <div class="form-group tm-text-right">
                                <button type="submit" name="submit" class="btn btn-primary tm-btn-big">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
