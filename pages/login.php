<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row ">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card mt-5 shadow-lg">
                    <div class="card-header text-center text-dark bg-warning">
                        <b>
                            <h4>Login</h4>
                        </b>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION['message'])){
                                echo "<div class='text-center mb-2'>";
                                echo '<span class="text-danger "> '.$_SESSION['message'].'</span>';
                                echo "</div>";
                            }
                        ?>
                        <form action="../system/login.php" method="post">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="width: 40px;"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="username" placeholder="กรุณากรอกบัญชีผู้ใช้" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="width: 40px;"><i class="fas fa-key"></i></div>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="กรุณากรอกรหัสผ่าน" required >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="">
                                        <button name="login" class="btn btn-success col-12">Login <i class="fas fa-sign-in-alt"></i></button>
                                    </div>
                                    <div class="text-center mt-2">
                                        <a href="register.php">ยังไม่เป็นสมาชิก ?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>

</html>
<style>
    body {
        /* background: url('../image/bg2.jpg') no-repeat; */
        background-color: white;
        background-size: cover;
        background-position: left;
        background-attachment: fixed;
    }
</style>
<?php
if (isset($_SESSION['username'])) {
    unset($_SESSION['message']);
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'เข้าสู่ระบบ',
            text: 'เข้าสู่ระบบสำเร็จ',
            timer: 2000,
            timerProgressBar: true,
            confirmButtonColor: '#00C851',
        }).then((result) => {
            location.href = 'index.php';
        })
    </script>
<?php
}
?>