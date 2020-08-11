<?php require('frontend/template/header.php') ?>
<?php require('frontend/template/top-section.php') ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $oldpassword = $_POST['oldpassword'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = mysqli_query($koneksi, "SELECT * FROM `calon_karyawan` WHERE email_calon_karyawan = '$email'");
    $getdata = mysqli_fetch_assoc($query);

    if (password_verify($oldpassword, $getdata['password_calon_karyawan'])) {
        if (mysqli_num_rows($query) > 0) {
            $sql = mysqli_query($koneksi, "UPDATE `calon_karyawan` SET `password_calon_karyawan`='$password' WHERE email_calon_karyawan = '$email'");

            if ($sql) {
                $_SESSION['message'] = 'Password Berhasil Diperbaharui';
                $_SESSION['title'] = 'Data Password';
                $_SESSION['type'] = 'success';
            } else {
                $_SESSION['message'] = 'Password Gagal Diperbaharui';
                $_SESSION['title'] = 'Data Password';
                $_SESSION['type'] = 'error';
            }
        }
    } else {
        $_SESSION['message'] = 'Maaf Password Lama Anda Salah!';
        $_SESSION['title'] = 'Data Password';
        $_SESSION['type'] = 'error';
    }
}

$email = $_SESSION['email_calon_karyawan'];
?>


<?php if (isset($_SESSION['message'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
<?php
    unset($_SESSION['message']);
    unset($_SESSION['title']);
    unset($_SESSION['type']);
endif ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><span>Beranda</span></a></li>
    <li class="breadcrumb-item active"><span>Ubah Password</span></li>
</ol>
<section id="content-section">
    <div class="container">
        <div class="py-lg-5 py-3">
            <div class="row">
                <div class="col-12">
                    <div class="card work-info">
                        <div class="card-body detail-job">
                            <h4 class="card-title text-center mb-5">Ganti Password</h4>
                            <form action="#" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

                                <!-- email -->
                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" data-required-error="Data tidak boleh kosong" required readonly>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <!-- oldpass -->
                                <div class="form-group has-feedback">
                                    <label for="oldpassword">Password Lama</label>
                                    <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Password Lama" data-required-error="Data tidak boleh kosong" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <!-- new_pass -->
                                <div class="form-group has-feedback">
                                    <label for="password">Password Baru</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" data-minlength="8" data-minlength-error="Minimal 8 karakter" data-required-error="Data tidak boleh kosong" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="inputPasswordConfirm">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Maaf konfirmasi password tidak sama" placeholder="Confirm" data-required-error="Data tidak boleh kosong" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fa fa-save text-white"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require('frontend/template/footer.php') ?>