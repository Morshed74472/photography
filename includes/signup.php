<?php session_start(); ?>
<?php 

$connection = mysqli_connect('localhost', 'root', '', 'photography');

if(isset($_POST['signup'])){
    
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $pass=$_POST['password'];    
    $role=$_POST['role'];

//    echo $fullname;
//    echo $email;
//    echo $phone;
//    echo $pass;
//    echo $role;

    $query="INSERT INTO `users`(`fullname`, `email`, `phone`, `role`, `password`, `status`) VALUES ('{$fullname}','{$email}','{$phone}','{$role}','{$pass}','unapproved')";
    $user_signup = mysqli_query($connection, $query);

    if(!$user_signup){
        
        die("Query Failed". mysqli_error($connection));
        
    }
    else {
        echo "
        <script>
                alert('Account Created!');
                window.location.href='../index.php';
        </script>";
    }
}

?>


