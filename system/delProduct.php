<?php
    session_start();
    include('../connectDB/conn.php');
    $username = $_SESSION['username'];

    if(isset($_GET['delid'])){
        $idpct = $_GET['delid'];
        $sql = "DELETE FROM product WHERE product_id = '$idpct' ";
        $query = mysqli_query($conn, $sql);
        $_SESSION['successDelProduct'] = "success";
        header('location: ../pages/manage_product.php');
    }
?>