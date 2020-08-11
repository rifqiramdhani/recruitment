<?php require('frontend/template/header.php') ?>
<?php require('frontend/template/top-section.php') ?>
<?php

if (($_SERVER['REQUEST_METHOD'] == "POST")) {
    $nama_calon_karyawan = htmlspecialchars($_POST['nama_calon_karyawan']);
    $alamat_calon_karyawan = htmlspecialchars($_POST['alamat_calon_karyawan']);
    $telp_calon_karyawan = htmlspecialchars($_POST['telp_calon_karyawan']);
    $ttl_calon_karyawan = htmlspecialchars($_POST['ttl_calon_karyawan']);

    $kodepos_calon_karyawan = htmlspecialchars($_POST['kodepos_calon_karyawan']);
    $status_pernikahan = htmlspecialchars($_POST['status_pernikahan']);
    $status_pendidikan = htmlspecialchars($_POST['status_pendidikan']);
    $agama = htmlspecialchars($_POST['agama']);

    $email = htmlspecialchars($_POST['email']);

    $sql = mysqli_query($koneksi, "UPDATE `calon_karyawan` SET `nama_calon_karyawan`='$nama_calon_karyawan',
    `telp_calon_karyawan`='$telp_calon_karyawan',
    `ttl_calon_karyawan`='$ttl_calon_karyawan',
    `alamat_calon_karyawan`='$alamat_calon_karyawan',
    `kodepos_calon_karyawan`='$kodepos_calon_karyawan',
    `status_pernikahan`='$status_pernikahan',
    `status_pendidikan`='$status_pendidikan',
    `agama`='$agama' WHERE `email_calon_karyawan` = '$email'");


    if ($sql) {
        $_SESSION['message'] = 'Profile Berhasil Diperbaharui';
        $_SESSION['title'] = 'Data Profile';
        $_SESSION['type'] = 'success';

    } else {
        $_SESSION['message'] = 'Profile Gagal Diperbaharui';
        $_SESSION['title'] = 'Data Profile';
        $_SESSION['type'] = 'error';
    }
}


$email = $_SESSION['email_calon_karyawan'];
$query = mysqli_query($koneksi, "SELECT * FROM calon_karyawan WHERE email_calon_karyawan = '$email'");
$getdata = mysqli_fetch_assoc($query);
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
    <li class="breadcrumb-item active"><span>My Profile</span></li>
</ol>
<section id="content-section">
    <div class="container">
        <div class="py-lg-5 py-3">
            <div class="row">
                <div class="col-12">
                    <div class="card work-info">
                        <div class="card-body detail-job">
                            <h4 class="card-title text-center mb-5">My Profile</h4>
                            <form action="#" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" readonly data-required-error="Data tidak boleh kosong" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="nama_calon_karyawan">Nama</label>
                                    <input type="nama_calon_karyawan" value="<?= $getdata['nama_calon_karyawan'] ?>" class="form-control" id="nama_calon_karyawan" name="nama_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="alamat_calon_karyawan">Alamat Lengkap</label>
                                    <input type="alamat_calon_karyawan" value="<?= $getdata['alamat_calon_karyawan'] ?>" class="form-control" id="alamat_calon_karyawan" name="alamat_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="kodepos_calon_karyawan">Kode pos</label>
                                    <input type="kodepos_calon_karyawan" value="<?= $getdata['kodepos_calon_karyawan'] ?>" class="form-control" id="kodepos_calon_karyawan" name="kodepos_calon_karyawan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="telp_calon_karyawan">No telepon</label>
                                    <input type="telp_calon_karyawan" value="<?= $getdata['telp_calon_karyawan'] ?>" class="form-control" id="telp_calon_karyawan" name="telp_calon_karyawan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="ttl_calon_karyawan">Tempat, tanggal lahir</label>
                                    <input type="ttl_calon_karyawan" value="<?= $getdata['ttl_calon_karyawan'] ?>" class="form-control" id="ttl_calon_karyawan" name="ttl_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>


                                <div class="form-group has-feedback">
                                    <label for="status_pernikahan">Status Pernikahan</label>
                                    <select data-required-error="Data tidak boleh kosong" required class="form-control" name="status_pernikahan" id="status_pernikahan">
                                        <option value="">-Pilih Status Pernikahan-</option>
                                        <option value="Menikah" <?php if ($getdata['status_pernikahan'] == 'Menikah') echo 'selected' ?>>Menikah</option>
                                        <option value="Belum menikah" <?php if ($getdata['status_pernikahan'] == 'Belum menikah') echo 'selected' ?>>Belum menikah</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="status_pendidikan">Status Pendidikan</label>
                                    <select data-required-error="Data tidak boleh kosong" required class="form-control" name="status_pendidikan" id="status_pendidikan">
                                        <option value="">-Pilih Status Pendidikan-</option>
                                        <option value="SMU/SMK/SMA" <?php if ($getdata['status_pendidikan'] == 'SMU/SMK/SMA') echo 'selected' ?>>SMU/SMK/SMA</option>
                                        <option value="D1" <?php if ($getdata['status_pendidikan'] == 'D1') echo 'selected' ?>>D1</option>
                                        <option value="D3" <?php if ($getdata['status_pendidikan'] == 'D3') echo 'selected' ?>>D3</option>
                                        <option value="S1" <?php if ($getdata['status_pendidikan'] == 'S1') echo 'selected' ?>>S1</option>
                                        <option value="S2" <?php if ($getdata['status_pendidikan'] == 'S2') echo 'selected' ?>>S2</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="agama">Agama</label>
                                    <select data-required-error="Data tidak boleh kosong" required class="form-control" name="agama" id="agama">
                                        <option value="">-Pilih Agama-</option>
                                        <option value="Islam" <?php if ($getdata['agama'] == 'Islam') echo 'selected' ?>>Islam</option>
                                        <option value="Protestan" <?php if ($getdata['agama'] == 'Protestan') echo 'selected' ?>>Protestan</option>
                                        <option value="Khatolik" <?php if ($getdata['agama'] == 'Khatolik') echo 'selected' ?>>Khatolik</option>
                                        <option value="Hindu" <?php if ($getdata['agama'] == 'Hindu') echo 'selected' ?>>Hindu</option>
                                        <option value="Buddha" <?php if ($getdata['agama'] == 'Buddha') echo 'selected' ?>>Buddha</option>
                                        <option value="Khonghucu" <?php if ($getdata['agama'] == 'Khonghucu') echo 'selected' ?>>Khonghucu</option>
                                        <option value="Lainnya" <?php if ($getdata['agama'] == 'Lainnya') echo 'selected' ?>>Lainnya</option>
                                    </select>
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