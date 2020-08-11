<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_kriteria = strtoupper($_POST['kode_kriteria']);
    $nama_kriteria = ucfirst($_POST['nama_kriteria']);

    

    $queryCek = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_rekrutmen` WHERE nama_kriteria_rekrutmen = '$nama_kriteria'");

    if(mysqli_num_rows($queryCek) == 0){
        $sql = mysqli_query($koneksi, "INSERT INTO `detail_kriteria_rekrutmen`(`id_dt_krt_rekt`, `nama_kriteria_rekrutmen`) VALUES ('$kode_kriteria','$nama_kriteria')");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil di tambahkan';
            $_SESSION['title'] = 'Data Detail Kriteria';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal di tambahkan';
            $_SESSION['title'] = 'Data Detail Kriteria';
            $_SESSION['type'] = 'error';
        }
    }else{
        $_SESSION['message'] = 'Nama sudah ada, data gagal ditambahkan';
        $_SESSION['title'] = 'Data Detail Kriteria';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=detail-kriteria';</script>";
}
?>

<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Detail Kriteria</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="kode_kriteria">Kode</label>
                    <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="nama_kriteria">Nama</label>
                    <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=detail-kriteria" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>