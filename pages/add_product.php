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
    <!-- <title>Document</title> -->
</head>

<body>
    <?php //include 'include/navbar.php'; 
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <?php include('../include/sidebar.php') ?>
            </div>
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5" style="border-radius: 40px;">
                            <div class="card-header text-center bg-primary text-white" style="border-top-left-radius: 40px;border-top-right-radius: 40px;">
                                <h4>เพิ่มสินค้า</h4>
                            </div>
                            <div class="card-body scroll">
                                <form enctype="multipart/form-data" action="../system/addProduct.php" method="post">
                                    <div class="form-group">
                                        <label for="">รูปสินค้า</label>
                                        <input type="file" name="upload" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="">ชื่อสินค้า</label>
                                        <input type="text" name="product_name" class="form-control"  required>

                                    </div>
                                    <div class="form-group">
                                        <label for="">รายละเอียด</label>
                                        <input type="text" name="detail" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">จำนวนสินค้า</label>
                                        <input type="text" name="stock" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">ราคา</label>
                                        <input type="text" name="price" class="form-control"  required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="addproduct" class="btn btn-outline-primary">เพิ่มสินค้า</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_SESSION['successAdd'])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'ดำเนินการเสร็จสิ้น',
            text: 'เพิ่มสินค้าเรียบร้อย..',
            timer: 3000,
            timerProgressBar: true,
        }).then((result) => {
            // location.href = 'index.php';
            <?php
            unset($_SESSION['successAdd']);
            ?>
        })
    </script>
<?php
}    ?>
<style>
    .scroll {
        height: 500px;
        overflow: scroll;
        overflow-x: hidden;
    }
</style>