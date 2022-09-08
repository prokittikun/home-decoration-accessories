<?php
include '../include/header.php';
require_once '../connectDB/conn.php';
// if (empty($_SESSION['username'])) {
//     header('location: login.php');
// }

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
                        <h3>ตะกร้า</h3>
                    </div>
                    <div class="card-body">
                        <div class="scroll">
                            <table id="tablescroll" class="table table-striped  ">
                                <thead class="thead-dark sticky-top">
                                    <th>#</th>
                                    <th>รูปสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    <?php
                                    $id = $_SESSION['user_id'];
                                    $sql = "SELECT * FROM cart WHERE user_id ='" . $id . "'";
                                    $query = mysqli_query($conn, $sql);
                                    $i = 1;

                                    foreach ($query as $row) {

                                        $product_id = $row['product_id'];
                                        $prodct = "SELECT * FROM product WHERE product_id = '$product_id' ";
                                        $queryproduct = mysqli_query($conn, $prodct);
                                        $result = mysqli_fetch_assoc($queryproduct);
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><img src="../imageProduct/<?= $result['image'] ?>" alt="" width="120px"></td>
                                            <td><?= $result['name'] ?></td>
                                            <td><?= $result['detail'] ?></td>
                                            <td><?= $row['amount'] ?></td>
                                            <td><?= $result['price'] * $row['amount'] . " ฿" ?></td>
                                            <td>
                                                <a href="pay.php?payid=<?= $result['product_id'] ?>&idcart=<?= $row['id'] ?>" type="submit" class="btn btn-outline-success btn-sm">ชำระเงิน</a>
                                                <button onclick="confirmalert(<?=$result['product_id']?>,<?= $row['id']?>)" class="btn btn-outline-danger btn-sm">ลบสินค้า</button>
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

<?php
if (isset($_SESSION['successPay'])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'ชำระเงินสำเร็จ',
            text: 'สินค้ากำลังรอจัดส่ง..',
            timer: 3000,
            timerProgressBar: true,
        }).then((result) => {
            // location.href = 'index.php';
            <?php
            unset($_SESSION['successPay']);
            ?>
        })
    </script>
<?php
}    ?>
<?php
if (isset($_SESSION['successDel'])) {
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
            unset($_SESSION['successDel']);
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
<script>
    function confirmalert(idpdct,cartid) {
        // document.querySelector('#form').addEventListener('submit', function(e) {
        // var form = this;
        let i = idpdct
        let x = cartid
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
                window.location = '../system/delcart.php?delid=' + i + '&id=' + x;
            }
        })
        // });
    }
</script>