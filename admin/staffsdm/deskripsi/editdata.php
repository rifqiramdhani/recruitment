<?php

$id_lowongan = $_GET['penerimaan'];
$id_desk_rekrutmen = $_GET['deskripsi'];

$query = mysqli_query($koneksi, "SELECT * FROM desk_rekrutmen WHERE id_desk_rekrutmen = '$id_desk_rekrutmen'");
$getdata = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deskripsi = ucfirst($_POST['deskripsi']);

    $sql = mysqli_query($koneksi, "UPDATE desk_rekrutmen SET deskripsi = '$deskripsi' WHERE id_desk_rekrutmen = '$id_desk_rekrutmen'");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diperbaharui';
        $_SESSION['title'] = 'Data Persyaratan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diperbaharui';
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
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $getdata['deskripsi'] ?>" data-required-error="Data tidak boleh kosong" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="?page=deskripsi&penerimaan=<?= $id_lowongan ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>