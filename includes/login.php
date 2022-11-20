<?php session_start(); ?>
<?php 

$connection = mysqli_connect('localhost', 'root', '', 'photography');

if(isset($_POST['login'])){
    
    $email=$_POST['email'];
    $pass=$_POST['password'];
    
    $query="SELECT * FROM users WHERE email ='{$email}'";
    $user_login = mysqli_query($connection, $query);

    if(!$user_login){
        
        die("Query Failed". mysqli_error($connection));
        
    }
    while($row=mysqli_fetch_assoc($user_login)){
        
        $db_user_id=$row['user_id'];
        $db_fullname=$row['fullname'];
        $db_email=$row['email'];
        $db_phone=$row['phone'];
        $db_role=$row['role'];
        $db_password=$row['password'];
        $db_status=$row['status'];
        
    }

    if($db_email !== $email && $pass !==  $db_password){
        
        header("Location: ../index.php");  
        
    }
    
    else if($db_email == $email && $pass ==  $db_password && $db_status == 'approved' && $db_role  == 'admin'){
        
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['fullname'] = $db_fullname;
        $_SESSION['email'] = $db_email;
        $_SESSION['phone'] = $db_phone;
        $_SESSION['role'] = $db_role;
        $_SESSION['password'] = $db_password;
        $_SESSION['status'] = $db_status;

        header("Location: ../admin"); 

        
    }
    
    else if($db_email == $email && $pass ==  $db_password && $db_status == 'approved' && $db_role  == 'seller'){
        
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['fullname'] = $db_fullname;
        $_SESSION['email'] = $db_email;
        $_SESSION['phone'] = $db_phone;
        $_SESSION['role'] = $db_role;
        $_SESSION['password'] = $db_password;
        $_SESSION['status'] = $db_status;

        header("Location: ../seller"); 
            
        
    }
    
    else if($db_email == $email && $pass ==  $db_password && $db_status == 'approved' && $db_role  == 'customer'){
        
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['fullname'] = $db_fullname;
        $_SESSION['email'] = $db_email;
        $_SESSION['phone'] = $db_phone;
        $_SESSION['role'] = $db_role;
        $_SESSION['password'] = $db_password;
        $_SESSION['status'] = $db_status;

        header("Location: ../customer"); 
            
        
    }
    
    else{
        
        header("Location: ../index.php"); 

    }
        
}

?>


