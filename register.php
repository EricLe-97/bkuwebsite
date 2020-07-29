<?php
    session_start();
    
    $username = "";
    $email    = "";
    $errors = array();
    include "conn.php";

    if(isset($_POST['register'])){

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

        //Validation
        if (empty($username)) { array_push($errors, "Username is required"); }
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($password)) { array_push($errors, "Password is required"); }
        if ($password != $password2) {
            array_push($errors, "The two passwords do not match");
        }

        //check database
        $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
            }

            if ($user['email'] === $email) {
            array_push($errors, "email already exists");
            }
        }

        if(count($errors) == 0){
            //$password = md5($password);

            $sql = "INSERT INTO `user` (`username`, `password`,`email`,`phonenumber`) VALUES ('$username', '$password', '$email','$phonenumber')";
            $query = mysqli_query($conn, $sql);

            header("location: index.php");
        }
        else{
            header("location: index.php");
        }
    }
?>
 