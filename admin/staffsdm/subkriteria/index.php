<?php

$id_kriteria = isset($_GET['kriteria']) ? $_GET['kriteria'] : 'Data tidak ditemukan';
$id_lowongan = isset($_GET['penerimaan']) ? $_GET['penerimaan'] : 'Data tidak ditemukan';

$querykriteria = mysqli_query($koneksi, "SELECT * FROM `kriteria_rekrutmen` JOIN detail_kriteria_rekrutmen ON detail_kriteria_rekrutmen.id_dt_krt_rekt = kriteria_rekrutmen.id_dt_krt_rekt WHERE id_krt_rekt = '$id_kriteria'");

$getkriteria = mysqli_fetch_assoc($querykriteria);

$query = mysqli_query($koneksi, "SELECT * FROM `subkriteria_rekrutmen` WHERE id_kriteria_rekrutmen = '$id_kriteria' ORDER BY nama_subkriteria ASC");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <a href="?page=kriteria&penerimaan=<?= $id_lowongan ?>" class="btn btn-warning mt-3 mb-3">
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
        <div class="card-header"><strong>Data Subkriteria - <?= $getkriteria['nama_kriteria_rekrutmen'] ?></strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datasubkriteria">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_subkriteria_rekrutmen'] ?>">
                                <td><?= $i++; ?></td>
                                <td><?= ($getdata['nama_subkriteria']) ?></td>
                                <td><?= $getdata['bobot_subkriteria'] ?></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>