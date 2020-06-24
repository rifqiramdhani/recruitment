<?php
$query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan FROM `karyawan` JOIN jabatan ON id_jabatan_fore = id_jabatan");


$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_recruitment = htmlspecialchars($_POST['nama_recruitment']);
    $gaji_recruitment = htmlspecialchars($_POST['gaji_recruitment']);
    $waktu_recruitment = htmlspecialchars($_POST['waktu_recruitment']);

    $sql = mysqli_query($koneksi, "INSERT INTO `rekrutmen`(`nama_rekrutmen`, `gaji_rekrutmen`, `waktu_rekrutmen`) VALUES ('$nama_recruitment', '$gaji_recruitment', '$waktu_recruitment')");

    $kriteria = mysqli_query($koneksi, "SELECT * FROM `kriteria_rekrutmen` LIMIT 11");

    $subkriteria = mysqli_query($koneksi, "SELECT * FROM `subkriteria_rekrutmen` LIMIT 18");

    $recruitment = mysqli_query($koneksi, "SELECT id_rekrutmen FROM `rekrutmen` ORDER BY id_rekrutmen DESC LIMIT 1");

    $getrecruitment = mysqli_fetch_assoc($recruitment);
    //id baru recruitment
    $newid_recruitment = $getrecruitment['id_rekrutmen'];


    //insert ke table desk_recruitment
    mysqli_query($koneksi, "INSERT INTO `desk_rekrutmen`(`id_rekrutmen`, `tipe`) VALUES ('$newid_recruitment', 'deskripsi')");

    //insert ke table kriteria dengan id recruitment baru
    while ($getkriteria = mysqli_fetch_assoc($kriteria)) {
        $kode_kriteria = $getkriteria['id_dt_krt_rekt'];
        $bobot_kriteria = $getkriteria['bobot_kriteria'];

        mysqli_query($koneksi, "INSERT INTO `kriteria_rekrutmen`(`id_rekrutmen`, `id_dt_krt_rekt`, `bobot_kriteria`) VALUES ('$newid_recruitment', '$kode_kriteria', '$bobot_kriteria')");
    }

    //id baru kriteria
    $newkriteria = mysqli_query($koneksi, "SELECT * FROM `kriteria_rekrutmen` WHERE id_rekrutmen = '$newid_recruitment'");

    //insert ke table subkriteria
    $plus = 1;
    while ($getnewkriteria = mysqli_fetch_assoc($newkriteria)) {
        if ($plus == 1) {
            $id_pendidikan = $getnewkriteria['id_krt_rekt'];
        } else if ($plus == 2) {
            $id_pengalamankerja = $getnewkriteria['id_krt_rekt'];
        } else if ($plus == 3) {
            $id_status = $getnewkriteria['id_krt_rekt'];
        } else if ($plus == 4) {
            $id_usia = $getnewkriteria['id_krt_rekt'];
        } else if ($plus == 11) {
            $id_kesehatan = $getnewkriteria['id_krt_rekt'];
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
            mysqli_query($koneksi, "INSERT INTO `subkriteria_rekrutmen`(`id_kriteria_rekrutmen`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_pendidikan', '$nama_subkriteria', '$bobot_subkriteria')");
        } else if ($counter < 9) {
            // echo $nama_subkriteria. '<br>';
            //pengalaman kerja
            mysqli_query($koneksi, "INSERT INTO `subkriteria_rekrutmen`(`id_kriteria_rekrutmen`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_pengalamankerja', '$nama_subkriteria', '$bobot_subkriteria')");
        } else if ($counter < 11) {
            // echo $nama_subkriteria. '<br>';
            //status
            mysqli_query($koneksi, "INSERT INTO `subkriteria_rekrutmen`(`id_kriteria_rekrutmen`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_status', '$nama_subkriteria', '$bobot_subkriteria')");
        } else if ($counter < 16) {
            // echo $nama_subkriteria. '<br>';
            //usia
            mysqli_query($koneksi, "INSERT INTO `subkriteria_rekrutmen`(`id_kriteria_rekrutmen`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_usia', '$nama_subkriteria', '$bobot_subkriteria')");
        } else if ($counter < 18) {
            // echo $nama_subkriteria. '<br>';
            //kesehatan
            mysqli_query($koneksi, "INSERT INTO `subkriteria_rekrutmen`(`id_kriteria_rekrutmen`, `nama_subkriteria`, `bobot_subkriteria`) VALUES ('$id_kesehatan', '$nama_subkriteria', '$bobot_subkriteria')");
        }

        $counter++;
    }

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil di tambahkan';
        $_SESSION['title'] = 'Data Rekrutmen';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal di tambahkan';
        $_SESSION['title'] = 'Data Rekrutmen';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=penerimaan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Rekrutmen</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_recruitment">Nama</label>
                    <input type="nama_recruitment" class="form-control" id="nama_recruitment" name="nama_recruitment" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="gaji_recruitment">Gaji</label>
                    <input type="gaji_recruitment" class="form-control" id="gaji_recruitment" name="gaji_recruitment" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="waktu_recruitment">Waktu</label>
                    <select class="form-control" name="waktu_recruitment" id="waktu_recruitment" required>
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