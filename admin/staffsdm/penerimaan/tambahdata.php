<?php
$query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan FROM `karyawan` JOIN jabatan ON id_jabatan_fore = id_jabatan");


$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lowongan = htmlspecialchars($_POST['nama_lowongan']);
    $gaji_lowongan = htmlspecialchars($_POST['gaji_lowongan']);
    $waktu_lowongan = htmlspecialchars($_POST['waktu_lowongan']);

    $sql = mysqli_query($koneksi, "INSERT INTO `lowongan`(`nama_lowongan`, `gaji_lowongan`, `waktu_lowongan`) VALUES ('$nama_lowongan', '$gaji_lowongan', '$waktu_lowongan')");

    $kriteria = mysqli_query($koneksi, "SELECT * FROM `kriteria` LIMIT 11");
    $subkriteria = mysqli_query($koneksi, "SELECT * FROM `subkriteria` LIMIT 18");
    $lowongan = mysqli_query($koneksi, "SELECT id_lowongan FROM `lowongan` ORDER BY id_lowongan DESC LIMIT 1");

    $getlowongan = mysqli_fetch_assoc($lowongan);
    $newid_lowongan = $getlowongan['id_lowongan'] ;

    
    while($getkriteria = mysqli_fetch_assoc($kriteria)){
        $kode_kriteria = $getkriteria['kode_kriteria_fore'];
        $bobot_kriteria = $getkriteria['bobot_kriteria'];

        mysqli_query($koneksi, "INSERT INTO `kriteria`(`id_lowongan_fore`, `kode_kriteria_fore`, `bobot_kriteria`) VALUES ('$newid_lowongan', '$kode_kriteria', '$bobot_kriteria')");
    }
    
    $newkriteria = mysqli_query($koneksi, "SELECT * FROM `kriteria` WHERE id_lowongan_fore = '$newid_lowongan'");

    $plus = 1;
    while ($getnewkriteria = mysqli_fetch_assoc($newkriteria)) {
        if ($plus == 1) {
            $id_pendidikan = $getnewkriteria['id_kriteria'];
        } else if ($plus == 2) {
            $id_pengalamankerja = $getnewkriteria['id_kriteria'];
        } else if ($plus == 3) {
            $id_status = $getnewkriteria['id_kriteria'];
        } else if ($plus == 4) {
            $id_usia = $getnewkriteria['id_kriteria'];
        } else if ($plus == 11) {
            $id_kesehatan = $getnewkriteria['id_kriteria'];
        }
        $plus++;
    }

    $counter = 0;
    while ($getsubkriteria = mysqli_fetch_assoc($subkriteria)) {
        $nama_subkriteria = $getsubkriteria['nama_subkriteria'];
        $bobot_subkriteria = $getsubkriteria['bobot_subkriteria'];

        if ($counter < 5) {
            // echo $nama_subkriteria. '<br>';
            //tingkat pendidikan
            mysqli_query($koneksi, "INSERT INTO `subkriteria`(`id_kriteria_fore`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_pendidikan', '$nama_subkriteria', '$bobot_subkriteria')");
        } else if ($counter < 9) {
            // echo $nama_subkriteria. '<br>';
            //pengalaman kerja
            mysqli_query($koneksi, "INSERT INTO `subkriteria`(`id_kriteria_fore`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_pengalamankerja', '$nama_subkriteria', '$bobot_subkriteria')");
        } else if ($counter < 11) {
            // echo $nama_subkriteria. '<br>';
            //status
            mysqli_query($koneksi, "INSERT INTO `subkriteria`(`id_kriteria_fore`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_status', '$nama_subkriteria', '$bobot_subkriteria')");
        } else if ($counter < 16) {
            // echo $nama_subkriteria. '<br>';
            //usia
            mysqli_query($koneksi, "INSERT INTO `subkriteria`(`id_kriteria_fore`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_usia', '$nama_subkriteria', '$bobot_subkriteria')");
        } else if ($counter < 18) {
            // echo $nama_subkriteria. '<br>';
            //kesehatan
            mysqli_query($koneksi, "INSERT INTO `subkriteria`(`id_kriteria_fore`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_kesehatan', '$nama_subkriteria', '$bobot_subkriteria')");
        }

        $counter++;
    }

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil di tambahkan';
        $_SESSION['title'] = 'Data Penerimaan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal di tambahkan';
        $_SESSION['title'] = 'Data Penerimaan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=penerimaan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Penerimaan</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_lowongan">Nama</label>
                    <input type="nama_lowongan" class="form-control" id="nama_lowongan" name="nama_lowongan" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="gaji_lowongan">Gaji</label>
                    <input type="gaji_lowongan" class="form-control" id="gaji_lowongan" name="gaji_lowongan" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="waktu_lowongan">Waktu</label>
                    <select class="form-control" name="waktu_lowongan" id="waktu_lowogan" required>
                        <option value="">-Pilih Waktu</option>
                        <option value="FULL TIME">Full Time</option>
                        <option value="PART TIME">Part Time</option>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=penerimaan' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>