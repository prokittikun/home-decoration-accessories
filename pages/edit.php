<?php
include '../include/header.php';
require_once '../connectDB/conn.php';
if (empty($_SESSION['username'])) {
    header('location: login.php');
}

if (isset($_GET['productId'])) {
    $idproduct = $_GET['productId'];
    $findAll = "SELECT * FROM product WHERE product_id = '" . $idproduct . "'";
    $queryProduct = mysqli_query($conn, $findAll);
    $row = mysqli_fetch_assoc($queryProduct);

    // $select = "SELECT * FROM user WHERE username='" . $_SESSION['username'] . "'";
    // $queryselect = mysqli_query($conn, $select);
    // $money = mysqli_fetch_assoc($queryselect);
    // $id = $_GET['payid'];
    // $sql = "SELECT * FROM product WHERE product_id = '" . $id . "'";
    // $query = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($query);
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
                                    <h4>แก้ไขสินค้า</h4>
                                </div>
                                <div class="card-body scroll">
                                    <div class="text-center"><img src="../imageProduct/<?= $row['image'] ?>" alt="" width="300px" class="img-thumbnail"></div>
                                    <hr>
                                    <form enctype="multipart/form-data" action="../system/updateProduct.php" method="post">
                                        <div class="form-group">
                                            <label for="">รูปสินค้า</label>
                                            <input type="file" name="upload" accept="image/*">
                                        </div>
                                        <input name="id" hidden value="<?= $row['product_id'] ?>">
                                        <div class="form-group">
                                            <label for="">ชื่อสินค้า</label>
                                            <input type="text" name="product_name" class="form-control" value="<?= $row['name'] ?>" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="">รายละเอียด</label>
                                            <input type="text" name="detail" class="form-control" value="<?= $row['detail'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">จำนวนสินค้า</label>
                                            <input type="text" name="stock" class="form-control" value="<?= $row['stock'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">ราคา</label>
                                            <input type="text" name="price" class="form-control" value="<?= $row['price'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="update" class="btn btn-outline-primary">อัพเดท</button>
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
    <style>
        .scroll {
            height: 500px;
            overflow: scroll;
            overflow-x: hidden;
        }
    </style>
<?php
} else {
    header('location: manage_product.php');
}
?>