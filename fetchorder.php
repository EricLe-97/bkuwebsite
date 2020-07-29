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
    if(isset($_POST['key'])){
        $key = $_POST['key'];
        fetchOrder($conn,$key);
    }
    else if (isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        fetchOldOrder($conn,$username,$email,$phonenumber);
    }
    else if (isset($_POST['updatecart'])){
        $updatecart = $_POST['updatecart'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        // echo $updatecart;
        updateCart($conn,$updatecart,$uname,$email,$phonenumber);
    }


    function fetchOrder($conn,$keyOrder){
        $order_check_query = "SELECT * FROM `order` WHERE `key`='$keyOrder' ";
        $order_query = mysqli_query($conn,$order_check_query);
        $result =mysqli_fetch_assoc($order_query);
        if($result){
            echo $result['ordercart'];
            echo ";";
            echo $result['status'];
        }
        else{
            echo '';
        }
    }
    function fetchOldOrder($conn,$username,$email,$phonenumber){
        $order_check_query = "SELECT * FROM `order` WHERE status='lefton' AND username='$username' AND email='$email' AND phonenumber='$phonenumber' ";
        $order_query = mysqli_query($conn,$order_check_query);
        $result =mysqli_fetch_assoc($order_query);
        if($result){
            echo $result['ordercart'];
        }
        else{
            echo '';
        }
    }
    function updateCart($conn,$updatecart,$username,$email,$phonenumber){
        
        $check_exist = "SELECT `username` FROM `order` WHERE `username`='$username' AND `status`='lefton' ";
        $check_query = mysqli_query($conn,$check_exist);
        // $result = mysqli_fetch_assoc($check_query);
        $result = mysqli_fetch_assoc($check_query);

        if($result){
            $update_order_status = "UPDATE `order` SET ordercart='$updatecart' WHERE status='lefton' AND username='$username' AND email='$email' AND phonenumber='$phonenumber' ";
            $update_query = mysqli_query($conn,$update_order_status);
        }
        else {
            $insert_new_order = "INSERT INTO `order` (`key`,`username`,`email`,`address`,`phonenumber`,`status`,`payment`,`ordercart`) VALUES ('','$username','$email','','$phonenumber','lefton','','$updatecart') ";
            $insert_query = mysqli_query($conn,$insert_new_order);
        }
        echo '';
    }
?>