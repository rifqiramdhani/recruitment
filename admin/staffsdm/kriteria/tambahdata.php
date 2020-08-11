<?php
$id_lowongan = $_GET['penerimaan'];
$querykriteria = mysqli_query($koneksi, "SELECT * FROM detail_kriteria_rekrutmen");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_lowongan = $_GET['penerimaan'];
    $kode_kriteria_fore = $_POST['kode_kriteria_fore'];
    $bobot_kriteria = $_POST['bobot_kriteria'];

    $querycek = mysqli_query($koneksi, "SELECT * FROM `kriteria_rekrutmen` WHERE id_dt_krt_rekt = '$kode_kriteria_fore' AND id_rekrutmen = '$id_lowongan'");

    if (mysqli_num_rows($querycek) > 0) {
        $getkriteria = mysqli_fetch_assoc($querycek);
        $status = $getkriteria['status_kriteria'];

        if ($status == 0) {
            $sql = mysqli_query($koneksi, "UPDATE `kriteria` SET `status_kriteria`= 1, `bobot_kriteria`= '$bobot_kriteria' WHERE kode_kriteria_fore = '$kode_kriteria_fore' AND id_recruitment_fore = '$id_lowongan'");
            $sql = mysqli_query($koneksi, "UPDATE `kriteria_rekrutmen` SET `bobot_kriteria`='$bobot_kriteria',`status_kriteria`= 1 WHERE id_dt_krt_rekt = '$kode_kriteria_fore' AND id_rekrutmen = '$id_lowongan'");
        } else {
            $_SESSION['message'] = 'Maaf data sudah ada';
            $_SESSION['title'] = 'Data Kriteria';
            $_SESSION['type'] = 'error';
            echo "<script>window.location.href = '?page=kriteria&penerimaan=" . $id_lowongan . "';</script>";
        }
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO `kriteria_rekrutmen`(`id_rekrutmen`, `id_dt_krt_rekt`, `bobot_kriteria`) VALUES ('$id_lowongan','$kode_kriteria_fore','$bobot_kriteria')");
    }

    if (isset($sql)) {
        if ($sql) {
            $_SESSION['message'] = 'Data berhasil di tambahkan';
            $_SESSION['title'] = 'Data Kriteria';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal di tambahkan';
            $_SESSION['title'] = 'Data Kriteria';
            $_SESSION['type'] = 'error';
        }

        echo "<script>window.location.href = '?page=kriteria&penerimaan=" . $id_lowongan . "';</script>";
    }
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Kriteria</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="kode_kriteria_fore">Nama Subkriteria</label>
                    <select class="form-control" name="kode_kriteria_fore" id="kode_kriteria_fore"   data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Kriteria</option>
                        <?php while ($getkriteria = mysqli_fetch_assoc($querykriteria)) : ?>
                            <option value="<?= $getkriteria['id_dt_krt_rekt'] ?>"><?= $getkriteria['nama_kriteria_rekrutmen'] ?></option>
                        <?php endwhile ?>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="bobot_kriteria">Bobot</label>
                    <select name="bobot_kriteria" id="bobot_kriteria" class="form-control" data-data-required-error="Data tidak boleh kosong" required-error="Tolong pilih salah satu opsi" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Bobot-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=kriteria&penerimaan=<?= $id_lowongan ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>