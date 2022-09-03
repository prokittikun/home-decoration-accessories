<?php
session_start();
include('../connectDB/conn.php');

if (isset($_POST['conbuy'])) {
    $iduser = $_SESSION['user_id'];
    $id_product = $_POST['product_id'];
    $idcart = $_POST['idcart'];
    $money = $_POST['point'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $amount = $_POST['amount'];
    $address = $_POST['address'];
    $tell = $_POST['tell'];
    $username = $_SESSION['username'];
    $update = "UPDATE user SET point = '$money' - '$price' WHERE id='" . $iduser . "'";
    $query = mysqli_query($conn, $update);

    $del = "DELETE FROM cart WHERE id='" . $idcart . "'";
    $querydel = mysqli_query($conn, $del);

    $delstock = "UPDATE product SET stock = '$stock' - '$amount' WHERE product_id='" . $id_product . "'";
    $querystock = mysqli_query($conn, $delstock);

    $dalivery = "INSERT INTO delivery(product_id, user_id,address, tell)VALUES('$id_product', '$iduser', '$address', '$tell')";
    $querydalivery = mysqli_query($conn, $dalivery);


    // $select = "SELECT * FROM user WHERE username='".$usernamesell."'";
    // $queryselect = mysqli_query($conn, $select);
    // $obj = mysqli_fetch_assoc($queryselect);
    // $moneysell = $obj['money'];
    // $coin = "UPDATE user SET money = '$moneysell' + '$price' WHERE username = '".$usernamesell."'";
    // $coinquery = mysqli_query($conn, $coin);
    /*** 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set("Asia/Bangkok");

    $findOne = "SELECT * FROM product WHERE product_id = '" . $id_product . "'";
    $queryFind = mysqli_query($conn, $findOne);
    $text = mysqli_fetch_assoc($queryFind);

    $sToken = "rsqIEETs4dhQxvTuhhg06zah8SoXVREQ0uO58Kq3Nos";
    $sMessage .= "มีออเดอร์เข้าจ้าา\n";
    $sMessage .= "ชื่อสินค้า : " . $text['name'] . "\n";
    $sMessage .= "รายละเอียดสินค้า : " . $text['detail'] . "\n";
    $sMessage .= "จำนวน : " . $amount . "\n";
    $sMessage .= "ราคา : " . $price . "\n";
    $sMessage .= "-- ข้อมูลผู้สั่งอาหาร --" . "\n";
    $sMessage .= "ชื่อ : " . $_SESSION['fname'] . "\n";
    $sMessage .= "นามสกุล : " . $_SESSION['fname'] . "\n";
    $sMessage .= "ที่อยู่ : " . $address . "\n";
    $sMessage .= "เบอร์โทร : " . $tell . "\n";

    $chOne = curl_init();
    curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($chOne, CURLOPT_POST, 1);
    curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
    $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($chOne);

    //Result error 
    if (curl_error($chOne)) {
        echo 'error:' . curl_error($chOne);
    } else {
        $result_ = json_decode($result, true);
        echo "status : " . $result_['status'];
        echo "message : " . $result_['message'];
    }
    curl_close($chOne);
     ***/
    $_SESSION['successPay'] = 'success';
    header('location: ../pages/cart.php');
    // print_r($obj);
} else {
    header('location: ../pages/cart.php');
}
