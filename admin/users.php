<?php include "functions.php"?>

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
                    <li>
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
                    <li class="active">
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
                        <a class="navbar-brand mr-3" href="index.php">Dashboard</a><i class='fa fa-chevron-right text-secondary'> </i> <a class="navbar-brand ml-3"  href="users.php">Users</a>
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
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          
                           <?php bulk_users(); ?>
                           
                            <form action="" method="post">
                                <div class="card-header">
                                    <h4 class="card-title"> View All Users</h4>
                                    <div class="col-lg-6 ">
                                        <div id="bulkOptionsContainerfuel" class="input-group">
                                            <select name="bulkoption" id="" class="form-control">
                                                <option value="">Select Options</option>
                                                <option value="approve">Approve</option>
                                                <option value="unapprove">Unapprove</option>
                                                <option value="delete">Delete</option>

                                            </select>
                                            <input type="submit" name="submit" value="Apply" class="btn btn-success d-inline input-group-text mx-3 px-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <tr>
                                                    <th>Select</th>
                                                    <th>user id </th>
                                                    <th>full name</th>
                                                    <th>email</th>
                                                    <th>phone</th>
                                                    <th>role</th>
                                                    <th>status</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php view_all_users(); ?>
                                                <?php Delete_user(); ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script src="./assets/js/plugins/bootstrap-notify.js"></script>
    <script src="./assets/demo/demo.js"></script>
</body>

</html>
