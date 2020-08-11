<?php

$id_lowongan = isset($_GET['penerimaan']) ? $_GET['penerimaan'] : 'Data tidak ditemukan';

$querylowongan = mysqli_query($koneksi, "SELECT * FROM rekrutmen WHERE id_rekrutmen = '$id_lowongan'");
$getlowongan = mysqli_fetch_assoc($querylowongan);

$querydesk = mysqli_query($koneksi, "SELECT * FROM `desk_rekrutmen` WHERE tipe = 'deskripsi' AND id_rekrutmen = '$id_lowongan'");
$getdesk = mysqli_fetch_assoc($querydesk);

$querysyarat = mysqli_query($koneksi, "SELECT * FROM `desk_rekrutmen` WHERE tipe = 'persyaratan' AND id_rekrutmen = '$id_lowongan'");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_desk_rekrutmen = $_POST['id_desk_rekrutmen'];
    $deskripsi = $_POST['deskripsi'];

    $sql = mysqli_query($koneksi, "UPDATE `desk_rekrutmen` SET `deskripsi`='$deskripsi' WHERE id_desk_rekrutmen = '$id_desk_rekrutmen'");

    // header('location: ?page=deskripsi&penerimaan=8');
    // var_dump($_SESSION);
    // echo "<script>window.location = window.location.href</script>";

}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <a href="?page=deskripsi&action=tambahdata&penerimaan=<?= $id_lowongan ?>" class="btn btn-success mt-3 mb-3">
        <i class="fas fa-plus"></i> Tambah
    </a>
    <a href="<?= BASE_URL . 'admin/index.php?page=penerimaan' ?>" class="btn btn-warning mt-3 mb-3">
        <i class="fas fa-reply"></i> Kembali
    </a>

    <!-- show sweet alert -->
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
    <?php
        unset($_SESSION['message']);
        unset($_SESSION['title']);
        unset($_SESSION['type']);
    endif;
    ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="card card-accent-success">
                <div class="card-header"><strong>Persyaratan - <?= $getlowongan['nama_rekrutmen'] ?></strong></div>
                <div class="card-body">
                    <table class="table table-striped table-bordered text-center" style="width:100%" id="datapersyaratan">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Persyaratan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php if (mysqli_num_rows($querysyarat) > 0) : ?>
                                <?php $i = 1;
                                while ($getdata = mysqli_fetch_assoc($querysyarat)) : ?>
                                    <tr id="<?= $getdata['id_desk_rekrutmen'] ?>">
                                        <td><?= $i++ ?></td>
                                        <td><?= $getdata['deskripsi'] ?></td>
                                        <td>
                                            <a href="?page=deskripsi&action=editdata&penerimaan=<?= $id_lowongan ?>&deskripsi=<?= $getdata['id_desk_rekrutmen'] ?>" class="btn btn-sm btn-primary text-white"><i class="fas fa-edit"></i></a>

                                            <button type="button" class="btn btn-sm btn-danger remove" title="Hapus" data-id="<?= $getdata['id_desk_rekrutmen'] ?>" data-nama="<?= $getdata['deskripsi'] ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="3">No data available in table</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-accent-success">
                <div class="card-header"><strong>Deskripsi - <?= $getlowongan['nama_rekrutmen'] ?></strong></div>
                <div class="card-body">
                    <form action="#" method="post" data-toggle="validator" role="form" id="formdeskripsi">
                        <div class="form-group has-feedback">
                            <label for="deskripsi">Deskripsi Pekerjaan</label>
                            <input type="hidden" name="id_desk_rekrutmen" value="<?= $getdesk['id_desk_rekrutmen'] ?>">
                            <input type="hidden" name="id_lowongan" value="<?= $id_lowongan ?>">
                            <textarea class="form-control" id="deskripsi" rows="5" name="deskripsi" data-required-error="Data tidak boleh kosong" required><?= $getdesk['deskripsi'] ?></textarea>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="savedeskripsi"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>