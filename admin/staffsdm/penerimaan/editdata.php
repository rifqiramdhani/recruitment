<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM `recruitment` WHERE id_lowongan = '$id'");

$getdata = mysqli_fetch_assoc($query);

$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lowongan = htmlspecialchars($_POST['nama_lowongan']);
    $gaji_lowongan = htmlspecialchars($_POST['gaji_lowongan']);
    $waktu_lowongan = htmlspecialchars($_POST['waktu_lowongan']);

    $sql = mysqli_query($koneksi, "UPDATE `recruitment` SET 
        `nama_lowongan`='$nama_lowongan',
        `gaji_lowongan`='$gaji_lowongan',
        `waktu_lowongan`='$waktu_lowongan'
        WHERE id_lowongan = '$id'");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diperbaharui';
        $_SESSION['title'] = 'Data Penerimaan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diperbaharui';
        $_SESSION['title'] = 'Data Penerimaan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=Penerimaan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Edit Data Karyawan</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_lowongan">Nama</label>
                    <input type="nama_lowongan" class="form-control" id="nama_lowongan" name="nama_lowongan" value="<?= $getdata['nama_lowongan'] ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="gaji_lowongan">Gaji</label>
                    <input type="gaji_lowongan" class="form-control" id="gaji_lowongan" name="gaji_lowongan" value="<?= $getdata['gaji_lowongan'] ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="waktu_lowongan">Waktu</label>
                    <select class="form-control" name="waktu_lowongan" id="waktu_lowogan" required>
                        <option value="">-Pilih Waktu</option>
                        <option value="FULL TIME" <?php if($getdata['waktu_lowongan'] == "FULL TIME") echo 'selected' ?>>Full Time</option>
                        <option value="PART TIME" <?php if($getdata['waktu_lowongan'] == "PART TIME") echo 'selected' ?>>Part Time</option>
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