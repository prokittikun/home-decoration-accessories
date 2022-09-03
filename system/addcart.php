<?php

session_start();
require_once '../connectDB/conn.php';

if (isset($_POST['addcart'])) {

    if ($_POST['amount'] != 0) {
        $id_prodct = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];

        $sql = "INSERT INTO cart(product_id, user_id, amount) VALUES ('$id_prodct', '$user_id', '$amount')";
        $query = mysqli_query($conn, $sql);

        $_SESSION['success'] = 'success';
        header('location: ../pages/index.php');
    } else {
        $_SESSION['messageError'] = 'error';
        header('location: ../pages/index.php');
    }
}
