<?php
$query = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE status_rekrutmen = 0 OR status_rekrutmen = 1");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <a href="<?= BASE_URL . 'admin/index.php?page=penerimaan&action=tambahdata' ?>" class="btn btn-success mt-3 mb-3">
        <i class="fas fa-plus"></i> Tambah
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
        <div class="card-header"><strong>Data Rekrutmen Lowongan Kerja</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datalowongan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Rekrutmen</th>
                            <th>Tanggal Buka</th>
                            <th>Tanggal Tutup</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_rekrutmen'] ?>">
                                <td><?= $i++; ?></td>
                                <td><?= $getdata['nama_rekrutmen'] ?></td>
                                <td><?= date('d-m-Y', strtotime($getdata['tanggal_buka'])) ?></td>
                                <td><?= date('d-m-Y', strtotime($getdata['tanggal_tutup'])) ?></td>
                                <td>
                                    <a href="?page=penerimaan&action=editdata&id=<?= $getdata['id_rekrutmen'] ?>" class="btn btn-sm btn-primary text-white mt-1" title="Ubah data"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger remove mt-1" title="Hapus data" data-nama="<?= $getdata['nama_rekrutmen'] ?>" data-id="<?= $getdata['id_rekrutmen'] ?>"><i class="fas fa-trash"></i></button>
                                    <button type="button" data-id="<?= $getdata['id_rekrutmen'] ?>" class="btn btn-sm btn-warning text-white tampilhalaman mt-1" title="<?= $getdata['status_rekrutmen'] == 0 ? 'Aktifkan' : 'Nonaktifkan' ?> rekrutmen"><i class="fas fa-eye"></i></button>
                                </td>
                                <td> 
                                    <a href="?page=deskripsi&penerimaan=<?= $getdata['id_rekrutmen'] ?>" class="btn btn-sm btn-secondary mt-1" title="Olah Data Deskripsi Rekrutmen">Deskripsi</a>
                                    <!-- <a href="?page=kriteria&penerimaan=<?= $getdata['id_rekrutmen'] ?>" class="btn btn-sm btn-secondary mt-1" title="Olah Data Kriteria">Kriteria</a> -->
                                </td>
                                <td>
                                    <a href="?page=penerimaan&action=pelamar&penerimaan=<?= $getdata['id_rekrutmen'] ?>" class="btn btn-sm btn-secondary mt-1" title="Olah Data Pelamar Rekrutmen">Pelamar</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>