<?php
session_start();
require 'dbconnect.php';

if(isset($_POST['delete_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['delete_product']); 

    $query = "DELETE FROM product WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product deleted successfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product not deleted!";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $date = mysqli_real_escape_string($con, $_POST['date']);

    $query = "UPDATE product SET name='$name', description='$description', quantity='$quantity', price='$price', expire_date='$date' WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product successfully updated!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product not updated!";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_product']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $date = mysqli_real_escape_string($con, $_POST['date']);

    $query = "INSERT INTO product (name, description, quantity, price, expire_date) VALUES ('$name','$description','$quantity','$price','$date')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Product successfully added!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product not added!";
        header("Location: index.php");
        exit(0);
    }
}
?>