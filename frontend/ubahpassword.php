<?php require('frontend/template/header.php') ?>
<?php require('frontend/template/top-section.php') ?>

<?php
$email = $_GET['email'];
$change = $_GET['change'];

if (empty($email) & empty($change)) {
    $_SESSION['message'] = 'Maaf anda tidak dapat mengakses halaman tersebut!';
    $_SESSION['title'] = 'Kesalahan!';
    $_SESSION['type'] = 'error';
    redirect('index.php');
}


?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><span>Home</span></a></li>
    <li class="breadcrumb-item active"><span>Ubah Password</span></li>
</ol>
<section id="content-section">
    <div class="container">
        <div class="py-lg-5 py-3">
            <div class="row">
                <div class="col-12">
                    <div class="card work-info">
                        <div class="card-body detail-job">
                            <h4 class="card-title text-center mb-5">Ubah Password</h4>
                            <form action="frontend/olahdata/reset_password.php" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

                                <!-- email -->
                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required readonly>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <!-- new_pass -->
                                <div class="form-group has-feedback">
                                    <label for="newpassword">Password Baru</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" data-minlength="8" data-minlength-error="Minimal 8 karakter" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="newpassword">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Maaf konfirmasi password tidak sama" placeholder="Confirm" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fa fa-save text-white"></i> Simpan
                                    </button>
                                    <a href="?page=detail&penerimaan=<?= $id_recruitment ?>" class="btn btn-warning text-white btn-sm" type="submit">
                                        <i class="fa fa-reply text-white"></i> Kembali
                                    </a>
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