<?php

$id_lowongan = isset($_GET['penerimaan']) ? $_GET['penerimaan'] : 'Data tidak ditemukan';

$querylowongan = mysqli_query($koneksi, "SELECT * FROM lowongan WHERE id_lowongan = '$id_lowongan'");
$getlowongan = mysqli_fetch_assoc($querylowongan);

$query = mysqli_query($koneksi, "SELECT * FROM `kriteria` JOIN kriteria_index ON kode_kriteria_fore = kode_kriteria WHERE id_lowongan_fore = '$id_lowongan' AND status_kriteria = 1");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <a href="?page=kriteria&action=tambahdata&penerimaan=<?= $id_lowongan ?>" class="btn btn-success mt-3 mb-3">
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

    <div class="card card-accent-success">
        <div class="card-header"><strong>Data Kriteria - <?= $getlowongan['nama_lowongan'] ?></strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datakriteria">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Bobot</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_kriteria'] ?>">
                                <td><?= $getdata['kode_kriteria'] ?></td>
                                <td><?= $getdata['nama_kriteria'] ?></td>
                                <td><?= $getdata['bobot_kriteria'] ?></td>
                                <td>
                                    <a href="?page=kriteria&action=editdata&id=<?= $getdata['id_kriteria'] ?>&penerimaan=<?= $id_lowongan ?>" class="btn btn-sm btn-primary text-white"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger remove" title="Hapus" data-id="<?= $getdata['id_kriteria'] ?>" data-nama="<?= $getdata['nama_kriteria'] ?>"><i class="fas fa-trash"></i></button>
                                </td>
                                <td>
                                    <a href="?page=subkriteria&penerimaan=<?= $id_lowongan ?>&kriteria=<?= $getdata['id_kriteria'] ?>" class="btn btn-sm btn-secondary">Sub Kriteria</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>