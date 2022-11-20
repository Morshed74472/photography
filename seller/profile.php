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
                        <a class="nav-link nav-link-1" href="index.php">Photos</a>
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
        <h1 class="tm-text-primary mb-4">Home / <span class="tm-text-secondary">Profile</span></h1>
    </div>

    <div class="container-fluid tm-mt-60">
        <div class="row tm-mb-50">
            <div class="col-md-8 col-12 mb-5 mx-auto">
                <?php 
                
                $user_id = $_SESSION['user_id'];
                $fullname = $_SESSION['fullname'];
                
                $sql = "SELECT * FROM `sellers` WHERE user_id = '$user_id'";
                $select_the_seller = mysqli_query($connection, $sql);
                $seller_count = mysqli_num_rows($select_the_seller);
                
                if($seller_count != 0 ){
                    echo "<h2 class='col-12 tm-text-primary text-center'>
                            You have already completed your profile. Thank You.
                        </h2>";
                }
                else {
                
                
                ?>
                <h2 class='tm-text-primary text-center mb-5'>Complete your Profile</h2>
                <?php 
                
                    
                
                    if(isset($_POST['submit'])){

                        $category=$_POST['category'];
                        $experiance=$_POST['experiance'];
                        $image=$_POST['image'];
                        $details=$_POST['details'];

                        $query="INSERT INTO `sellers`(`user_id`, `fullname`, `details`, `category`, `experiance`, `image`, `icode`) VALUES ('{$user_id}','{$fullname}','{$details}','{$category}','{$experiance}','{$image}','[value-8]')";
                        $contact_query = mysqli_query($connection, $query);

                        if(!$contact_query){

                            die("Query Failed". mysqli_error($connection));

                        }
                        else {
                            $sql = "SELECT * FROM `sellers` WHERE user_id = '$user_id'";
                            $get_seller_id = mysqli_query($connection, $sql);
                            while($row=mysqli_fetch_assoc($get_seller_id)){
                                $seller_id=$row['seller_id'];
                            }

                            $sql2 = "UPDATE `sellers` SET `icode`='s10{$seller_id}' WHERE seller_id='$seller_id'";
                            $update_icode = mysqli_query($connection, $sql2);

                            echo "
                            <script>
                                    alert('Profile Created!');
                                    window.location.href='Profile.php';
                            </script>";
                        }
                    }
                
                ?>
                <form id="contact-form" action="" method="POST">
                    <div class="form-group">
                        <input type="text" value="<?php echo $fullname; ?>" class="form-control rounded-0" placeholder="Name" disabled />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="contact-select" name="category">
                            <option>Category</option>
                            <option value="Wedding and Event Photography">Wedding and Event Photography</option>
                            <option value="Film and Cinematography">Film and Cinematography</option>
                            <option value="Vactional Photography">Vactional Photography</option>
                            <option value="Fashion Photography">Fashion Photography</option>
                            <option value="Astro Photography">Astro Photography</option>
                            <option value="Editorial Photography">Editorial Photography</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" name="experiance" class="form-control rounded-0" placeholder="Experiance" required />
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control rounded-0" />
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
