<?php session_start(); 
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 10000)) {
        session_unset();    
        session_destroy(); 
    }
    $_SESSION['LAST_ACTIVITY'] = time(); 


?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include "include.php";
        ?>
    </head>
    <body>
        <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                include "$page.php";
            }
            else if(isset($_POST['page'])){
                $page = $_POST['page'];
                include "$page.php";
            } 
            else 
                include "home.php";
                // include "vue.php";
        ?>
    </body>
</html>