<?php
$query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan FROM `karyawan` JOIN jabatan ON id_jabatan_fore = id_jabatan");

$queryJabatan = mysqli_query($koneksi, "SELECT id_jabatan, nama_jabatan, nama_divisi FROM `jabatan` JOIN divisi USING(id_divisi)");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = htmlspecialchars($_POST['nik']);
    $nama_karyawan = htmlspecialchars($_POST['nama_karyawan']);
    $telp_karyawan = htmlspecialchars($_POST['telp_karyawan']);
    $ttl_karyawan = htmlspecialchars($_POST['ttl_karyawan']);
    $alamat_karyawan = htmlspecialchars($_POST['alamat_karyawan']);
    $jabatan = $_POST['jabatan']; //detail jabatan
    $date = date('Y-m-d');

    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);


    if(strlen($nik) <= 7){
        $queryJab = mysqli_query($koneksi, "SELECT * FROM `jabatan` WHERE id_jabatan = '$jabatan'");
        $getJab = mysqli_fetch_assoc($queryJab);
        $getJab['nama_jabatan'];


        if ($getJab['nama_jabatan'] == 'Karyawan Masa Percobaan') {
            $sql = mysqli_query($koneksi, "INSERT INTO `karyawan`(`id_jabatan`, `email_karyawan`, `password_karyawan`, `nama_karyawan`, `nik`, `telp_karyawan`, `ttl_karyawan`, `alamat_karyawan`, `tanggal_masuk`, `level`) VALUES ('$jabatan', '$email', '$password', '$nama_karyawan', '$nik' , '$telp_karyawan', '$ttl_karyawan', '$alamat_karyawan', '$date', 'karyawan')");

            $queryKaryawan = mysqli_query($koneksi, "SELECT * FROM `karyawan` ORDER BY id_karyawan DESC LIMIT 1");
            $getKaryawan = mysqli_fetch_assoc($queryKaryawan);
            $id_karyawan = $getKaryawan['id_karyawan'];

            mysqli_query($koneksi, "INSERT INTO `penilaian_kmp`(`id_karyawan`) VALUES ('$id_karyawan')");
        } else {
            $sql = mysqli_query($koneksi, "INSERT INTO `karyawan`(`id_jabatan`, `email_karyawan`, `password_karyawan`, `nama_karyawan`, `nik`, `telp_karyawan`, `ttl_karyawan`, `alamat_karyawan`, `tanggal_masuk`) VALUES ('$jabatan', '$email', '$password', '$nama_karyawan', '$nik' , '$telp_karyawan', '$ttl_karyawan', '$alamat_karyawan', '$date')");
        }

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil di tambahkan';
            $_SESSION['title'] = 'Data Karyawan';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal di tambahkan';
            $_SESSION['title'] = 'Data Karyawan';
            $_SESSION['type'] = 'error';
        }
    }else{
        $_SESSION['message'] = 'Data gagal di tambahkan';
        $_SESSION['title'] = 'Data Karyawan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=karyawan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Karyawan</strong></div>
        <div class="card-body">
            <form action="#" class="form-row" method="post" data-toggle="validator" role="form">

                <div class="col-6">
                    <div class="form-group has-feedback">
                        <label for="nik">NIK (Nomor Induk Karyawan)</label>
                        <input type="nik" class="form-control" id="nik" name="nik" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="nama_karyawan">Nama</label>
                        <input type="nama_karyawan" class="form-control" id="nama_karyawan" name="nama_karyawan"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="telp_karyawan">No Telepon</label>
                        <input type="telp_karyawan" class="form-control" id="telp_karyawan" name="telp_karyawan" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="ttl_karyawan">Tempat, Tanggal Lahir</label>
                        <input type="ttl_karyawan" class="form-control" id="ttl_karyawan" name="ttl_karyawan"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group has-feedback">
                        <label for="alamat_karyawan">Alamat</label>
                        <input type="alamat_karyawan" class="form-control" id="alamat_karyawan" name="alamat_karyawan"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>



                    <div class="form-group has-feedback">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control"   data-required-error="Data tidak boleh kosong" required>
                            <option value=""">-Pilih Jabatan-</option>
                                <?php while ($getjabatan = mysqli_fetch_assoc($queryJabatan)) : ?>
                                    <option value=" <?= $getjabatan['id_jabatan'] ?>"><?= $getjabatan['nama_jabatan'] . ' ' . $getjabatan['nama_divisi'] ?></option>
                        <?php endwhile ?>
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"   data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"   data-required-error="Data tidak boleh kosong" required>
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