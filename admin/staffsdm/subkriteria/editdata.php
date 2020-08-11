<?php
$id = $_GET['id'];
$id_lowongan = $_GET['penerimaan'];
$id_kriteria = $_GET['kriteria'];

$query = mysqli_query($koneksi, "SELECT * FROM `subkriteria_rekrutmen` WHERE id_subkriteria_rekrutmen = '$id' AND id_kriteria_rekrutmen = '$id_kriteria'");

$getdata = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_subkriteria = htmlspecialchars($_POST['nama_subkriteria']);
    $bobot_subkriteria = htmlspecialchars($_POST['bobot_subkriteria']);

    $sql = mysqli_query($koneksi, "UPDATE `subkriteria_rekrutmen` SET `nama_subkriteria`='$nama_subkriteria',`bobot_subkriteria`='$bobot_subkriteria' WHERE id_subkriteria_rekrutmen = '$id'");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diperbaharui';
        $_SESSION['title'] = 'Data Subkriteria';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diperbaharui';
        $_SESSION['title'] = 'Data Subkriteria';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=subkriteria&penerimaan=" . $id_lowongan . "&kriteria=" . $id_kriteria . "';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Edit Data Subkriteria</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_subkriteria">Nama</label>
                    <input type="nama_subkriteria" class="form-control" id="nama_subkriteria" name="nama_subkriteria" value="<?= $getdata['nama_subkriteria'] ?>" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="bobot_subkriteria">Bobot</label>
                    <input type="bobot_subkriteria" class="form-control" id="bobot_subkriteria" name="bobot_subkriteria" value="<?= $getdata['bobot_subkriteria'] ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=subkriteria&penerimaan=<?= $id_lowongan ?>&kriteria=<?= $id_kriteria ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>