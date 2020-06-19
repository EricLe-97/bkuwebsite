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
        
        <form method="POST" action="insert.php" >
            <fieldset>
			<div class="container">
				<legend>Insert Product</legend>
				<label>Product:</label> <input class="textInput" type="text" name="product" required ><br><br>
				<label>Price:</label> <input class="textInput" type="number" name="price" required><br><br>
                <label>Category:</label> <input class="textInput" type="text" name="category" required><br><br>
				<input type="submit" value="Add Product" name="insert">
			</div>
            </fieldset>
        </form>
        
        <?php include "footer.php"?>
    </body>
</html>