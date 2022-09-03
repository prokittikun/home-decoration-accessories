<?php
    session_start();
    include('../connectDB/conn.php');
    $username = $_SESSION['username'];

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM delivery WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
        $_SESSION['successDelDelivery'] = "success";
        header('location: ../pages/delivery.php');
    }
?>