<?php
$id = $_GET['id'];
$kriteria = $_GET['kriteria'];

$query = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_subkriteria_penilaian = '$id'");

$getdata = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_subkriteria_penilaian = htmlspecialchars($_POST['nama_subkriteria_penilaian']);
    $nilai_prioritas_subkriteria = htmlspecialchars($_POST['nilai_prioritas_subkriteria']);

    $queryCek = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE nama_subkriteria_penilaian = '$nama_subkriteria_penilaian' AND id_dt_krt_penilaian = '$id_dt_krt_penilaian'");

    if (mysqli_num_rows($queryCek) == 0) {
        $sql = mysqli_query($koneksi, "UPDATE `detail_subkriteria_penilaian` SET `nama_subkriteria_penilaian` = '$nama_subkriteria_penilaian', `nilai_prioritas_subkriteria` = '$nilai_prioritas_subkriteria' WHERE `detail_subkriteria_penilaian`.`id_dt_subkriteria_penilaian` = '$id'");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil diperbaharui';
            $_SESSION['title'] = 'Data Subkriteria';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal diperbaharui';
            $_SESSION['title'] = 'Data Subkriteria';
            $_SESSION['type'] = 'error';
        }
    } else {
        $_SESSION['message'] = 'Data sudah ada, data gagal di diperbaharui';
        $_SESSION['title'] = 'Data Subkriteria';
        $_SESSION['type'] = 'error';
    }

    

    echo "<script>window.location.href = '?page=subkriteriapenilaian&kriteria=" . $kriteria . "';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah data Subkriteria</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_subkriteria_penilaian">Nama</label>
                    <input type="text" class="form-control" id="nama_subkriteria_penilaian" name="nama_subkriteria_penilaian" pattern="([^\s][A-zÀ-ž\s]+)" data-pattern-error="Data hanya boleh huruf saja" value="<?= $getdata['nama_subkriteria_penilaian'] ?>" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="nilai_prioritas_subkriteria">Nilai Prioritas</label>
                    <input type="text" class="form-control" id="nilai_prioritas_subkriteria" name="nilai_prioritas_subkriteria" value="<?= $getdata['nilai_prioritas_subkriteria'] ?>" pattern="^\d*(\.\d{0,2})?$" data-pattern-error="Data hanya boleh angka saja" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=subkriteriapenilaian&kriteria=<?= $kriteria ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>