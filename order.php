<?php 
    if(!isset($_SERVER['HTTP_REFERER'])){
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        header('location:index.php');
        exit;
    }
    if(session_status() === PHP_SESSION_NONE){
        session_start();
        // echo '<pre>'. print_r($_SESSION,TRUE) .'</pre>';
    }
    include "conn.php";

    $_POST = json_decode(file_get_contents("php://input"),true);
    // echo '<pre>'. print_r($_POST,TRUE) .'</pre>';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $products = $_POST['products'];
    $payment = $_POST['payment'];
    $keyorder = $_POST['key'];

    insertOrder($conn,$username,$email,$phone,$address,$products,$payment,$key);

    function insertOrder($conn,$username,$email,$phone,$address,$products,$payment,$keyorder){
        
        $order_check_query = "SELECT * FROM `order` WHERE status='lefton' AND username='$username' AND email='$email' AND phonenumber='$phone' ";
        $order_query = mysqli_query($conn,$order_check_query);
        $result =mysqli_fetch_assoc($order_query);
        if($result){
            $update_order_status = "UPDATE `order` SET `status`='pending' WHERE `status`='lefton' AND `username`='$username' AND `email`='$email' AND `phonenumber`='$phone' ";

        }
        else {
            $insert_cart_query = " INSERT INTO `order` (`key`,`username`,`email`,`address`,`phonenumber`,`status`,`payment`,`ordercart`) 
            VALUES ('$keyorder','$username','$email','$address','$phone','pending','$payment','$products') " ; 
            $insert_query = mysqli_query($conn,$insert_cart_query);
        }
    
        
    }

?>