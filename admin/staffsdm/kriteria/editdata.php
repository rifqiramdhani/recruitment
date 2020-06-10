<?php
$id = $_GET['id'];
$id_lowongan = $_GET['penerimaan'];

$query = mysqli_query($koneksi, "SELECT kriteria.*, nama_kriteria FROM `kriteria` JOIN kriteria_detail ON kode_kriteria_fore = kode_kriteria WHERE id_kriteria = '$id' AND id_lowongan_fore = '$id_lowongan'");

$getdata = mysqli_fetch_assoc($query);

$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bobot_kriteria = htmlspecialchars($_POST['bobot_kriteria']);

    $sql = mysqli_query($koneksi, "UPDATE `kriteria` SET `bobot_kriteria` = '$bobot_kriteria' WHERE id_kriteria = '$id'");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diperbaharui';
        $_SESSION['title'] = 'Data Kriteria';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diperbaharui';
        $_SESSION['title'] = 'Data Kriteria';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=kriteria&penerimaan=" . $id_lowongan . "';</script>";
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
                    <input type="kode_kriteria" class="form-control" id="kode_kriteria" name="kode_kriteria" value="<?= $getdata['kode_kriteria_fore'] ?>" required readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="nama_kriteria">Nama</label>
                    <input type="nama_kriteria" class="form-control" id="nama_kriteria" name="nama_kriteria" value="<?= $getdata['nama_kriteria'] ?>" required readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="bobot_kriteria">Bobot</label>
                    <input type="bobot_kriteria" class="form-control" id="bobot_kriteria" name="bobot_kriteria" value="<?= $getdata['bobot_kriteria'] ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=kriteria&penerimaan=<?= $id_lowongan ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>