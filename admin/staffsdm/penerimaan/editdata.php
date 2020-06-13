<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE id_rekrutmen = '$id'");

$getdata = mysqli_fetch_assoc($query);

$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_rekrutmen = htmlspecialchars($_POST['nama_rekrutmen']);
    $gaji_rekrutmen = htmlspecialchars($_POST['gaji_rekrutmen']);
    $waktu_rekrutmen = htmlspecialchars($_POST['waktu_rekrutmen']);

    $sql = mysqli_query($koneksi, "UPDATE `rekrutmen` SET 
        `nama_rekrutmen`='$nama_rekrutmen',
        `gaji_rekrutmen`='$gaji_rekrutmen',
        `waktu_rekrutmen`='$waktu_rekrutmen'
        WHERE id_rekrutmen = '$id'");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diperbaharui';
        $_SESSION['title'] = 'Data Penerimaan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diperbaharui';
        $_SESSION['title'] = 'Data Penerimaan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=penerimaan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Edit Data Penerimaan</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_rekrutmen">Nama</label>
                    <input type="nama_rekrutmen" class="form-control" id="nama_rekrutmen" name="nama_rekrutmen" value="<?= $getdata['nama_rekrutmen'] ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="gaji_rekrutmen">Gaji</label>
                    <input type="gaji_rekrutmen" class="form-control" id="gaji_rekrutmen" name="gaji_rekrutmen" value="<?= $getdata['gaji_rekrutmen'] ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="waktu_rekrutmen">Waktu</label>
                    <select class="form-control" name="waktu_rekrutmen" id="waktu_lowogan" required>
                        <option value="">-Pilih Waktu</option>
                        <option value="FULL TIME" <?php if($getdata['waktu_rekrutmen'] == "FULL TIME") echo 'selected' ?>>FULL TIME</option>
                        <option value="PART TIME" <?php if($getdata['waktu_rekrutmen'] == "PART TIME") echo 'selected' ?>>PART TIME</option>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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