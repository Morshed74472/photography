<?php session_start();  ?>
<?php $connection= mysqli_connect('localhost', 'root', '', 'photography'); ?>
<?php
    $query= "SELECT * FROM photos";
    $select_all_photos= mysqli_query($connection,$query);
    $photos_count = mysqli_num_rows($select_all_photos);

    $query= "SELECT * FROM sellers";
    $select_all_sellers= mysqli_query($connection,$query);
    $sellers_count = mysqli_num_rows($select_all_sellers);

    $query= "SELECT * FROM contests";
    $select_all_contests= mysqli_query($connection,$query);
    $contest_count = mysqli_num_rows($select_all_contests);

    $query= "SELECT * FROM participants";
    $select_all_participants= mysqli_query($connection,$query);
    $participants_count = mysqli_num_rows($select_all_participants);

    $query= "SELECT * FROM orders";
    $select_all_order= mysqli_query($connection,$query);
    $order_count = mysqli_num_rows($select_all_order);

    $query= "SELECT * FROM users";
    $select_all_user= mysqli_query($connection,$query);
    $user_count = mysqli_num_rows($select_all_user);

    $query= "SELECT * FROM contact";
    $select_all_message= mysqli_query($connection,$query);
    $message_count = mysqli_num_rows($select_all_message);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Photograph-Y | Admin
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="./assets/demo/demo.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="index.php" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="./assets/img/logo.png">
                    </div>
                </a>
                <a href="index.php" class="simple-text logo-normal">
                    Photograph-Y
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <i class="nc-icon nc-bank"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="photos.php">
                            <i class="nc-icon nc-image"></i>
                            <p>Photos</p>
                        </a>
                    </li>
                    <li>
                        <a href="photographers.php">
                            <i class="nc-icon nc-badge"></i>
                            <p>Photographers</p>
                        </a>
                    </li>
                    <li>
                        <a href="orders.php">
                            <i class="nc-icon nc-paper"></i>
                            <p>Ordes</p>
                        </a>
                    </li>
                    <li>
                        <a href="contests.php">
                            <i class="nc-icon nc-trophy"></i>
                            <p>Contests</p>
                        </a>
                    </li>
                    <li>
                        <a href="participants.php">
                            <i class="fa fa-users"></i>
                            <p>Participants</p>
                        </a>
                    </li>
                    <li>
                        <a href="users.php">
                            <i class="nc-icon nc-circle-10"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="messages.php">
                            <i class="nc-icon nc-email-85"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="index.php">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-settings-gear-65"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="../includes/logout.php">Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-image text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Photos</p>
                                            <p class="card-title"><?php echo $photos_count; ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <div class="row">
                                        <div class="col-10 col-md-10">
                                            <a class="pl-3" href="photos.php"> View Details </a>
                                        </div>
                                        <div class="col-2 col-md-2">
                                            <i class="fa fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-badge text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Photographers</p>
                                            <p class="card-title"><?php echo $sellers_count; ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <div class="row">
                                        <div class="col-10 col-md-10">
                                            <a class="pl-3" href="photographers.php"> View Details </a>
                                        </div>
                                        <div class="col-2 col-md-2">
                                            <i class="fa fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-trophy text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Contests</p>
                                            <p class="card-title"><?php echo $contest_count; ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <div class="row">
                                        <div class="col-10 col-md-10">
                                            <a class="pl-3" href="contests.php"> View Details </a>
                                        </div>
                                        <div class="col-2 col-md-2">
                                            <i class="fa fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-paper text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Orders</p>
                                            <p class="card-title"><?php echo $order_count; ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <div class="row">
                                        <div class="col-10 col-md-10">
                                            <a class="pl-3" href="orders.php"> View Details </a>
                                        </div>
                                        <div class="col-2 col-md-2">
                                            <i class="fa fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h5 class="card-title">View Statistics</h5>
                            </div>
                            <div class="card-body ">
                                <canvas class="flot-base w-100" style="height:80vh;" height="600px" id="statistics"></canvas>
                                <script>
                                    const ctx = document.getElementById('statistics').getContext('2d');
                                    const myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Photos', 'Photographers', 'Contests', 'Participants', 'Orders', 'Messages', 'Users'],
                                            datasets: [{
                                                label: 'Counts',
                                                data: [<?php echo $photos_count; ?>, <?php echo $sellers_count; ?>, <?php echo $contest_count; ?>, <?php echo $participants_count; ?>, <?php echo $order_count; ?>, <?php echo $message_count; ?>, <?php echo $user_count; ?>],
                                                backgroundColor: [
                                                    '#30336b',
                                                    '#686de0',
                                                    '#e056fd',
                                                    '#22a6b3',
                                                    '#f6e58d',
                                                    '#ff7979',
                                                    '#6ab04c'
                                                ],

                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                </script>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script src="./assets/js/plugins/bootstrap-notify.js"></script>
    <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <script src="./assets/demo/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</body>

</html>
