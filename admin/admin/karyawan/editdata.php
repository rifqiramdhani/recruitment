<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan, nama_divisi FROM `karyawan` JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi) WHERE id_karyawan = '$id'");

$getdata = mysqli_fetch_assoc($query);

$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan` JOIN divisi USING(id_divisi)");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = htmlspecialchars($_POST['nik']);
    $nama_karyawan = htmlspecialchars($_POST['nama_karyawan']);
    $telp_karyawan = htmlspecialchars($_POST['telp_karyawan']);
    $ttl_karyawan = htmlspecialchars($_POST['ttl_karyawan']);
    $alamat_karyawan = htmlspecialchars($_POST['alamat_karyawan']);
    $jabatan = htmlspecialchars($_POST['jabatan']); //Karyawan Masa Percobaan
    $email_karyawan = htmlspecialchars($_POST['email_karyawan']);
    $password_karyawan = htmlspecialchars($_POST['password_karyawan']);

    if (empty($password_karyawan)) {
        $sql = mysqli_query($koneksi, "UPDATE `karyawan` SET 
        `id_jabatan`='$jabatan',
        `email_karyawan`='$email_karyawan',
        `nama_karyawan`='$nama_karyawan',
        `nik`='$nik',
        `telp_karyawan`='$telp_karyawan',
        `ttl_karyawan`='$ttl_karyawan',
        `alamat_karyawan`='$alamat_karyawan'
        WHERE id_karyawan = '$id'");
    } else {
        $encryptpass = password_hash($password_karyawan, PASSWORD_DEFAULT);
        $sql = mysqli_query($koneksi, "UPDATE `karyawan` SET 
        `id_jabatan`='$jabatan',
        `email_karyawan`='$email_karyawan',
        `nama_karyawan`='$nama_karyawan',
        `nik`='$nik',
        `telp_karyawan`='$telp_karyawan',
        `ttl_karyawan`='$ttl_karyawan',
        `alamat_karyawan`='$alamat_karyawan',
        `password_karyawan`='$encryptpass'
        WHERE id_karyawan = '$id'");
    }

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diperbaharui';
        $_SESSION['title'] = 'Data Karyawan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diperbaharui';
        $_SESSION['title'] = 'Data Karyawan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=karyawan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah data Karyawan</strong></div>
        <div class="card-body">
            <form action="#" class="form-row" method="post" data-toggle="validator" role="form">

                <div class="col-6">
                    <div class="form-group has-feedback">
                        <label for="nik">NIK (Nomor Induk Karyawan)</label>
                        <input type="nik" class="form-control" value="<?= $getdata['nik'] ?>" id="nik" name="nik" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="nama_karyawan">Nama</label>
                        <input type="nama_karyawan" class="form-control" value="<?= $getdata['nama_karyawan'] ?>" id="nama_karyawan" name="nama_karyawan"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="telp_karyawan">No Telepon</label>
                        <input type="telp_karyawan" class="form-control" value="<?= $getdata['telp_karyawan'] ?>" id="telp_karyawan" name="telp_karyawan" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="ttl_karyawan">Tempat, Tanggal Lahir</label>
                        <input type="ttl_karyawan" class="form-control" value="<?= $getdata['ttl_karyawan'] ?>" id="ttl_karyawan" name="ttl_karyawan"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group has-feedback">
                        <label for="alamat_karyawan">Alamat</label>
                        <input type="alamat_karyawan" class="form-control" value="<?= $getdata['alamat_karyawan'] ?>" id="alamat_karyawan" name="alamat_karyawan"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control"   data-required-error="Data tidak boleh kosong" required>
                            <option value=""">-Pilih Jabatan-</option>
                                <?php while ($getjabatan = mysqli_fetch_assoc($queryJabatan)) : ?>
                                    <option value=" <?= $getjabatan['id_jabatan'] ?>" <?php if($getdata['id_jabatan'] == $getjabatan['id_jabatan'])echo 'selected' ?>><?= $getjabatan['nama_jabatan'] . ' ' . $getjabatan['nama_divisi'] ?></option>
                        <?php endwhile ?>
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="email_karyawan">Email</label>
                        <input type="email_karyawan" class="form-control" value="<?= $getdata['email_karyawan'] ?>" id="email_karyawan" name="email_karyawan"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="password_karyawan">Password</label>
                        <input type="password" class="form-control" placeholder="Kosongkan jika tidak diubah" id="password_karyawan" name="password_karyawan">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=karyawan' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>