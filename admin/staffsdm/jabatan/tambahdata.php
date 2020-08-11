<?php
$queryDivisi = mysqli_query($koneksi, "SELECT * FROM divisi");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jabatan = $_POST['jabatan'];
    $divisi = $_POST['divisi'];
    $jumlah_jabatan = $_POST['jumlah_jabatan'];

    $queryCek = mysqli_query($koneksi, "SELECT * FROM `jabatan` WHERE nama_jabatan = '$jabatan' AND id_divisi = $divisi");

    if (mysqli_num_rows($queryCek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO `jabatan`(`nama_jabatan`, `id_divisi`, `jumlah_jabatan`) VALUES ('$jabatan','$divisi','$jumlah_jabatan')");


        if (isset($sql)) {
            if ($sql) {
                $_SESSION['message'] = 'Data berhasil di tambahkan';
                $_SESSION['title'] = 'Data Jabatan';
                $_SESSION['type'] = 'success';
            } else {
                $_SESSION['message'] = 'Data gagal di tambahkan';
                $_SESSION['title'] = 'Data Jabatan';
                $_SESSION['type'] = 'error';
            }
        }
    } else {
        $_SESSION['message'] = 'Data jabatan sudah ada';
        $_SESSION['title'] = 'Data Jabatan';
        $_SESSION['type'] = 'error';
    }



    echo "<script>window.location.href = '?page=jabatan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Jabatan</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control" pattern="^[_A-z]{1,}$" data-pattern-error="Data hanya boleh huruf saja">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="divisi">Divisi</label>
                    <select name="divisi" id="divisi" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Divisi-</option>
                        <?php while ($getdivisi = mysqli_fetch_assoc($queryDivisi)) : ?>
                            <option value="<?= $getdivisi['id_divisi'] ?>"><?= $getdivisi['nama_divisi'] ?></option>
                        <?php endwhile ?>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="jumlah_jabatan">Jumlah Jabatan</label>
                    <input type="text" id="jumlah_jabatan" name="jumlah_jabatan" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=jabatan" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>