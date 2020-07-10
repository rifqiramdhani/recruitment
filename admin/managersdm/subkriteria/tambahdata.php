<?php

$id_lowongan = $_GET['penerimaan'];
$id_kriteria = $_GET['kriteria'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_subkriteria = $_POST['nama_subkriteria'];
    $bobot_subkriteria = $_POST['bobot_subkriteria'];

    $sql = mysqli_query($koneksi, "INSERT INTO `subkriteria_rekrutmen`(`id_kriteria_rekrutmen`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_kriteria','$nama_subkriteria','$bobot_subkriteria')");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil di tambahkan';
        $_SESSION['title'] = 'Data subkriteria';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal di tambahkan';
        $_SESSION['title'] = 'Data subkriteria';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=subkriteria&penerimaan=".$id_lowongan ."&kriteria=". $id_kriteria ."';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Subkriteria</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_subkriteria">Nama</label>
                    <input type="nama_subkriteria" class="form-control" id="nama_subkriteria" name="nama_subkriteria" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="bobot_subkriteria">Bobot</label>
                    <input type="bobot_subkriteria" class="form-control" id="bobot_subkriteria" name="bobot_subkriteria" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=subkriteria&penerimaan=<?= $id_lowongan ?>&kriteria=<?= $id_kriteria ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>