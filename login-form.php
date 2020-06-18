<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>
		<style>
        .form{
            width: 40%;
            padding: 30px;
            border: 1px solid #cbcbcb;
            margin: 5px auto;
        }
        .textInput{
            margin-top: 2px;
            height: 30px;
            border: 1px solid #cbcbcb;
            font-size: 16px;
            padding: 1px;
            width: 50%;
        }
		fieldset {
			display: block;
			margin-left: 2px;
			margin-right: 2px;
			padding-top: 0.35em;
			padding-bottom: 0.625em;
			padding-left: 0.75em;
			padding-right: 0.75em;
			border: 2px groove (internal value);
		}
    	</style>
	</head>
	<body>
		<?php include "header.php"?>
		<form method="POST" action="login.php" >
			<fieldset>
			<div class="container">
				<legend>Login Form</legend>
				<label>Username:</label> <input required class="textInput" type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="username"><br><br>
				<label>Password:</label> <input required class="textInput" type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="password"><br><br>
				<input type="checkbox" name="remember"> Remember me <br><br>
				<input type="submit" value="Login" name="login">
			</div>
			</fieldset>	
		</form>
		
		<?php include "footer.php"?>
	</body>
</html>