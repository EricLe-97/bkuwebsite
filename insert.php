<?php
    session_start();
    
    $product = "";
    $price   = "";
    $category = "";
    $errors = array();
    include "conn.php";

    if(isset($_POST['insert'])){

        $product = mysqli_real_escape_string($conn, $_POST['product']);
        $price   = mysqli_real_escape_string($conn, $_POST['price']);
        $category   = mysqli_real_escape_string($conn, $_POST['category']);

        //Validation
        if (empty($product)) { array_push($errors, "Product is required"); }
        if (empty($price)) { array_push($errors, "Price is required"); }
        if (empty($category)) { array_push($errors, "Category is required"); }

        //check database
        $pro_check_query = "SELECT * FROM product WHERE product='$product' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $pro = mysqli_fetch_assoc($result);
        
        if ($pro) {
            if ($pro['username'] === $product) {
            array_push($errors, "Username already exists");
            }
        }

        if(count($errors) == 0){
            $sql = "INSERT INTO product(product, price, category) VALUES ('$product', '$price', '$category')";
            $query = mysqli_query($conn, $sql);

            header("location: index.php?page=insert-form");
            alert('Success!');
        }else{
            $_SESSION['message'] = "The two password do not match!";
            header("location: index.php");
        }
    }
?>
 