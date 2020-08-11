<?php
require('function/koneksi.php');
require('function/helper.php');

$page = isset($_GET['page']) ? $_GET['page'] : false;
if ($page) {
    if(file_exists('frontend/' . $page . '.php')){
        require('frontend/' . $page . '.php');
    }else{
        require('template/404.php');
    }
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
                        <input type="email" class="form-control" id="email_login" name="email" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="password_login">Password</label>
                        <input type="password" class="form-control" id="password_login" name="password" data-required-error="Data tidak boleh kosong" required>
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
                        <input type="email" class="form-control" id="email_lp_pass" name="email" data-required-error="Data tidak boleh kosong" required>
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
                        <input type="nama_calon_karyawan" class="form-control" id="nama_calon_karyawan" name="nama_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="alamat_calon_karyawan">Alamat Lengkap</label>
                        <input type="alamat_calon_karyawan" class="form-control" id="alamat_calon_karyawan" name="alamat_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="kodepos_calon_karyawan">Kode pos</label>
                        <input type="kodepos_calon_karyawan" class="form-control" id="kodepos_calon_karyawan" name="kodepos_calon_karyawan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="telp_calon_karyawan">No telepon</label>
                        <input type="telp_calon_karyawan" class="form-control" id="telp_calon_karyawan" name="telp_calon_karyawan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="ttl_calon_karyawan">Tempat, tanggal lahir</label>
                        <input type="ttl_calon_karyawan" class="form-control" id="ttl_calon_karyawan" name="ttl_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>


                    <div class="form-group has-feedback">
                        <label for="status_pernikahan">Status Pernikahan</label>
                        <select data-required-error="Data tidak boleh kosong" required class="form-control" name="status_pernikahan" id="status_pernikahan">
                            <option value="">-Pilih Status Pernikahan-</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Belum menikah">Belum menikah</option>
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="status_pendidikan">Status Pendidikan</label>
                        <select data-required-error="Data tidak boleh kosong" required class="form-control" name="status_pendidikan" id="status_pendidikan">
                            <option value="">-Pilih Status Pendidikan-</option>
                            <option value="SMU/SMK/SMA">SMU/SMK/SMA</option>
                            <option value="D1">D1</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="agama">Agama</label>
                        <select data-required-error="Data tidak boleh kosong" required class="form-control" name="agama" id="agama">
                            <option value="">-Pilih Agama-</option>
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Khatolik">Khatolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Khonghucu">Khonghucu</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" data-minlength="8" data-minlength-error="Not long enough min length 8 character" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="retype-password">Retype Password</label>
                        <input type="password" class="form-control" id="retype-password" name="retype-password" data-match="#password" data-required-error="Data tidak boleh kosong" required>
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