<?php
include '../include/header.php';
require_once '../connectDB/conn.php';
if (empty($_SESSION['username'])) {
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <?php include('../include/sidebar.php') ?>
            </div>
            <div class="col-xl-9">
                <div class="card mt-5" style="border-radius: 40px;">
                    <div class="card-header text-center text-white bg-primary" style="border-top-left-radius: 40px;border-top-right-radius: 40px;">
                        <h3>ผู้จัดทำ</h3>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                นางสาวธมลวรรณ เอียดคง เลขที่ 8
                            </div>
                            <div class="col-sm-4">
                                นางสาววิสสุตา สังข์ไข เลขที่ 20
                            </div>
                            <div class="col-sm-4">
                                นาวสาวกัญญาณัฐน์ จงจิตต์ เลขที่ 29
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>