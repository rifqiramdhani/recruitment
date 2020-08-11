<?php

$query = mysqli_query($koneksi, "SELECT * FROM detail_kriteria_penilaian ORDER BY id_dt_kriteria_penilaian DESC LIMIT 1");

$getdata = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) > 0) {
    $pcs = explode("C", $getdata['id_dt_kriteria_penilaian']);
    $result = "C" . ($pcs[1] + 1);
} else {
    $result = "C1";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_dt_kriteria_penilaian = $_POST['id_dt_kriteria_penilaian'];
    $nama_kriteria_penilaian = $_POST['nama_kriteria_penilaian'];

    $sql = mysqli_query($koneksi, "INSERT INTO `detail_kriteria_penilaian`(`id_dt_kriteria_penilaian`, `nama_kriteria_penilaian`) VALUES ('$id_dt_kriteria_penilaian','$nama_kriteria_penilaian')");

    $sql2 = mysqli_query($koneksi, "INSERT INTO `kriteria_penilaian`(`id_skala_penilaian`, `id_dt_krt_penilaian_1`, `nilai_perbandingan`, `id_dt_krt_penilaian_2`) VALUES (9, '$id_dt_kriteria_penilaian', 1 ,'$id_dt_kriteria_penilaian')");


    if (isset($sql) & isset($sql2)) {
        if ($sql & $sql2) {
            $query = mysqli_query($koneksi, "SELECT * FROM detail_kriteria_penilaian ORDER BY id_dt_kriteria_penilaian DESC LIMIT 1");

            $getdata = mysqli_fetch_assoc($query);

            if (mysqli_num_rows($query) > 0) {
                $pcs = explode("C", $getdata['id_dt_kriteria_penilaian']);
                $result = "C" . ($pcs[1] + 1);
            } else {
                $result = "C1";
            }
            
            $_SESSION['message'] = 'Data berhasil di tambahkan';
            $_SESSION['title'] = 'Data Kriteria';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal di tambahkan';
            $_SESSION['title'] = 'Data Kriteria';
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
        <div class="card-header"><strong>Tambah Data Kriteria</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="kode_kriteria_fore">Kode Kriteria</label>
                    <input type="text" class="form-control" name="id_dt_kriteria_penilaian" value="<?= $result ?>" readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="nama_kriteria_penilaian">Nama Kriteria</label>
                    <input type="text" class="form-control" id="nama_kriteria_penilaian" name="nama_kriteria_penilaian" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=kriteriapenilaian" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>