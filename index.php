<?php
require('function/koneksi.php');
require('function/helper.php');

$page = isset($_GET['page']) ? $_GET['page'] : false;
if ($page) {
    require('frontend/' . $page . '.php');
} else {
    require('frontend/index.php');
}

?>


<!-- modal login -->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form action="frontend/olahdata/login.php" method="post" data-toggle="validator" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group has-feedback">
                        <label for="email_login">Email</label>
                        <input type="email" class="form-control" id="email_login" name="email" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="password_login">Password</label>
                        <input type="password" class="form-control" id="password_login" name="password" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <button type="button" class="btn btn-link btn-sm" id="lupapassword">Lupa password?</button>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-sign-in"></i> Login</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- modal lupa password -->
<div class="modal fade" id="modal_lupa_password" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form action="frontend/olahdata/lupa_password.php" method="post" data-toggle="validator" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Lupa Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group has-feedback">
                        <label for="email_lp_pass">Email</label>
                        <input type="email" class="form-control" id="email_lp_pass" name="email" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-sign-in"></i> Submit</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- modal register -->
<div class="modal fade" id="modal_register" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form action="frontend/olahdata/register.php" method="post" data-toggle="validator" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Register</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group has-feedback">
                        <label for="nama_calon_karyawan">Nama</label>
                        <input type="nama_calon_karyawan" class="form-control" id="nama_calon_karyawan" name="nama_calon_karyawan" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="alamat_calon_karyawan">Alamat</label>
                        <input type="alamat_calon_karyawan" class="form-control" id="alamat_calon_karyawan" name="alamat_calon_karyawan" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="telp_calon_karyawan">No telepon</label>
                        <input type="telp_calon_karyawan" class="form-control" id="telp_calon_karyawan" name="telp_calon_karyawan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="ttl_calon_karyawan">Tempat, tanggal lahir</label>
                        <input type="ttl_calon_karyawan" class="form-control" id="ttl_calon_karyawan" name="ttl_calon_karyawan" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>


                    <div class="form-group has-feedback">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-sign-in"></i> Register</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>