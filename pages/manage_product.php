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
                        <h3>จัดการสินค้า</h3>
                    </div>
                    <div class="card-body">
                        <div class="scroll">
                            <table id="tablescroll" class="table table-striped  ">
                                <thead class="thead-dark sticky-top">
                                    <th>#</th>
                                    <th>รูปสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>จำนวนคงเหลือ</th>
                                    <th>ราคา</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    <?php
                                    $id = $_SESSION['user_id'];
                                    $sql = "SELECT * FROM product";
                                    $query = mysqli_query($conn, $sql);
                                    $i = 1;

                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><img src="../imageProduct/<?= $row['image'] ?>" alt="" width="120px"></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['detail'] ?></td>
                                            <td><?= $row['stock'] ?></td>
                                            <td><?= $row['price'] . " ฿" ?></td>
                                            <td>
                                                <a href="edit.php?productId=<?= $row['product_id'] ?>" type="submit" class="btn btn-outline-success ">แก้ไข</a>
                                                <button onclick="confirmalert(<?=$row['product_id']?>)" class="btn btn-outline-danger ">ลบสินค้า</button>
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
<style>
    .scroll {
        height: 450px;
        overflow: scroll;
        overflow-x: hidden;
    }
</style> 
<?php
if (isset($_SESSION['successUpdate'])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'ดำเนินการเสร็จสิ้น',
            text: 'อัพเดทสินค้าเรียบร้อย..',
            timer: 3000,
            timerProgressBar: true,
        }).then((result) => {
            // location.href = 'index.php';
            <?php
            unset($_SESSION['successUpdate']);
            ?>
        })
    </script>
<?php
}    ?>
<?php
if (isset($_SESSION['successDelProduct'])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'ดำเนินการเสร็จสิ้น',
            text: 'ลบสินค้าเรียบร้อย..',
            timer: 3000,
            timerProgressBar: true,
        }).then((result) => {
            // location.href = 'index.php';
            <?php
            unset($_SESSION['successDelProduct']);
            ?>
        })
    </script>
<?php
}    ?>
<script>
    function confirmalert(idpdct) {
        // document.querySelector('#form').addEventListener('submit', function(e) {
        // var form = this;
        let i = idpdct
        // e.preventDefault(); // <--- prevent form from submitting

        Swal.fire({
            title: 'ต้องการลบสินค้าใช่หรือไม่?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#30a444',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ไม่ใช่'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = '../system/delProduct.php?delid=' + i;
            }
        })
        // });
    }
</script>
<style>
    .scroll {
        height: 450px;
        overflow: scroll;
        overflow-x: hidden;
    }
</style>