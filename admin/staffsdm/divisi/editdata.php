<?php
$id_divisi = $_GET['divisi'];
$query = mysqli_query($koneksi, "SELECT * FROM divisi WHERE id_divisi = '$id_divisi'");
$getdata = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_divisi = ucfirst($_POST['nama_divisi']);

    $queryCek = mysqli_query($koneksi, "SELECT * FROM `divisi` WHERE nama_divisi = '$nama_divisi'");

    if (mysqli_num_rows($queryCek) == 0) {
        $sql = mysqli_query($koneksi, "UPDATE `divisi` SET `nama_divisi` =  '$nama_divisi' WHERE id_divisi = '$id_divisi'");

        if (isset($sql)) {
            if ($sql) {
                $_SESSION['message'] = 'Data berhasil diperbaharui';
                $_SESSION['title'] = 'Data Divisi';
                $_SESSION['type'] = 'success';
            } else {
                $_SESSION['message'] = 'Data gagal diperbaharui';
                $_SESSION['title'] = 'Data Divisi';
                $_SESSION['type'] = 'error';
            }
        }
    }else{
        $_SESSION['message'] = 'Data sudah ada, gagal menambahkan data';
        $_SESSION['title'] = 'Data Divisi';
        $_SESSION['type'] = 'error';
    }

    

    echo "<script>window.location.href = '?page=divisi';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah data Divisi</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_divisi">Nama Divisi</label>
                    <input type="text" id="nama_divisi" value="<?= $getdata['nama_divisi'] ?>" name="nama_divisi" class="form-control" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=divisi" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>