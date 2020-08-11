<?php

$id_lowongan = $_GET['penerimaan'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deskripsi = $_POST['deskripsi'];

    // var_dump($deskripsi);
    foreach ($deskripsi as $key => $value) {
        $newvalue = ucfirst($value);
        $sql = mysqli_query($koneksi, "INSERT INTO `desk_rekrutmen`(`id_rekrutmen`, `deskripsi`, `tipe`) VALUES ('$id_lowongan','$newvalue','persyaratan')");
    }

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil di tambahkan';
        $_SESSION['title'] = 'Data Persyaratan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal di tambahkan';
        $_SESSION['title'] = 'Data Persyaratan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=deskripsi&penerimaan=" . $id_lowongan . "';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Persyaratan</strong></div>
        <div class="card-body">
            <form action="#" method="post" role="form">
                <div class="input_fields_wrap">
                    <div id="field1">
                        <div class="form-group">
                            <label for="deskripsi">Persyaratan</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi[]" data-required-error="Data tidak boleh kosong" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="tambahfield"><i class="fas fa-plus"></i> Tambah</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=deskripsi&penerimaan=<?= $id_lowongan ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>