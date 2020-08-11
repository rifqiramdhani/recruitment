<?php

require('../function/koneksi.php');
require('../function/helper.php');
// cek apakah user sudah login
$email = $_GET['email'];
$token = $_GET['token'];

if(empty($email) || empty($token)){
    header('location: index.php');
}

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = mysqli_query($koneksi, "SELECT * FROM `karyawan` WHERE email_karyawan = '$email'");
    $getdata = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) > 0) {
        if ($getdata['token_karyawan'] == $token) {
            $sql = mysqli_query($koneksi, "UPDATE karyawan SET password_karyawan = '$password' WHERE email_karyawan = '$email'");

            if($sql){
                $_SESSION['message'] = 'Password Berhasil Diperbaharui.';
                $_SESSION['title'] = 'Login';
                $_SESSION['type'] = 'success';
                redirect('login');
            }else{
                $_SESSION['message'] = 'Password Gagal Diperbaharui.';
                $_SESSION['title'] = 'Login';
                $_SESSION['type'] = 'error';
                redirect('login');
            }
            
         } else {
            $_SESSION['message'] = 'Maaf token untuk aktivasi email salah!';
            $_SESSION['title'] = 'Login';
            $_SESSION['type'] = 'error';
            redirect('login');
        }
    } else {
        $_SESSION['message'] = 'Maaf email belum terdaftar!';
        $_SESSION['title'] = 'Login';
        $_SESSION['type'] = 'error';
        redirect('login');
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Portal Login - PT Bonli Cipta Sejahtera</title>

    <!-- favicon -->

    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL . 'assets/img/favicons.png' ?>">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- style core ui -->
    <link href="<?= BASE_URL . 'assets/css/style.css' ?>" rel="stylesheet">
    <link href="<?= BASE_URL . 'assets/vendors/pace-progress/css/pace.min.css' ?>" rel="stylesheet">
    <link href="<?= BASE_URL . 'assets/css/custom.css' ?>" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" id="form-forgot-password" >
                <div class="container-fluid">
                </div>
                <div class="card mx-4">
                    <form action="" method="POST" data-toggle="validator" role="form">
                        <div class="card-body p-4">
                            <div class="header mb-3">
                                <button type="button" class="close float-right btn-login" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="text-center">
                                <h3>
                                    <i class="fa fa-key fa-4x mb-4"></i>
                                </h3>
                                <h2>Ganti Password</h2>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input class="form-control" type="email" name="email" value="<?= $email ?>" placeholder="Email" data-data-required-error="Data tidak boleh kosong" required-error="Email tidak boleh kosong" readonly>
                                    <input type="hidden" value="<?= $token ?>">
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" data-data-required-error="Data tidak boleh kosong" required-error="Password tidak boleh kosong" data-required-error="Data tidak boleh kosong" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input class="form-control" type="password" name="password" data-match="#password" data-match-error="Retype Password Tidak Sama" placeholder="Retype Password" data-data-required-error="Data tidak boleh kosong" required-error="Retype Password tidak boleh kosong" data-required-error="Data tidak boleh kosong" required>
                                </div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <button class="btn btn-block btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= BASE_URL . 'assets/vendors/jquery/js/jquery.min.js' ?>"></script>
    <script src="<?= BASE_URL . 'assets/vendors/bootstrap/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL . 'assets/vendors/pace-progress/js/pace.min.js' ?>"></script>
    <!-- form validation -->
    <script src="<?php echo BASE_URL . 'assets/node_modules/bootstrap-validator/dist/validator.min.js'; ?>"></script>
    <!-- fontawesome -->
    <script src="<?= BASE_URL . 'assets/js/all.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?= BASE_URL . 'assets/js/custom.js'; ?>" type="text/javascript" charset="utf-8"></script>
    <!-- sweetaler 2 -->
    <script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>

</body>

</html>