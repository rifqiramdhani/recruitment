<!-- login -->
<div class="col-md-8" id="form-login">
    <div class="card-group">
        <div class="container-fluid">
            <!-- show sweet alert -->
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
            <?php
                unset($_SESSION['message']);
                unset($_SESSION['title']);
                unset($_SESSION['type']);
            endif;
            ?>
        </div>

        <div class="card">
            <form action="proses_login.php" method="POST" data-toggle="validator" role="form">
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-muted">Masuk ke akun anda</p>
                    <div class="form-group has-feedback">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" id="email" name="email" class="form-control" data-type-error="Email tidak valid" placeholder="Email" data-data-required-error="Data tidak boleh kosong" required-error="Email Tidak Boleh Kosong" data-required-error="Data tidak boleh kosong" required>
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="password" placeholder="Kata sandi" class="form-control" data-data-required-error="Data tidak boleh kosong" required-error="Kata sandi tidak boleh kosong" data-required-error="Data tidak boleh kosong" required>
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-lg-7 mt-3">
                            <button type="submit" name="login" value="login" class="btn btn-sm btn-primary text-white">Masuk</button>
                        </div>
                        <div class="col-6 col-lg-4 text-right mt-3">
                            <button class="btn btn-link px-0 btn-forgot-password" type="button">Lupa password?</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card text-white py-5 d-md-down-none bg-blue" style="width:44%">
            <div class="card-body text-center">
                <div>
                    <P>SISTEM INFORMASI MANAJEMEN REKRUTMEN PT.BONLI CIPTA SEJAHTERA</P>
                </div>
                <div>
                    <img src="<?= BASE_URL . 'assets/img/brand/bcs.png' ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- forgot password -->
<div class="col-md-7" id="form-forgot-password" style="display: none">
    <div class="container-fluid">
    </div>
    <div class="card mx-4">
        <form action="proses_forgot_password.php" method="POST" data-toggle="validator" role="form">

            <div class="card-body p-4">
                <div class="header mb-3">
                    <button type="button" class="close float-right btn-login" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="text-center">
                    <h3>
                        <i class="fa fa-lock fa-4x mb-4"></i>
                    </h3>
                    <h2>LUPA KATA SANDI</h2>
                    <p>Anda bisa atur ulang kata sandi disini.</p>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input class="form-control" type="email" name="email" value="" placeholder="Email" data-data-required-error="Data tidak boleh kosong" required-error="Email tidak boleh kosong" data-required-error="Data tidak boleh kosong" required>
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>

                <button class="btn btn-block btn-primary" type="submit">Reset Password</button>
            </div>
        </form>
    </div>
</div>