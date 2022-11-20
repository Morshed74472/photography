<?php session_start(); ?>
<?php $connection= mysqli_connect('localhost', 'root', '', 'photography'); ?>


<?php 

error_reporting(0);

if(isset($_POST['buy'])){

    $user_id = $_SESSION['user_id'];
    $item_name=$_POST['item_name'];
    $item_cat=$_POST['item_cat'];
    $price=$_POST['price'];
    $icode=$_POST['icode'];
    
    $query = "SELECT * FROM cart where user_id = '$user_id'";
    $select_cart_query = mysqli_query($connection, $query); 


    if(!$select_cart_query){

        die("Query Failed". mysqli_error($connection));

    }

        while($row=mysqli_fetch_assoc($select_cart_query)){
            $db_id=$row['id'];
            $db_item_name=$row['item_name'];
            $db_item_cat=$row['item_cat'];
            $db_price=$row['price'];
            $db_date=$row['date'];
            $db_icode[]=$row['icode'];
        }
        
        if(in_array("$icode", $db_icode)){
            echo"<script>
            
                alert('Item Already Added');
                window.location.href='cart.php';
                </script>";
        }
        else {
            $sql = "INSERT INTO `cart`(`user_id`, `item_name`, `item_cat`, `price`, `icode`) VALUES ('{$user_id}','{$item_name}','{$item_cat}','{$price}','{$icode}')";
            
            $create_cart_query= mysqli_query($connection,$sql);
            
            if(!$create_cart_query){
                die("Query Failed". mysqli_error($connection));
            }
            else {
                echo"<script>
                alert('Item Added');
                window.location.href='cart.php';
                </script>";
            }
        }

}



if(isset($_POST['hire'])){

    $user_id = $_SESSION['user_id'];
    $item_name=$_POST['item_name'];
    $item_cat=$_POST['item_cat'];
    $price=$_POST['price'];
    $date=$_POST['date'];
    $icode=$_POST['icode'];
    
    $query = "SELECT * FROM cart where user_id = '$user_id'";
    $select_cart_query = mysqli_query($connection, $query); 


    if(!$select_cart_query){

        die("Query Failed". mysqli_error($connection));

    }

    while($row=mysqli_fetch_assoc($select_cart_query)){
        $db_id=$row['id'];
        $db_item_name=$row['item_name'];
        $db_item_cat=$row['item_cat'];
        $db_price=$row['price'];
        $db_date=$row['date'];
        $db_icode[]=$row['icode'];
    }
        
    if(in_array("$icode", $db_icode)){
        echo"<script>

            alert('Item Already Added');
            window.location.href='cart.php';
            </script>";
    }
    else {
        $sql = "INSERT INTO `cart`(`user_id`, `item_name`, `item_cat`, `price`, `date`, `icode`) VALUES ('{$user_id}','{$item_name}','{$item_cat}','{$price}','{$date}','{$icode}')";

        $create_cart_query= mysqli_query($connection,$sql);

        if(!$create_cart_query){
            die("Query Failed". mysqli_error($connection));
        }
        else {
            echo"<script>
            alert('Item Added');
            window.location.href='cart.php';
            </script>";
        }
    }
}


if(isset($_POST['remove'])){   
    
    $user_id = $_SESSION['user_id'];
    $remove_icode=$_POST['icode'];
    
    $sql = "DELETE FROM cart WHERE icode = '$remove_icode' AND user_id = '$user_id'";
    
    $remove_cart_item = mysqli_query($connection, $sql); 


        if(!$remove_cart_item){

            die("Query Failed". mysqli_error($connection));

        }
        else {
            echo"<script>alert('Item Removed');
            window.location.href='cart.php';
            </script>";
    }
}























?>
