<?php
require_once('../connectDB/conn.php');
$id = $_SESSION['user_id'];
$sql = "SELECT user_id FROM cart WHERE user_id = '" . $id . "' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_num_rows($query);

$sqlDelivery = "SELECT user_id FROM delivery WHERE user_id = '" . $id . "' ";
$querySqlDelivery = mysqli_query($conn, $sqlDelivery);
$resultDelivery = mysqli_num_rows($querySqlDelivery);
?>

<div class="list-group mt-5">
    <?php
    if ($_SESSION['level'] === 'admin') { ?>
        <a style="border-radius: 20px;" href="add_product.php" class="text-dark list-group-item-action list-group-item list-group-item-warning mt-2 mb-2">เพิ่มสินค้า</a>
        <a style="border-radius: 20px;" href="manage_product.php" class="text-dark list-group-item-action list-group-item list-group-item-warning mt-2 mb-2">จัดการสินค้า</a>
    <?php
    }
    ?>
    <a style="border-radius: 20px;" href="index.php" class="list-group-item list-group-item-action mt-2 mb-2">สินค้า</a>
    <a style="border-radius: 20px;" href="cart.php" class="list-group-item list-group-item-action mt-2 mb-2">ตระกร้า <span class="badge badge-danger"><?= $result ?></span></a>
    <a style="border-radius: 20px;" href="delivery.php" class="list-group-item list-group-item-action mt-2 mb-2">ที่ต้องได้รับ <span class="badge badge-danger"><?= $resultDelivery ?></span></a>
    <!-- <a style="border-radius: 20px;" href="create.php" class="list-group-item list-group-item-action mt-2 mb-2">ผู้จัดทำ</a> -->
    <!-- <a href="#" class="list-group-item list-group-item-action">All Member</a> -->

    <a style="border-radius: 20px;" class="list-group-item list-group-item-danger mt-2 mb-2 " onclick="logout();">Logout</a>
</div>

<script>
    function logout() {
        // document.querySelector('#form').addEventListener('submit', function(e) {
        // var form = this;

        // e.preventDefault(); // <--- prevent form from submitting

        Swal.fire({
            title: 'ออกจากระบบใช่หรือไม่ ?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#30a444',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ไม่ใช่'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = '../system/logout.php';
            }
        })
        // });
    }
</script>