<?php session_start(); ?>
<?php $connection= mysqli_connect('localhost', 'root', '', 'photography'); ?>


<?php 

//error_reporting(0);

if(isset($_POST['buy'])){

    $user_id = $_SESSION['user_id'];
    $item_name=$_POST['item_name'];
    $item_cat=$_POST['item_cat'];
    $price=$_POST['price'];
    $icode=$_POST['icode'];
    $image=$_POST['image'];
    
    $query = "SELECT * FROM cart where user_id = '$user_id'";
    $select_cart_query = mysqli_query($connection, $query); 


    if(!$select_cart_query){

        die("Query Failed". mysqli_error($connection));

    }
    
    $db_icode[] = null;

        while($row=mysqli_fetch_assoc($select_cart_query)){
            $db_id=$row['id'];
            $db_item_name=$row['item_name'];
            $db_item_cat=$row['item_cat'];
            $db_price=$row['price'];
            $db_start_date=$row['start_date'];
            $db_end_date=$row['end_date'];
            $db_icode[]=$row['icode'];
            $db_status=$row['status'];
        }
        
        if(in_array("$icode", $db_icode)){
            echo"<script>
            
                alert('Item Already Added');
                window.location.href='cart.php';
                </script>";
        }
        else {
            $sql = "INSERT INTO `cart`(`user_id`, `item_name`, `item_cat`, `image`, `price`, `icode`, `status`) VALUES ('{$user_id}','{$item_name}','{$item_cat}','{$image}','{$price}','{$icode}','incomplete')";
            
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
    $start_date=$_POST['start_date'];
    $icode=$_POST['icode'];
    $image=$_POST['image'];
    
    if($price == 5000) {
        $end_date = $start_date;
    }
    else if($price == 8000){
        $end_date = date('Y-m-d', strtotime($start_date. ' + 1 days'));
    }
    else if($price == 10000){
        $end_date = date('Y-m-d', strtotime($start_date. ' + 2 days'));
    }
    else {
        $end_date = null;
    }
    
    $query = "SELECT * FROM cart where icode = '$icode'";
    $select_photographer_time = mysqli_query($connection, $query); 
    
    if(!$select_photographer_time){

        die("Query Failed". mysqli_error($connection));

    }

    while($row=mysqli_fetch_assoc($select_photographer_time)){
        $db_start_date=$row['start_date'];
        $db_end_date=$row['end_date'];
    }
    if ($start_date == $db_start_date ||  $end_date == $db_end_date) {
        echo"<script>

            alert('Photographer is busy on this schedule. Please Select other time. Thnak you');
            window.location.href='photographer.php';
            </script>";
    }
    
    else {
    
        $query = "SELECT * FROM cart where user_id = '$user_id'";
        $select_cart_query = mysqli_query($connection, $query); 


        if(!$select_cart_query){

            die("Query Failed". mysqli_error($connection));

        }
        $db_icode[] = null;
        while($row=mysqli_fetch_assoc($select_cart_query)){
            $db_id=$row['id'];
            $db_item_name=$row['item_name'];
            $db_item_cat=$row['item_cat'];
            $db_price=$row['price'];
            $db_start_date=$row['start_date'];
            $db_end_date=$row['end_date'];
            $db_icode[]=$row['icode'];
            $db_status=$row['status'];
        }

        if(in_array("$icode", $db_icode)){
            echo"<script>

                alert('Item Already Added');
                window.location.href='cart.php';
                </script>";
        }
        else {
            $sql = "INSERT INTO `cart`(`user_id`, `item_name`, `item_cat`, `image`, `price`, `start_date`, `end_date`, `icode`, `status`) VALUES ('{$user_id}','{$item_name}','{$item_cat}','{$image}','{$price}','{$start_date}','{$end_date}','{$icode}','incomplete')";

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
