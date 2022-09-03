<?php
session_start();
include('../connectDB/conn.php');
if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    

    $sql = "INSERT INTO user(username, password,firstname, lastname,point, level)VALUES('$username', '$pwd', '$fname', '$lname', 5000,'0')";
    $query = mysqli_query($conn, $sql);
    $_SESSION['regisSuccess'] = "success";
    header('location: ../pages/register.php');
}
