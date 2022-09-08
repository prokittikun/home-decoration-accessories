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
                        <h3>สินค้า</h3>
                    </div>
                    <div class="scroll">
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $sql = "SELECT * FROM product";
                                $query = mysqli_query($conn, $sql);

                                foreach ($query as $row) {
                                ?>
                                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-3 mb-3 ">
                                        <div class="card shadow-lg">
                                            <img src="../imageProduct/<?php echo $row['image'] ?>" alt="" class=" pt-1 pb-1 pl-1 pr-1" style="border-radius: 20px;" height="170px">
                                            <!-- <hr class="border-dark"> -->

                                            <div class="card-body ">
                                                <form action="../system/addcart.php" method="post">
                                                    <input name="product_id" hidden value="<?= $row['product_id'] ?>">
                                                    <input name="price" hidden value="<?= $row['price'] ?>">
                                                    <h3 class="card-title"><?php echo $row['name'] ?></h3>
                                                    <p class="card-text"><b>รายละเอียด :</b> <?php echo $row['detail'] ?></p>
                                                    <p class="card-text"><b>สินค้าคงเหลือ :</b> <?php echo $row['stock'] ?></p>
                                                    <p> <span> <b>ราคา</b> : <?php echo $row['price'] ?> ฿</span></p>
                                                    <input name="amount" type="number" min="0" max="<?= $row['stock'] ?>" value="0" />
                                                    <hr class="mt-5 border-white">
                                                    <?php
                                                    if (isset($_SESSION['user_id'])) { ?>
                                                        <button class="btn btn-outline-primary" name="addcart">เพิ่มลงตะกร้า</button>
                                                    <?php
                                                    } else { ?>
                                                        <a href="login.php" class="btn btn-outline-primary btn-sm col-12">เข้าสู่ระบบ</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
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
if (isset($_SESSION['messageError'])) {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'เพิ่มสินค้าไม่สำเร็จ',
            text: 'กรุณาระบุจำนวนสินค้า..',
            timer: 3000,
            timerProgressBar: true,
        }).then((result) => {
            // location.href = 'index.php';
            <?php
            unset($_SESSION['messageError']);
            ?>
        })
    </script>
<?php
} else if (isset($_SESSION['success'])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'เพิ่มสินค้าสำเร็จ',
            text: 'สินค้าถูกนำเข้าตะกร้าแล้ว..',
            timer: 3000,
            timerProgressBar: true,
        }).then((result) => {
            // location.href = 'index.php';
            <?php
            unset($_SESSION['success']);
            ?>
        })
    </script>
<?php
}
?>


<style>
    .scroll {
        height: 495px;
        overflow: scroll;
        overflow-x: hidden;
    }

    input[type=number] {
        float: left;
        width: 70px;
        height: 35px;
        padding: 0;
        font-size: 1.2em;
        text-transform: uppercase;
        text-align: center;
        color: #93504C;
        border: 2px #93504C solid;
        background: none;
        outline: none;
        pointer-events: none;
    }

    span.spinner {
        position: absolute;
        height: 40px;
        user-select: none;
        -ms-user-select: none;
        -moz-user-select: none;
        -webkit-user-select: none;
        -webkit-touch-callout: none;
    }

    span.spinner>.sub,
    span.spinner>.add {
        float: left;
        display: block;
        width: 35px;
        height: 35px;
        text-align: center;
        font-family: Lato;
        font-weight: 700;
        font-size: 1.2em;
        line-height: 33px;
        color: #93504C;
        border: 2px #93504C solid;
        border-right: 0;
        border-radius: 2px 0 0 2px;
        cursor: pointer;
        transition: 0.1s linear;
        -o-transition: 0.1s linear;
        -ms-transition: 0.1s linear;
        -moz-transition: 0.1s linear;
        -webkit-transition: 0.1s linear;
    }

    span.spinner>.add {
        top: 0;
        border: 2px #93504C solid;
        border-left: 0;
        border-radius: 0 2px 2px 0;
    }

    span.spinner>.sub:hover,
    span.spinner>.add:hover {
        background: #93504C;
        color: #25323B;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }
</style>
<script>
    (function($) {
        $.fn.spinner = function() {
            this.each(function() {
                var el = $(this);

                // add elements
                el.wrap('<span class="spinner"></span>');
                el.before('<span class="sub">-</span>');
                el.after('<span class="add">+</span>');

                // substract
                el.parent().on('click', '.sub', function() {
                    if (el.val() > parseInt(el.attr('min')))
                        el.val(function(i, oldval) {
                            return --oldval;
                        });
                });

                // increment
                el.parent().on('click', '.add', function() {
                    if (el.val() < parseInt(el.attr('max')))
                        el.val(function(i, oldval) {
                            return ++oldval;
                        });
                });
            });
        };
    })(jQuery);

    $('input[type=number]').spinner();
</script>
<!-- ?prodctid=<?php //echo $row['product_id'] 
                ?>&price=<?php //echo $row['price'] 
                            ?> -->
<!--  -->