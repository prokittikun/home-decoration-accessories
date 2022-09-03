<?php
session_start();
include('../connectDB/conn.php');
if (isset($_POST['addproduct'])) {

    $img = "images.png";
    $title = $_POST['product_name'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    if (isset($_FILES['upload'])) {

        $name_file =  $_FILES['upload']['name'];
        $tmp_name =  $_FILES['upload']['tmp_name'];
        $locate_img = "../imageProduct/";
        move_uploaded_file($tmp_name, $locate_img . $name_file);

        if ($name_file == '') {
            $name_file = "default.jpg";
        }
    }

    $sql = "INSERT INTO product(image, name, detail, price, stock)VALUES( '$name_file', '$title', '$detail', '$price', '$stock')";
    $query = mysqli_query($conn, $sql);
    $_SESSION['successAdd'] = "success";
    header('location: ../pages/add_product.php');
}
