<!-- login -->
<div class="col-md-8" id="form-login">
    <div class="card-group">
        <div class="container-fluid">
            <?php session_flashdata() ?>
        </div>

        <div class="card">
            <form action="proses_login.php" method="POST" data-toggle="validator" role="form">
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-muted">Sign In to your account</p>
                    <div class="form-group has-feedback">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" id="email" name="email" class="form-control" data-type-error="Email tidak valid" placeholder="Enter Email.." data-required-error="Email Tidak Boleh Kosong" required>
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
                            <input type="password" name="password" placeholder="Password" class="form-control" data-required-error="Password tidak boleh kosong" required>
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-lg-7 mt-3">
                            <button type="submit" name="login" value="login" class="btn btn-sm btn-primary text-white">Submit</button>
                        </div>
                        <div class="col-6 col-lg-4 text-right mt-3">
                            <button class="btn btn-link px-0 btn-forgot-password" type="button">Forgot password?</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card text-white py-5 d-md-down-none bg-blue" style="width:44%">
            <div class="card-body text-center">
                <div>
                    <h2>INFORMATION!</h2>
                    <p>Jika belum memiliki akun silahkah hubungi pihak Staff SDM. Jika telah memiliki akun silahkan login.</p>
                </div>
            </div>
        </div>
    </div>
</div>