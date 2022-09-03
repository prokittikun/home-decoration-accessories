
<?php

session_start();
include('../connectDB/conn.php');


if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

    if ($result) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['fname'] = $result['firstname'];
        $_SESSION['lname'] = $result['lastname'];
        if ($result['level'] === 'admin') {
            $_SESSION['level'] = "admin";
        } else {
            $_SESSION['level'] = "user";
        }
        $_SESSION['point'] = $result['point'];
        // $_SESSION['loginStatus'] = true;
        // if ($result['level']) { 
        header('location: ../pages/login.php');
        // }
    } else {
        $_SESSION['message'] = 'ชื่อผู้ใช้หรือรหัสผ่านผิด';
        header('location: ../pages/login.php');
    }
}
