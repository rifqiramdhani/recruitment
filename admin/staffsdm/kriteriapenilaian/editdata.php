<?php

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM detail_kriteria_penilaian WHERE id_dt_kriteria_penilaian = '$id'");

$getdata = mysqli_fetch_assoc($query);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kriteria_penilaian = $_POST['nama_kriteria_penilaian'];

    $sql = mysqli_query($koneksi, "UPDATE `detail_kriteria_penilaian` SET `nama_kriteria_penilaian`='$nama_kriteria_penilaian' WHERE `id_dt_kriteria_penilaian` = '$id'");


    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diperbaharui';
        $_SESSION['title'] = 'Data Kriteria';
        $_SESSION['type'] = 'success';
    }else{
        $_SESSION['message'] = 'Data berhasil diperbaharui';
        $_SESSION['title'] = 'Data Kriteria';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=kriteriapenilaian';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah data Kriteria</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="kode_kriteria_fore">Kode Kriteria</label>
                    <input type="text" class="form-control" name="id_dt_kriteria_penilaian" value="<?= $getdata['id_dt_kriteria_penilaian'] ?>" readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="nama_kriteria_penilaian">Nama Kriteria</label>
                    <input type="text" class="form-control" id="nama_kriteria_penilaian" name="nama_kriteria_penilaian" value="<?= $getdata['nama_kriteria_penilaian'] ?>" data-required-error="Data tidak boleh kosong" required>
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