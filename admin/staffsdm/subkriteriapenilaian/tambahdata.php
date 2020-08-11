<?php
$id_dt_krt_penilaian = $_GET['kriteria'];

$query = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` ORDER BY `detail_subkriteria_penilaian`.`id_dt_subkriteria_penilaian`  DESC LIMIT 1");

$getdata = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) > 0) {
    $result = $getdata['id_dt_subkriteria_penilaian'] + 1;
} else {
    $result = 1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_subkriteria_penilaian = $_POST['nama_subkriteria_penilaian'];

    $sql = mysqli_query($koneksi, "INSERT INTO `detail_subkriteria_penilaian`(`id_dt_subkriteria_penilaian`, `id_dt_krt_penilaian`, `nama_subkriteria_penilaian`) VALUES ('$result','$id_dt_krt_penilaian' , '$nama_subkriteria_penilaian')");

    $sql2 = mysqli_query($koneksi, "INSERT INTO `subkriteria_penilaian`(`id_skala_penilaian`, `id_dt_subkrt_penilaian_1`, `nilai_perbandingan`, `id_dt_subkrt_penilaian_2`) VALUES (9, '$result', 1 ,'$result')");


    if (isset($sql) & isset($sql2)) {
        if ($sql & $sql2) {

            $_SESSION['message'] = 'Data berhasil di tambahkan';
            $_SESSION['title'] = 'Data Subkriteria';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal di tambahkan';
            $_SESSION['title'] = 'Data Subkriteria';
            $_SESSION['type'] = 'error';
        }
    }

    // echo "<script>window.location.href = '?page=kriteriapenilaian&action=tambahdata';</script>";
}
?>

<!-- show sweet alert -->
<?php if (isset($_SESSION['message'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
<?php
    unset($_SESSION['message']);
    unset($_SESSION['title']);
    unset($_SESSION['type']);
endif;
?>
<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Subkriteria</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="kode_kriteria">Kode Kriteria</label>
                    <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" value="<?= $id_dt_krt_penilaian ?>" readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="nama_subkriteria_penilaian">Nama Subkriteria</label>
                    <input type="text" class="form-control" id="nama_subkriteria_penilaian" name="nama_subkriteria_penilaian" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=subkriteriapenilaian&kriteria=<?= $id_dt_krt_penilaian ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>