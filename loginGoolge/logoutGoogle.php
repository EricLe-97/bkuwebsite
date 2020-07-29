<?php

//logoutGoogle.php
include('configGoogle.php');
//Destroy entire session data.
session_destroy();

unset($_SESSION['$access_token']);
//redirect page to index.php
header('location:indexGoogle.php');

?>
