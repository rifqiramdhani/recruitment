<?php
$querykriteria = mysqli_query($koneksi, "SELECT * FROM kriteria_index");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_lowongan = $_GET['penerimaan'];
    $kode_kriteria_fore = $_POST['kode_kriteria_fore'];
    $bobot_kriteria = $_POST['bobot_kriteria'];

    $querycek = mysqli_query($koneksi, "SELECT * FROM `kriteria` WHERE kode_kriteria_fore = '$kode_kriteria_fore' AND id_lowongan_fore = '$id_lowongan'");

    if (mysqli_num_rows($querycek) > 0) {
        $getkriteria = mysqli_fetch_assoc($querycek);
        $status = $getkriteria['status_kriteria'];

        if ($status == 0) {
            $sql = mysqli_query($koneksi, "UPDATE `kriteria` SET `status_kriteria`= 1, `bobot_kriteria`= '$bobot_kriteria' WHERE kode_kriteria_fore = '$kode_kriteria_fore' AND id_lowongan_fore = '$id_lowongan'");
        } else {
            $_SESSION['message'] = 'Maaf data sudah ada';
            $_SESSION['title'] = 'Data Kriteria';
            $_SESSION['type'] = 'error';
            echo "<script>window.location.href = '?page=kriteria&penerimaan=" . $id_lowongan . "';</script>";
        }
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO `kriteria`(`id_lowongan_fore`, `kode_kriteria_fore`, `bobot_kriteria`) VALUES ('$id_lowongan','$kode_kriteria_fore','$bobot_kriteria')");
    }

    if (isset($sql)) {
        if ($sql) {
            $_SESSION['message'] = 'Data berhasil di tambahkan';
            $_SESSION['title'] = 'Data Penerimaan';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal di tambahkan';
            $_SESSION['title'] = 'Data Penerimaan';
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
                    <label for="kode_kriteria_fore">kode_kriteria_fore</label>
                    <select class="form-control" name="kode_kriteria_fore" id="kode_kriteria_fore" required>
                        <option value="">-Pilih Kriteria</option>
                        <?php while ($getkriteria = mysqli_fetch_assoc($querykriteria)) : ?>
                            <option value="<?= $getkriteria['kode_kriteria'] ?>"><?= $getkriteria['nama_kriteria'] ?></option>
                        <?php endwhile ?>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="bobot_kriteria">Bobot</label>
                    <input type="bobot_kriteria" class="form-control" id="bobot_kriteria" name="bobot_kriteria" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
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