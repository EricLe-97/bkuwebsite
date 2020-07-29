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


    if(isset($_SESSION['username'])){
        echo $_SESSION['username'];
        echo ';';
        echo $_SESSION['email'];
        echo ';';
        echo $_SESSION['phonenumber'];        
    }
    else {
        echo '';
    }
?>
