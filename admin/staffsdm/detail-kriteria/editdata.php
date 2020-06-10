<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM kriteria_detail WHERE kode_kriteria = '$id'");

$getdata = mysqli_fetch_assoc($query);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_kriteria = htmlspecialchars($_POST['kode_kriteria']);
    $nama_kriteria = htmlspecialchars($_POST['nama_kriteria']);

    $sql = mysqli_query($koneksi, "UPDATE `kriteria_detail` SET `kode_kriteria` = '$kode_kriteria', `nama_kriteria` = '$nama_kriteria'  WHERE kode_kriteria = '$id'");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diperbaharui';
        $_SESSION['title'] = 'Data Kriteria';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diperbaharui';
        $_SESSION['title'] = 'Data Kriteria';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=detail-kriteria';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Edit Data Kriteria</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="kode_kriteria">Kode</label>
                    <input type="kode_kriteria" class="form-control" id="kode_kriteria" name="kode_kriteria" value="<?= $getdata['kode_kriteria'] ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="nama_kriteria">Nama</label>
                    <input type="nama_kriteria" class="form-control" id="nama_kriteria" name="nama_kriteria" value="<?= $getdata['nama_kriteria'] ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=detail-kriteria" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>