<?php 
	session_destroy();
	
	if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - (3600));
	}
	// sleep(2);
	header('location:index.php');
?>