<?php
    session_start();
    include('../connectDB/conn.php');
    $username = $_SESSION['username'];

    if(isset($_GET['delid'])){
        $id = $_GET['id'];
        $idpct = $_GET['delid'];
        $sql = "DELETE FROM cart WHERE id = '$id' AND product_id = '$idpct'";
        $query = mysqli_query($conn, $sql);
        $_SESSION['successDel'] = "success";
        header('location: ../pages/cart.php');
    }
?>