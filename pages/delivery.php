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
    <title>ตะกร้าสินค้า</title>
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
                        <h3>ที่ต้องได้รับ</h3>
                    </div>
                    <div class="card-body">
                        <div class="scroll">
                            <table id="tablescroll" class="table table-striped  ">
                                <thead class="thead-dark sticky-top">
                                    <th>#</th>
                                    <th>รูปสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทร</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    <?php
                                    $id = $_SESSION['user_id'];
                                    $sql = "SELECT * FROM delivery WHERE user_id ='" . $id . "'";
                                    $query = mysqli_query($conn, $sql);
                                    $i = 1;

                                    foreach ($query as $row) {

                                        $product_id = $row['product_id'];
                                        $prodct = "SELECT * FROM product WHERE product_id = '$product_id' ";
                                        $queryproduct = mysqli_query($conn, $prodct);
                                        $result = mysqli_fetch_assoc($queryproduct);
                                        $idDelivery = $row['id'];
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><img src="../imageProduct/<?= $result['image'] ?>" alt="" width="120px"></td>
                                            <td><?= $result['name'] ?></td>
                                            <td><?= $result['detail'] ?></td>
                                            <td><?= $row['address'] ?></td>
                                            <td><?= $row['tell'] ?></td>
                                            <td>
                                                <button onclick="confirmalert(<?=$idDelivery?>)" class="btn btn-outline-success btn-sm">เสร็จสิ้น</button>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function confirmalert(id) {
        // document.querySelector('#form').addEventListener('submit', function(e) {
        // var form = this;
        let i = id
        // e.preventDefault(); // <--- prevent form from submitting

        Swal.fire({
            title: 'คุณได้รับสินค้าแล้วใช่หรือไม่?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#30a444',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ไม่ใช่'
        }).then((result) => {
            if (result.isConfirmed) {
               window.location = '../system/delDelivery.php?id=' + i;
            }
        })
        // });
    }
</script>
<?php
if (isset($_SESSION['successDelDelivery'])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'ยืนยันการรับสิ้นค้าเสร็จสิ้น',
            text: 'ขอบคุณที่ใช้บริการ..',
            timer: 3000,
            timerProgressBar: true,
        }).then((result) => {
            // location.href = 'index.php';
            <?php
            unset($_SESSION['successDelDelivery']);
            ?>
        })
    </script>
<?php
}    ?>
<style>
    .scroll {
        height: 450px;
        overflow: scroll;
        overflow-x: hidden;
    }
</style>