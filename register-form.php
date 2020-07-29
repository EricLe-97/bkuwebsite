<!DOCTYPE html>
<html lang="en">
    <head>
	<title>REGISTER</title>
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
            width: 100%;
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
        
        <form method="POST" action="register.php" >
            <fieldset>
			<div class="container">
				<legend>Register Form</legend>
				<label>Username:</label> <input class="textInput" type="text" name="username" required ><br><br>
				<label>Email:</label> <input class="textInput" type="email" name="email" required><br><br>
                <label>Phone number:</label> <input class="textInput" type="number" name="phonenumber" required><br><br>
                <label>Password:</label> <input class="textInput" type="password" name="password" required><br><br>
                <label>Password again:</label> <input class="textInput" type="password" name="password2" required><br><br>
				<input type="submit" value="Register" name="register">
			</div>
            </fieldset>
        </form>
        
        <?php include "footer.php"?>
    </body>
</html>