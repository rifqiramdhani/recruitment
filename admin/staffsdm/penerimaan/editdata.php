<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE id_rekrutmen = '$id'");

$queryFpkb = mysqli_query($koneksi, "SELECT * FROM fpkb WHERE status_fpkb = 3");


$getdata = mysqli_fetch_assoc($query);

$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_fpkb = htmlspecialchars($_POST['id_fpkb']);
    $tanggal_buka = htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_buka'])));
    $tanggal_tutup = htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_tutup'])));
    // $waktu_rekrutmen = htmlspecialchars($_POST['waktu_rekrutmen']);

    if (strtotime($tanggal_buka) < strtotime($tanggal_tutup)) {
        $queryPosisiFpkb = mysqli_query($koneksi, "SELECT * FROM fpkb WHERE id_fpkb = '$id_fpkb'");
        $getPosisiFpkb = mysqli_fetch_assoc($queryPosisiFpkb);
        $nama_rekrutmen = $getPosisiFpkb['posisi_dibutuhkan'];

        $sql = mysqli_query($koneksi, "UPDATE `rekrutmen` SET 
        `nama_rekrutmen`='$nama_rekrutmen',
        `tanggal_buka`='$tanggal_buka',
        `tanggal_tutup`='$tanggal_tutup'
        WHERE id_rekrutmen = '$id'");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil diperbaharui';
            $_SESSION['title'] = 'Data Rekrutmen';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal diperbaharui';
            $_SESSION['title'] = 'Data Rekrutmen';
            $_SESSION['type'] = 'error';
        }
    }else{
        $_SESSION['message'] = 'Data gagal di diperbaharui';
        $_SESSION['title'] = 'Data Rekrutmen';
        $_SESSION['type'] = 'error';
    }

    

    echo "<script>window.location.href = '?page=penerimaan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah Data Rekrutmen</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">
 
                <div class="form-group has-feedback">
                    <label for="id_fpkb">Nama</label>
                    <select name="id_fpkb" id="id_fpkb" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih nama-</option>
                        <?php while ($getFpkb = mysqli_fetch_assoc($queryFpkb)) : ?>
                            <option value="<?= $getFpkb['id_fpkb'] ?>" <?= $getdata['id_fpkb'] == $getFpkb['id_fpkb'] ? 'selected' : '' ?>><?= $getFpkb['posisi_dibutuhkan'] ?></option>
                        <?php endwhile ?>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback" id="tanggal_buka">
                    <label for="open_date">Tanggal Buka</label>
                    <div class="input-group date mb-3">
                        <input type="text" class="form-control" name="tanggal_buka" id="open_date" onkeypress="return false" value="<?= date('d-m-Y', strtotime($getdata['tanggal_buka'])) ?>" data-required-error="Data tidak boleh kosong" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback" id="tanggal_tutup">
                    <label for="close_date">Tanggal Tutup</label>
                    <div class="input-group date mb-3">
                        <input type="text" class="form-control" name="tanggal_tutup" id="close_date" value="<?= date('d-m-Y', strtotime($getdata['tanggal_tutup'])) ?>" onkeypress="return false" data-required-error="Data tidak boleh kosong" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=penerimaan' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>