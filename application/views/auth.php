<!-- login -->
<div class="col-md-8" id="form-login">
    <div class="card-group">
        <div class="container-fluid">
            <?= $this->session->flashdata('message') ?>
        </div>

        <div class="card">
            <?= form_open('auth/proseslogin', ['data-toggle' => 'validator', 'role' => 'form']) ?>
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
                        <input type="email" value="<?= set_value('email') ?>" id="email" name="email" class="form-control" data-type-error="Email tidak valid" placeholder="Enter Email.." data-required-error="Email Tidak Boleh Kosong" required>
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                    <?= form_error('email', '<div class="text-danger">', '</div>') ?>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" value="<?= set_value('password') ?>" name="password" placeholder="Password" class="form-control" data-required-error="Password tidak boleh kosong" required>
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                    <?= form_error('password', '<div class="text-danger">', '</div>') ?>
                </div>
                <div class="row">
                    <div class="col-6 col-lg-7 mt-3">
                        <button type="submit" class="btn btn-sm btn-primary text-white">Submit</button>
                        <button class="btn btn-sm btn-primary  btn-register" type="button" id="regis">Register</button>
                    </div>
                    <div class="col-6 col-lg-4 text-right mt-3">
                        <button class="btn btn-link px-0 btn-forgot-password" type="button">Forgot password?</button>
                    </div>
                </div>
            </div>

            <?= form_close() ?>
        </div>

        <div class="card text-white py-5 d-md-down-none bg-blue" style="width:44%">
            <div class="card-body text-center">
                <div>
                    <h2>Sign up</h2>
                    <p>Jika belum memiliki akun silahkah terlebih dahulu untuk register klik link di bawah ini.</p>
                    <button class="btn active mt-3 btn-register" type="button">Register Now!</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register -->
<div class="col-md-7 col-lg-6" id="form-register" style="display: none">
    <div class="container-fluid">
        <?= $this->session->flashdata('message') ?>
    </div>
    <div class="card mx-4">
        <?= form_open('auth/prosesregister', ['data-toggle' => 'validator', 'role' => 'form']) ?>
        <div class="card-body p-4">
            <h1>Register</h1>
            <p class="text-muted">Create your account</p>
            <div class="form-group has-feedback">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="far fa-envelope"></i>
                        </span>
                    </div>
                    <input class="form-control" type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email" data-required-error="Email tidak boleh kosong" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                <?= form_error('email', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group has-feedback">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input class="form-control" name="password" value="<?= set_value('password') ?>" type="password" placeholder="Password" id="register-password" data-required-error="Password tidak boleh kosong" data-minlength="6" data-minlength-error="Password minimal 6 karakter" required>
                    <!-- pattern="((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" data-pattern-error="Format password terdapat huruf besar dan angka" -->
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                <?= form_error('password', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group has-feedback">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input class="form-control" name="retype_password" value="<?= set_value('retype_password') ?>" type="password" placeholder="Repeat password" data-match="#register-password" data-match-error="Password tidak sama" data-required-error="Retype password tidak boleh kosong" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <di class="help-block with-errors">
                    </d>
                    <?= form_error('retype_password', '<div class="text-danger">', '</div>') ?>
            </div>
            <button class="float-right mb-2 btn btn-link btn-login" type="button">Have account?</button>
            <button class="btn btn-block btn-primary" type="submit">Create Account</button>
        </div>
        <?= form_close() ?>
    </div>
</div>
<!-- forgot password -->
<div class="col-md-7" id="form-forgot-password" style="display: none">
    <div class="container-fluid">
        <?= $this->session->flashdata('message') ?>
    </div>
    <div class="card mx-4">
        <?= form_open('auth/prosesforgotpassword', ['data-toggle' => 'validator', 'role' => 'form']) ?>

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
                <h2>FORGOT PASSWORD</h2>
                <p>You can reset your password here.</p>
            </div>
            <div class="form-group has-feedback">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input class="form-control" type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email" data-required-error="Email tidak boleh kosong" required>
                </div>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                <?= form_error('email', '<div class="text-danger">', '</div>') ?>
            </div>

            <button class="btn btn-block btn-primary" type="submit">Reset Password</button>
        </div>
        <?= form_close() ?>
    </div>
</div>