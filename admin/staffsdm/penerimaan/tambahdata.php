<?php
$query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan FROM `karyawan` JOIN jabatan ON id_jabatan_fore = id_jabatan");
$queryFpkb = mysqli_query($koneksi, "SELECT * FROM fpkb WHERE status_fpkb = 3");

$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_fpkb = htmlspecialchars($_POST['id_fpkb']);
    // $gaji_recruitment = htmlspecialchars($_POST['gaji_recruitment']);
    // $waktu_recruitment = htmlspecialchars($_POST['waktu_recruitment']);
    $tanggal_buka = htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_buka'])));
    $tanggal_tutup = htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_tutup'])));

    if (strtotime($tanggal_buka) < strtotime($tanggal_tutup)) {
        $queryPosisiFpkb = mysqli_query($koneksi, "SELECT * FROM fpkb WHERE id_fpkb = '$id_fpkb'");
        $getPosisiFpkb = mysqli_fetch_assoc($queryPosisiFpkb);
        $nama_recruitment = $getPosisiFpkb['posisi_dibutuhkan'];
        $jumlah_dibutuhkan = $getPosisiFpkb['jumlah_dibutuhkan'];

        $queryDivisi = mysqli_query($koneksi, "SELECT jabatan.* FROM `fpkb` JOIN jabatan USING(id_jabatan) WHERE id_fpkb = '$id_fpkb'");
        $getDivisi = mysqli_fetch_assoc($queryDivisi);
        $id_divisi  = $getDivisi['id_divisi'];

        $queryCekJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan` WHERE nama_jabatan = 'Karyawan Masa Percobaan' AND id_divisi = '$id_divisi'");

        if (mysqli_num_rows($queryCekJabatan) == 0) {
            mysqli_query($koneksi, "INSERT INTO `jabatan`(`nama_jabatan`, `id_divisi`, `jumlah_jabatan`, `status_jabatan`) VALUES ('Karyawan Masa Percobaan','$id_divisi',0,1)");
        }

        $sql = mysqli_query($koneksi, "INSERT INTO `rekrutmen`(`id_fpkb`,`nama_rekrutmen`, `tanggal_buka`, `tanggal_tutup`) VALUES ('$id_fpkb','$nama_recruitment', '$tanggal_buka', '$tanggal_tutup')");

        $kriteria = mysqli_query($koneksi, "SELECT * FROM `kriteria_rekrutmen` ORDER BY id_krt_rekt ASC LIMIT 11");

        $subkriteria = mysqli_query($koneksi, "SELECT * FROM `subkriteria_rekrutmen` LIMIT 18");

        $recruitment = mysqli_query($koneksi, "SELECT id_rekrutmen FROM `rekrutmen` ORDER BY id_rekrutmen DESC LIMIT 1");

        $getrecruitment = mysqli_fetch_assoc($recruitment);
        //id baru recruitment
        $newid_recruitment = $getrecruitment['id_rekrutmen'];


        //insert ke table desk_recruitment
        $pendidikan_formal = $getPosisiFpkb['pendidikan_formal'];
        $pengalaman = $getPosisiFpkb['pengalaman'];
        $kompetensi = $getPosisiFpkb['kompetensi'];
        $usia = $getPosisiFpkb['usia'];
        $job_desc = $getPosisiFpkb['job_desc'];

        mysqli_query($koneksi, "INSERT INTO `desk_rekrutmen`(`id_rekrutmen`, `deskripsi` , `tipe`) VALUES ('$newid_recruitment', '$job_desc', 'deskripsi')");

        mysqli_query($koneksi, "INSERT INTO `desk_rekrutmen`(`id_rekrutmen`, `deskripsi` , `tipe`) VALUES ('$newid_recruitment', '$pendidikan_formal', 'persyaratan')");
        mysqli_query($koneksi, "INSERT INTO `desk_rekrutmen`(`id_rekrutmen`, `deskripsi` , `tipe`) VALUES ('$newid_recruitment', '$pengalaman', 'persyaratan')");
        mysqli_query($koneksi, "INSERT INTO `desk_rekrutmen`(`id_rekrutmen`, `deskripsi` , `tipe`) VALUES ('$newid_recruitment', '$kompetensi', 'persyaratan')");
        mysqli_query($koneksi, "INSERT INTO `desk_rekrutmen`(`id_rekrutmen`, `deskripsi` , `tipe`) VALUES ('$newid_recruitment', '$usia', 'persyaratan')");




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
                    <label for="id_fpkb">Nama</label>
                    <select name="id_fpkb" id="id_fpkb" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih nama-</option>
                        <?php
                        while ($getFpkb = mysqli_fetch_assoc($queryFpkb)) :
                            $id_fpkb = $getFpkb['id_fpkb'];
                            $querycek = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE id_fpkb = '$id_fpkb' AND status_rekrutmen = 1");

                            if (mysqli_num_rows($querycek) == 0) :
                        ?>
                                <option value="<?= $getFpkb['id_fpkb'] ?>"><?= $getFpkb['posisi_dibutuhkan'] ?></option>
                        <?php endif;
                        endwhile ?>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback" id="tanggal_buka">
                    <label for="open_date">Tanggal Buka</label>
                    <div class="input-group date mb-3">
                        <input type="text" class="form-control" name="tanggal_buka" id="open_date" onkeypress="return false" data-required-error="Data tidak boleh kosong" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback" id="tanggal_tutup">
                    <label for="close_date">Tanggal Tutup</label>
                    <div class="input-group date mb-3">
                        <input type="text" class="form-control" name="tanggal_tutup" id="close_date" onkeypress="return false" data-required-error="Data tidak boleh kosong" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>

                <!-- <div class="form-group has-feedback">
                    <label for="waktu_recruitment">Waktu</label>
                    <select class="form-control" name="waktu_recruitment" id="waktu_recruitment" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Waktu</option>
                        <option value="FULL TIME">Full Time</option>
                        <option value="PART TIME">Part Time</option>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div> -->

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=penerimaan' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>