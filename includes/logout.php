<?php session_start(); ?>
<?php
        $_SESSION['user_id'] = null;
        $_SESSION['fullname'] = null;
        $_SESSION['email'] = null;
        $_SESSION['phone'] = null;
        $_SESSION['role'] = null;
        $_SESSION['password'] = null;
        $_SESSION['status'] = null;

    header("Location: ../index.php"); 

?>