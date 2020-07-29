<?php
	session_start();
	include "conn.php";
	if(isset($_POST['login'])){
		
		$username=$_POST['username'];
		$password=$_POST['password'];
	
		$query=mysqli_query($conn,"SELECT * from `user` where username='$username' && password='$password'");
	
		if (mysqli_num_rows($query) == 0){
			$_SESSION['message']="Login Failed. User not Found!";
			header('location:index.php');
		}
		else{
			$row=mysqli_fetch_array($query);
			
			if (isset($_POST['remember'])){?>

				<script>
					alert("remember checked!");
				</script>
				<?php
				header('location:index.php?page=login-form');
				
				// setcookie("user", $row['username'], time() + (10000));
			}
			else{
			
				$_SESSION['username']=$row['username'];
				$_SESSION['email']=$row['email'];
				$_SESSION['phonenumber'] = $row['phonenumber']; 
				header('location:index.php');
			}

		}
	}
	else{
		//header('location:index.php');
		$_SESSION['message']="Please Login!";
	}
?>