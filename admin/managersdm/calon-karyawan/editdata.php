<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM calon_karyawan WHERE id_calon_karyawan = '$id'");
$getdata = mysqli_fetch_assoc($query);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_calon_karyawan = htmlspecialchars($_POST['nama_calon_karyawan']);
    $alamat_calon_karyawan = htmlspecialchars($_POST['alamat_calon_karyawan']);
    $telp_calon_karyawan = htmlspecialchars($_POST['telp_calon_karyawan']);
    $ttl_calon_karyawan = htmlspecialchars($_POST['ttl_calon_karyawan']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(empty($password)){
        $sql = mysqli_query($koneksi, "UPDATE `calon_karyawan` SET `nama_calon_karyawan`='$nama_calon_karyawan',`email_calon_karyawan`='$email',`telp_calon_karyawan`='$telp_calon_karyawan',`ttl_calon_karyawan`='$ttl_calon_karyawan',`alamat_calon_karyawan`='$alamat_calon_karyawan' WHERE id_calon_karyawan = '$id'");
    }else{
        $encryptpass = password_hash($password, PASSWORD_DEFAULT);
        $sql = mysqli_query($koneksi, "UPDATE `calon_karyawan` SET `nama_calon_karyawan`='$nama_calon_karyawan',`email_calon_karyawan`='$email',`telp_calon_karyawan`='$telp_calon_karyawan',`ttl_calon_karyawan`='$ttl_calon_karyawan',
        `password_calon_karyawan`='$encryptpass',`alamat_calon_karyawan`='$alamat_calon_karyawan' WHERE id_calon_karyawan = '$id'");
    }

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil di perbaharui';
        $_SESSION['title'] = 'Data Calon karyawan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal di perbaharui';
        $_SESSION['title'] = 'Data Calon karyawan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=calon-karyawan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-8 col-md-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Calon Karyawan</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_calon_karyawan">Nama</label>
                    <input type="nama_calon_karyawan" class="form-control" id="nama_calon_karyawan" value="<?= $getdata['nama_calon_karyawan'] ?>" name="nama_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="alamat_calon_karyawan">Alamat</label>
                    <input type="alamat_calon_karyawan" class="form-control" id="alamat_calon_karyawan" value="<?= $getdata['alamat_calon_karyawan'] ?>" name="alamat_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="telp_calon_karyawan">No telepon</label>
                    <input type="telp_calon_karyawan" class="form-control" id="telp_calon_karyawan" value="<?= $getdata['telp_calon_karyawan'] ?>" name="telp_calon_karyawan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="ttl_calon_karyawan">Tempat, tanggal lahir</label>
                    <input type="ttl_calon_karyawan" class="form-control" id="ttl_calon_karyawan" value="<?= $getdata['ttl_calon_karyawan'] ?>" name="ttl_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>


                <div class="form-group has-feedback">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="<?= $getdata['email_calon_karyawan'] ?>" name="email" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Kosongkan jika tidak diubah" name="password" >
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=calon-karyawan" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>