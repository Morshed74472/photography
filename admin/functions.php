<?php 


// Database Connection
$connection= mysqli_connect('localhost', 'root', '', 'photography'); 

ob_start();


//View All Photos
function view_all_photos() {
    
    global $connection;

    $query="SELECT * FROM photos";
    $get_photos = mysqli_query($connection, $query);

    if(!$get_photos){

        die("Query Failed". mysqli_error($connection));

    }

    while($row=mysqli_fetch_assoc($get_photos)){


        $photo_id =$row['photo_id'];
        $title=$row['title'];
        $details=$row['details'];
        $height=$row['height'];
        $width=$row['width'];
        $format=$row['format'];
        $tags=$row['tags'];
        $price=$row['price'];
        $image=$row['image'];
        $seller_id=$row['seller_id'];
        $icode=$row['icode'];
        $status=$row['status'];

        echo "<tr>";
        
        ?>

<td><input type="checkbox" class="checkboxes" name="checkboxarray[]" value="<?php echo $photo_id; ?>"></td>

<?php
        echo "<td>$photo_id</td>";
        echo "<td>$title</td>";
        echo "<td>$details</td>";
        echo "<td><img width=100 src='../images/$image' alt='images'></td>";
        echo "<td>$format</td>";
        echo "<td>$height</td>";
        echo "<td>$width</td>";
        echo "<td>$tags</td>";
        echo "<td>$price</td>";
        echo "<td>$seller_id</td>";
        echo "<td>$icode</td>";
        echo "<td>$status</td>";
        echo "<td><a href='photos.php?delete={$photo_id}'>Delete</a> </td>";
        echo "</tr>";
    }
}


//Delete Photo
function Delete_photo() {
    
    global $connection;

    if(isset($_GET['delete'])){
        $the_id=$_GET['delete'];

        $query="DELETE FROM photos WHERE photo_id= {$the_id}";
        $delete_query= mysqli_query($connection,$query);
        if(!$delete_query){

            die("Query Failed". mysqli_error($connection));

        }
        else {
            echo"
            <script>alert('Photo Deleted');
                window.location.href='photos.php';
            </script>";
        }
    }
}


//Manipulate Multiple Photo
function bulk_photos() {
    
    global $connection;
    
    if(isset($_POST['checkboxarray'])) {
    
        foreach($_POST['checkboxarray'] as $photo_id) {

            $bulkoption =  $_POST['bulkoption'];

            switch ($bulkoption) {
                    
                case 'approve':
                    $query = "UPDATE photos SET status = 'approved' WHERE photo_id = {$photo_id} ";
                    $update_to_approve = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Photos Approved');
                        window.location.href='photos.php';
                    </script>";
                    
                    break;

                case 'unapprove':
                    $query = "UPDATE photos SET status = 'unapproved' WHERE photo_id = {$photo_id} ";
                    $update_to_unapprove = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Photos Unapproved');
                        window.location.href='photos.php';
                    </script>";
                    
                    break;

                case 'delete': 
                    $query="DELETE FROM photos WHERE photo_id = {$photo_id} ";
                    $delete_photos_query= mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Photo Deleted');
                        window.location.href='photos.php';
                    </script>";

                    break;       
            }
        }
    }
}


//View All Photographers
function view_all_photographers() {
    
    global $connection;

    $query="SELECT * FROM sellers";
    $get_sellers = mysqli_query($connection, $query);

    if(!$get_sellers){

        die("Query Failed". mysqli_error($connection));

    }

    while($row=mysqli_fetch_assoc($get_sellers)){


        $seller_id =$row['seller_id'];
        $user_id=$row['user_id'];
        $fullname=$row['fullname'];
        $details=$row['details'];
        $category=$row['category'];
        $experiance=$row['experiance'];
        $image=$row['image'];
        $icode=$row['icode'];

        echo "<tr>";
        
        ?>

<td><input type="checkbox" class="checkboxes" name="checkboxarray[]" value="<?php echo $seller_id; ?>"></td>

<?php
        echo "<td>$seller_id</td>";
        echo "<td>$user_id</td>";
        echo "<td>$fullname</td>";
        echo "<td>$details</td>";
        echo "<td><img width=100 src='../images/$image' alt='images'></td>";
        echo "<td>$category</td>";
        echo "<td>$experiance</td>";
        echo "<td>$icode</td>";
        echo "<td><a href='photographers.php?delete={$seller_id}'>Delete</a> </td>";
        echo "</tr>";
    }
}


//Delete Photographers
function Delete_photographers() {
    
    global $connection;

    if(isset($_GET['delete'])){
        $the_photographer_id=$_GET['delete'];

        $query="DELETE FROM sellers WHERE seller_id= {$the_photographer_id}";
        $delete_photographer_query= mysqli_query($connection,$query);
        if(!$delete_photographer_query){

            die("Query Failed". mysqli_error($connection));

        }
        else {
            echo"
            <script>alert('Photographer Deleted');
                window.location.href='photographers.php';
            </script>";
        }
    }
}


//Manipulate Multiple Photographer
function bulk_photographers() {
    
    global $connection;
    
    if(isset($_POST['checkboxarray'])) {
    
        foreach($_POST['checkboxarray'] as $photographer_id) {

            $bulkoption =  $_POST['bulkoption'];

            switch ($bulkoption) {
                    
//                case 'approve':
//                    $query = "UPDATE photos SET status = 'approved' WHERE photo_id = {$photo_id} ";
//                    $update_to_approve = mysqli_query($connection,$query);
//                    
//                    echo"
//                    <script>alert('Photos Approved');
//                        window.location.href='photos.php';
//                    </script>";
//                    
//                    break;
//
//                case 'unapprove':
//                    $query = "UPDATE photos SET status = 'unapproved' WHERE photo_id = {$photo_id} ";
//                    $update_to_unapprove = mysqli_query($connection,$query);
//                    
//                    echo"
//                    <script>alert('Photos Unapproved');
//                        window.location.href='photos.php';
//                    </script>";
//                    
//                    break;

                case 'delete': 
                    $query="DELETE FROM sellers WHERE seller_id = {$photographer_id} ";
                    $delete_photographers_query= mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Photographers Deleted');
                        window.location.href='photographers.php';
                    </script>";

                    break;       
            }
        }
    }
}


//View All Contests
function view_all_contests() {
    
    global $connection;

    $query="SELECT * FROM contests";
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

        echo "<tr>";
        
        ?>

<td><input type="checkbox" class="checkboxes" name="checkboxarray[]" value="<?php echo $id; ?>"></td>

<?php
        echo "<td>$id</td>";
        echo "<td>$title</td>";
        echo "<td>$details</td>";
        echo "<td><img width=100 src='../images/$image' alt='images'></td>";
        echo "<td>$entry_fee</td>";
        echo "<td>$prize</td>";
        echo "<td>$theme</td>";
        echo "<td>$submission</td>";
        echo "<td>$result</td>";
        echo "<td class='text-center'>$participants</td>";
        echo "<td>$status</td>";
        echo "<td><a href='edit_contest.php?c_id={$id}'>Edit</a> </td>";
        echo "<td><a href='contests.php?delete={$id}'>Delete</a> </td>";
        echo "</tr>";
    }
}


//Delete Contest
function Delete_contest() {
    
    global $connection;

    if(isset($_GET['delete'])){
        $the_contest_id=$_GET['delete'];

        $query="DELETE FROM contests WHERE id= {$the_contest_id}";
        $delete_contest_query= mysqli_query($connection,$query);
        if(!$delete_contest_query){

            die("Query Failed". mysqli_error($connection));

        }
        else {
            echo"
            <script>alert('Contest Deleted');
                window.location.href='contests.php';
            </script>";
        }
    }
}


//Manipulate Multiple Contests
function bulk_contests() {
    
    global $connection;
    
    if(isset($_POST['checkboxarray'])) {
    
        foreach($_POST['checkboxarray'] as $contests_id) {

            $bulkoption =  $_POST['bulkoption'];

            switch ($bulkoption) {
                    
                case 'publish':
                    $query = "UPDATE contests SET status = 'published' WHERE id = '$contests_id'";
                    $update_to_published = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Contest published');
                        window.location.href='contests.php';
                    </script>";
                    
                    break;

                case 'draft':
                    $query = "UPDATE contests SET status = 'draft' WHERE id = '$contests_id'";
                    $update_to_draft = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Contest Drafted');
                        window.location.href='contests.php';
                    </script>";
                    
                    break;

                case 'delete': 
                    $query="DELETE FROM contests WHERE id = '$contests_id'";
                    $delete_contests_query= mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Contests Deleted');
                        window.location.href='contests.php';
                    </script>";

                    break;       
            }
        }
    }
}


//Update Admin Profile
function add_contest() {
    
    global $connection;
    
    if(isset($_POST['add_contest'])) {
        
        $title = $_POST['title'];
        $theme = $_POST['theme'];
        $entry_fee = $_POST['entry_fee'];
        $prize = $_POST['prize'];
        $image = $_POST['image'];
        $submission = $_POST['submission'];
        $result = $_POST['result'];
        $details = $_POST['details'];
        
        
    $query="INSERT INTO `contests`(`title`, `details`, `entry_fee`, `prize`, `theme`, `submission`, `result`, `image`, `participants`, `status`) VALUES ('{$title}','{$details}','{$entry_fee}','{$prize}','{$theme}','{$submission}','{$result}','{$image}','0','draft')";
    
    $add_contest = mysqli_query($connection, $query);

    if(!$add_contest){
        die("Query Failed". mysqli_error($connection));
    }
    else {
        echo "
        <script>
            alert('Contest Added!');
            window.location.href='contests.php';
        </script>";
    }       
    
    }
}


//Update Admin Profile
function Update_contest() {
    
    global $connection;
    
    if(isset($_POST['edit_contest'])) {
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $theme = $_POST['theme'];
        $entry_fee = $_POST['entry_fee'];
        $prize = $_POST['prize'];
        $image = $_POST['image'];
        $submission = $_POST['submission'];
        $result = $_POST['result'];
        $details = $_POST['details'];
        
        
        if(empty($image)){
            $query= "SELECT * FROM contests WHERE id={$id}";
            $select_image= mysqli_query($connection,$query);


            while($row= mysqli_fetch_array($select_image)){
                $image= $row['image'];
            }

        }
        
        
    $query="UPDATE `contests` SET `title`='{$title}',`details`='{$details}',`entry_fee`='{$entry_fee}',`prize`='{$prize}',`theme`='{$theme}',`submission`='$submission',`result`='{$result}',`image`='{$image}' WHERE id = '$id'";
    
    $update_contest = mysqli_query($connection, $query);

    if(!$update_contest){
        die("Query Failed". mysqli_error($connection));
    }
    else {
        echo "
        <script>
            alert('Constest Information Updated!');
            window.location.href='contests.php';
        </script>";
    }       
    
    }
}


//View All Participant
function view_all_participants() {
    
    global $connection;

    $query="SELECT * FROM participants";
    $get_participants = mysqli_query($connection, $query);

    if(!$get_participants){

        die("Query Failed". mysqli_error($connection));

    }

    while($row=mysqli_fetch_assoc($get_participants)){


        $id  =$row['id'];
        $contest_id=$row['contest_id'];
        $seller_id=$row['seller_id'];
        $seller_name=$row['seller_name'];
        $image_1=$row['image_1'];
        $image_2=$row['image_2'];
        $image_3=$row['image_3'];
        $desciption=$row['desciption'];
        $submission_time=$row['submission_time'];
        $status=$row['status'];

        echo "<tr>";
        
        ?>

<td><input type="checkbox" class="checkboxes" name="checkboxarray[]" value="<?php echo $id; ?>"></td>

<?php
        echo "<td>$id</td>";
        echo "<td>$contest_id</td>";
        echo "<td>$seller_id</td>";
        echo "<td>$seller_name</td>";
        echo "<td><img width=100 src='../images/$image_1' alt='images'></td>";
        echo "<td><img width=100 src='../images/$image_2' alt='images'></td>";
        echo "<td><img width=100 src='../images/$image_3' alt='images'></td>";
        echo "<td>$desciption</td>";
        echo "<td>$submission_time</td>";
        echo "<td>$status</td>";
//        echo "<td><a href='edit_contest.php?c_id={$id}'>Edit</a> </td>";
        echo "<td><a href='participants.php?delete={$id}'>Delete</a> </td>";
        echo "</tr>";
    }
}


//Delete Participant
function Delete_participant() {
    
    global $connection;

    if(isset($_GET['delete'])){
        $the_participant_id=$_GET['delete'];

        $query="DELETE FROM participants WHERE id= {$the_participant_id}";
        $delete_participant_query= mysqli_query($connection,$query);
        if(!$delete_participant_query){

            die("Query Failed". mysqli_error($connection));

        }
        else {
            echo"
            <script>alert('Participant Deleted');
                window.location.href='participants.php';
            </script>";
        }
    }
}


//Manipulate Multiple Participant
function bulk_participants() {
    
    global $connection;
    
    if(isset($_POST['checkboxarray'])) {
    
        foreach($_POST['checkboxarray'] as $participant_id) {

            $bulkoption =  $_POST['bulkoption'];

            switch ($bulkoption) {
                    
                case 'approve':
                    $query = "UPDATE participants SET status = 'approved' WHERE id = '$participant_id'";
                    $update_to_approved = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Participant Approved');
                        window.location.href='participants.php';
                    </script>";
                    
                    break;

                case 'unapprove':
                    $query = "UPDATE participants SET status = 'unapproved' WHERE id = '$participant_id'";
                    $update_to_unapproved = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Participant Unpproved');
                        window.location.href='participants.php';
                    </script>";
                    
                    break;
                    
                case 'disqualify':
                    $query = "UPDATE participants SET status = 'disqualified' WHERE id = '$participant_id'";
                    $update_to_disqualify = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Participant Disqualified');
                        window.location.href='participants.php';
                    </script>";
                    
                    break;


                case 'delete': 
                    $query="DDELETE FROM participants WHERE id = '$contests_id'";
                    $delete_participants_query= mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Participants Deleted');
                        window.location.href='participants.php';
                    </script>";

                    break;       
            }
        }
    }
}



//View All User
function view_all_users() {
    
    global $connection;

    $query="SELECT * FROM users";
    $select_users= mysqli_query($connection, $query);

    if(!$select_users){
        
        die("Query Failed". mysqli_error($connection));
        
    }
    while($row=mysqli_fetch_assoc($select_users)){
        
        $db_user_id=$row['user_id'];
        $db_fullname=$row['fullname'];
        $db_email=$row['email'];
        $db_phone=$row['phone'];
        $db_role=$row['role'];
        $db_status=$row['status'];

        echo "<tr>";
        
        ?>

<td><input type="checkbox" class="checkboxes" name="checkboxarray[]" value="<?php echo $db_user_id; ?>"></td>

<?php
        echo "<td>$db_user_id</td>";
        echo "<td>$db_fullname</td>";
        echo "<td>$db_email</td>";
        echo "<td>$db_phone</td>";
        echo "<td>$db_role</td>";
        echo "<td>$db_status</td>";
        echo "<td><a href='users.php?delete={$db_user_id}'>Delete</a> </td>";
        echo "</tr>";
    }
}


//Delete User
function Delete_user() {
    
    global $connection;

    if(isset($_GET['delete'])){
        $the_user_id=$_GET['delete'];

        $query="DELETE FROM users WHERE user_id= {$the_user_id}";
        $delete_user_query= mysqli_query($connection,$query);
        if(!$delete_user_query){

            die("Query Failed". mysqli_error($connection));

        }
        else {
            echo"
            <script>alert('User Removed');
                window.location.href='users.php';
            </script>";
        }
    }
}


//Manipulate Multiple Users
function bulk_users() {
    
    global $connection;
    
    if(isset($_POST['checkboxarray'])) {
    
        foreach($_POST['checkboxarray'] as $users_id) {

            $bulkoption =  $_POST['bulkoption'];

            switch ($bulkoption) {
                    
                case 'approve':
                    $query = "UPDATE users SET status = 'approved' WHERE user_id= {$users_id} ";
                    $update_to_approve = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('User Approved');
                        window.location.href='users.php';
                    </script>";
                    
                    break;

                case 'unapprove':
                    $query = "UPDATE users SET status = 'unapproved' WHERE user_id = {$users_id} ";
                    $update_to_unapprove = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('User Unapproved');
                        window.location.href='users.php';
                    </script>";
                    
                    break;

                case 'delete': 
                    $query="DELETE FROM users WHERE user_id = {$users_id} ";
                    $delete_photos_query= mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('User Removed');
                        window.location.href='users.php';
                    </script>";

                    break;       
            }
        }
    }
}



//View All User
function view_all_orders() {
    
    global $connection;

    $query="SELECT * FROM orders";
    $select_orders= mysqli_query($connection, $query);

    if(!$select_orders){
        
        die("Query Failed". mysqli_error($connection));
        
    }
    while($row=mysqli_fetch_assoc($select_orders)){
        
        $db_order_id =$row['order_id'];
        $db_user_id =$row['user_id'];
        $db_card_holder=$row['card_holder'];
        $db_card_number=$row['card_number'];
        $db_exp_date=$row['exp_date'];
        $db_address=$row['address'];
        $db_status=$row['status'];
        $db_order_time=$row['order_time'];

        echo "<tr>";
        
        ?>

<td><input type="checkbox" class="checkboxes" name="checkboxarray[]" value="<?php echo $db_order_id; ?>"></td>

<?php
        echo "<td>$db_order_id</td>";
        echo "<td>$db_user_id</td>";
        echo "<td>$db_card_holder</td>";
        echo "<td>$db_card_number</td>";
        echo "<td>$db_exp_date</td>";
        echo "<td>$db_address</td>";
        echo "<td>$db_order_time</td>";
        echo "<td>$db_status</td>";
        echo "<td><a href='orders.php?delete={$db_order_id}'>Delete</a> </td>";
        echo "</tr>";
    }
}


//Delete User
function Delete_order() {
    
    global $connection;

    if(isset($_GET['delete'])){
        $the_order_id=$_GET['delete'];

        $query="DELETE FROM `orders` WHERE order_id= {$the_order_id}";
        $delete_order_query= mysqli_query($connection,$query);
        if(!$delete_order_query){

            die("Query Failed". mysqli_error($connection));

        }
        else {
            echo"
            <script>alert('Order Removed');
                window.location.href='orders.php';
            </script>";
        }
    }
}


//Manipulate Multiple Users
function bulk_orders() {
    
    global $connection;
    
    if(isset($_POST['checkboxarray'])) {
    
        foreach($_POST['checkboxarray'] as $orders_id) {

            $bulkoption =  $_POST['bulkoption'];

            switch ($bulkoption) {
                    
                case 'approve':
                    $query = "UPDATE orders SET status = 'approved' WHERE order_id= {$orders_id} ";
                    $update_to_approve = mysqli_query($connection,$query);
                    
                    $query2 = "SELECT * FROM orders WHERE order_id =  {$orders_id}";
                    $select_ordered_user = mysqli_query($connection,$query2);
                    
                    while($row=mysqli_fetch_assoc($select_ordered_user)){
        
                        $cart_user_id =$row['user_id'];
                    }
                    
                    $query3 = "UPDATE cart SET status = 'complete' WHERE user_id= {$cart_user_id} ";
                    $update_to_complete = mysqli_query($connection,$query3);
                    
                    if(!$update_to_complete){

                        die("Query Failed". mysqli_error($connection));

                    }
                    else {
                    
                        echo"
                        <script>alert('Order Approved');
                            window.location.href='orders.php';
                        </script>";
                    }
                    
                    break;

                case 'unapprove':
                    $query = "UPDATE orders SET status = 'unapproved' WHERE order_id= {$orders_id} ";
                    $update_to_unapprove = mysqli_query($connection,$query);
                    
                    $query2 = "SELECT * FROM orders WHERE order_id =  {$orders_id}";
                    $select_ordered_user = mysqli_query($connection,$query2);
                    
                    while($row=mysqli_fetch_assoc($select_ordered_user)){
        
                        $cart_user_id =$row['user_id'];
                    }
                    
                    $query3 = "UPDATE cart SET status = 'incomplete' WHERE user_id= {$cart_user_id} ";
                    $update_to_complete = mysqli_query($connection,$query3);
                    
                    if(!$update_to_complete){

                        die("Query Failed". mysqli_error($connection));

                    }
                    else {
                    
                        echo"
                        <script>alert('Order Unapproved');
                            window.location.href='orders.php';
                        </script>";
                    }
                    
                    
                    break;
                    
                case 'cancel':
                    $query = "UPDATE orders SET status = 'canceled' WHERE order_id= {$orders_id} ";
                    $update_to_cancel = mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Order Canceled');
                        window.location.href='orders.php';
                    </script>";
                    
                    break;

                case 'delete': 
                    $query="DELETE FROM orders WHERE order_id = {$orders_id} ";
                    $delete_orders_query= mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Orders Removed');
                        window.location.href='orders.php';
                    </script>";

                    break;       
            }
        }
    }
}




//View All Messages
function view_all_messages() {
    
    global $connection;

    $query="SELECT * FROM `contact`";
    $get_messages = mysqli_query($connection, $query);

    if(!$get_messages){

        die("Query Failed". mysqli_error($connection));

    }

    while($row=mysqli_fetch_assoc($get_messages)){


        $contact_id  =$row['contact_id'];
        $user_id=$row['user_id'];
        $name=$row['name'];
        $role=$row['role'];
        $email=$row['email'];
        $message=$row['message'];
        $time=$row['time'];

        echo "<tr>";
        
        ?>

<td><input type="checkbox" class="checkboxes" name="checkboxarray[]" value="<?php echo $contact_id; ?>"></td>

<?php
        echo "<td>$contact_id</td>";
        echo "<td>$user_id</td>";
        echo "<td>$name</td>";
        echo "<td>$role</td>";
        echo "<td>$email</td>";
        echo "<td>$message</td>";
        echo "<td>$time</td>";
        echo "<td><a href='messages.php?delete={$contact_id}'>Delete</a> </td>";
        echo "</tr>";
    }
}


//Delete Messages
function Delete_messages() {
    
    global $connection;

    if(isset($_GET['delete'])){
        $the_message_id=$_GET['delete'];

        $query="DELETE FROM contact WHERE contact_id= {$the_message_id}";
        $delete_message_query= mysqli_query($connection,$query);
        if(!$delete_message_query){

            die("Query Failed". mysqli_error($connection));

        }
        else {
            echo"
            <script>alert('Message Deleted');
                window.location.href='messages.php';
            </script>";
        }
    }
}


//Manipulate Multiple Messages
function bulk_messages() {
    
    global $connection;
    
    if(isset($_POST['checkboxarray'])) {
    
        foreach($_POST['checkboxarray'] as $contact_id) {

            $bulkoption =  $_POST['bulkoption'];

            switch ($bulkoption) {

                case 'delete': 
                    $query="DELETE FROM contact WHERE contact_id= {$contact_id} ";
                    $delete_messages_query= mysqli_query($connection,$query);
                    
                    echo"
                    <script>alert('Messages Deleted');
                        window.location.href='messages.php';
                    </script>";

                    break;       
            }
        }
    }
}


//Update Admin Profile
function profile_Update() {
    
    global $connection;
    
    if(isset($_POST['update_profile'])) {
        
        $user_id = $_POST['user_id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        if(empty($role)){
            $query= "SELECT * FROM users WHERE user_id={$user_id}";
            $select_type= mysqli_query($connection,$query);


            while($row= mysqli_fetch_array($select_type)){
                $role= $row['role'];
            }

        }
        
    $query="UPDATE `users` SET `fullname`='$fullname',`email`='$email',`phone`='$phone',`role`='$role',`password`='$password' WHERE user_id ='$user_id'";
    
    $update_profile = mysqli_query($connection, $query);

    if(!$update_profile){
        die("Query Failed". mysqli_error($connection));
    }
    else {
        echo "
        <script>
            alert('Profile Updated!');
            window.location.href='profile.php';
        </script>";
    }       
    
    }
}


//Update Admin Profile
function other_admins() {
    
    global $connection;
    
    $user_id = $_SESSION['user_id'];

    $query="SELECT * FROM users WHERE role = 'admin' EXCEPT SELECT * FROM users WHERE user_id = '$user_id'";
    $get_user= mysqli_query($connection,$query);

    if(!$get_user){

        die("Query Failed". mysqli_error($connection));

    }

    while($row=mysqli_fetch_assoc($get_user)){


        $db_user_id=$row['user_id'];
        $db_fullname=$row['fullname'];
        $db_email=$row['email'];
        $db_phone=$row['phone'];
        $db_role=$row['role'];
        $db_password=$row['password'];
        $db_status=$row['status'];
        
        echo "
        
        <li>
            <div class='row'>
                <div class='col-md-2 col-2'>
                    <div class='avatar'>
                        <img src='./assets/img/admin.jpg' alt='Circle Image' class='img-circle img-no-padding img-responsive'>
                    </div>
                </div>
                <div class='col-md-7 col-7'>
                    $db_fullname
                    <br/>
                    <span class='text-muted'><small>Offline</small></span>
                </div>
                <div class='col-md-3 col-3 text-right'>
                    <btn class='btn btn-sm btn-outline-success btn-round btn-icon'><i class='fa fa-info'></i></btn>
                </div>
            </div>
        </li>
        
        ";
         
    }

}



?>
