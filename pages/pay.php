<?php
include '../include/header.php';
require_once '../connectDB/conn.php';
if (empty($_SESSION['username'])) {
    header('location: login.php');
}

if (isset($_GET['payid'])) {
    $idcart = $_GET['idcart'];
    $findAmount = "SELECT * FROM cart WHERE id = '".$idcart."'";
    $queryAmount = mysqli_query($conn, $findAmount);
    $amount = mysqli_fetch_assoc($queryAmount);

    $select = "SELECT * FROM user WHERE username='" . $_SESSION['username'] . "'";
    $queryselect = mysqli_query($conn, $select);
    $money = mysqli_fetch_assoc($queryselect);
    $id = $_GET['payid'];
    $sql = "SELECT * FROM product WHERE product_id = '" . $id . "'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
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
                            <div class="card mt-5"  style="border-radius: 40px;">
                                <div class="card-header text-center bg-primary text-white" style="border-top-left-radius: 40px;border-top-right-radius: 40px;">
                                    <h4>ชำระเงิน</h4>
                                </div>
                                <div class="card-body scroll">
                                    <div class="text-center"><img src="../imageProduct/<?= $row['image'] ?>" alt="" width="300px" class="img-thumbnail"></div>
                                    <hr>
                                    <form action="../system/paydb.php" method="post">
                                        <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                                        <input type="hidden" name="stock" value="<?= $row['stock'] ?>">
                                        <input type="hidden" name="idcart" value="<?= $idcart ?>">
                                        <!-- <input type="hidden" name="usernamesell" id="" value="<?= $row['username'] ?>"> -->
                                        <div class="form-group">
                                        <input type="text" name="product_name" class="form-control" disabled value="<?=$row['name']?>">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" placeholder="กรุณากรอกที่อยู่" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="tell" class="form-control" placeholder="กรุณากรอกเบอร์โทรศัพท์" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" value="จำนวน <?= $amount['amount'] ?> หน่วย" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" value="ราคา <?= $row['price']*$amount['amount'] ?> ฿" disabled>
                                            <input type="hidden" name="price" class="form-control" value="<?= $row['price']*$amount['amount'] ?> ">
                                        </div>
                                        <input type="hidden" name="point" value="<?= $money['point'] ?>">
                                        <input type="hidden" name="amount" value="<?= $amount['amount'] ?>">
                                        <div class="form-group">
                                            <?php
                                            if ($row['stock'] == 0) { ?>

                                                <button type="submit" name="" class="btn btn-outline-dark" disabled>สินค้าหมด</button>

                                            <?php
                                            } elseif ($money['point'] < $row['price']) { ?>
                                                <button type="submit" name="" class="btn btn-outline-dark" disabled>คุณมีเงินไม่เพียงพอ</button>
                                            <?php
                                            } else { ?>
                                                <button type="submit" name="conbuy" class="btn btn-outline-primary">สั่งซื้อ</button>
                                            <?php
                                            }
                                            ?>
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
}else{
    header('location: cart.php');
}
?>
<style>
    .scroll {
        height: 450px;
        overflow: scroll;
        overflow-x: hidden;
    }
</style> 