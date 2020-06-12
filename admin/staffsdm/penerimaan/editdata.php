<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM `recruitment` WHERE id_recruitment = '$id'");

$getdata = mysqli_fetch_assoc($query);

$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_recruitment = htmlspecialchars($_POST['nama_recruitment']);
    $gaji_recruitment = htmlspecialchars($_POST['gaji_recruitment']);
    $waktu_recruitment = htmlspecialchars($_POST['waktu_recruitment']);

    $sql = mysqli_query($koneksi, "UPDATE `recruitment` SET 
        `nama_recruitment`='$nama_recruitment',
        `gaji_recruitment`='$gaji_recruitment',
        `waktu_recruitment`='$waktu_recruitment'
        WHERE id_recruitment = '$id'");

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
                    <label for="nama_recruitment">Nama</label>
                    <input type="nama_recruitment" class="form-control" id="nama_recruitment" name="nama_recruitment" value="<?= $getdata['nama_recruitment'] ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="gaji_recruitment">Gaji</label>
                    <input type="gaji_recruitment" class="form-control" id="gaji_recruitment" name="gaji_recruitment" value="<?= $getdata['gaji_recruitment'] ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="waktu_recruitment">Waktu</label>
                    <select class="form-control" name="waktu_recruitment" id="waktu_lowogan" required>
                        <option value="">-Pilih Waktu</option>
                        <option value="FULL TIME" <?php if($getdata['waktu_recruitment'] == "FULL TIME") echo 'selected' ?>>FULL TIME</option>
                        <option value="PART TIME" <?php if($getdata['waktu_recruitment'] == "PART TIME") echo 'selected' ?>>PART TIME</option>
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