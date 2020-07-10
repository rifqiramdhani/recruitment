<?php


$id_kriteria = isset($_GET['kriteria']) ? $_GET['kriteria'] : 'Data tidak ditemukan';

$queryKrit = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_penilaian` WHERE id_dt_kriteria_penilaian = '$id_kriteria'");
$getKrit = mysqli_fetch_assoc($queryKrit);

$query = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_kriteria' ORDER BY id_dt_subkriteria_penilaian ASC");


?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-8">
    <a href="?page=subkriteriapenilaian&action=tambahdata&kriteria=<?= $id_kriteria ?>" class="btn btn-success mt-3 mb-3">
        <i class="fas fa-plus"></i> Tambah
    </a>
    <a href="?page=kriteriapenilaian" class="btn btn-warning mt-3 mb-3">
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
        <div class="card-header"><strong>Data Kriteria - <?= $getKrit['nama_kriteria_penilaian'] ?></strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datasubkriteriapenilaian">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Nilai Prioritas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_dt_subkriteria_penilaian'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= ($getdata['nama_subkriteria_penilaian']) ?></td>
                                <td><?= $getdata['nilai_prioritas_subkriteria'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary text-white"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger remove" title="Hapus" data-id="<?= $getdata['id_dt_subkriteria_penilaian'] ?>" data-nama="<?= $getdata['nama_subkriteria_penilaian'] ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>