<?php

session_start();
require_once '../connectDB/conn.php';
if (!isset($_SESSION['username'])) {
    header('location: ../pages/login.php');
}
$id = $_SESSION['user_id'];
$sqlPoint = "SELECT point FROM user WHERE id = '" . $id . "'";
$queryPoint = mysqli_query($conn, $sqlPoint);
$point = mysqli_fetch_assoc($queryPoint);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?fam   ily=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@3.0.3/src/bootstrap-input-spinner.min.js"></script>

</head>

<body>
    <script src="sweetalert2.min.js"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary  sticky-top" style="min-height: 90px;">
        <div class="container">
            <a class="navbar-brand" href="#"><b>อุปกรณ์ตกแต่งบ้าน</b></a>
            <div class="ml-auto">
                <b>
                    ยอดเงินคงเหลือ : <?= $point['point'] ?> ฿.
                </b>
            </div>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <!-- <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="index.php" style="font-size: 19px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="store.php" style="font-size: 19px;">Store</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </nav>
    <!-- <footer class="fixed-bottom">
        <div class="bg-warning" style="height: 50px;">
            <div class="text-center  ">
                <h4 class="p-2">ติดต่อสอบถาม โทร. 094594223 พิกัด ข้างวัดพระธาตุ อำเภอไชยา (สุราษฎร์ธานี)</h4>
            </div>
    </footer> -->
</body>

</html>
<style>
    body {
        /* background: url('../image/bg2.jpg') no-repeat; */
        background-color: white;
        background-size: cover;
        background-position: left;
        background-attachment: fixed;
    }
</style>