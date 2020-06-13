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
        <div class="card-header"><strong>Data Penerimaan Lowongan Kerja</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datalowongan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Penerimaan</th>
                            <th>Tempat</th>
                            <th>Gaji</th>
                            <th>Waktu</th>
                            <th>Pengumuman</th>
                            <th>Tampil</th>
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
                                <td>Lembang</td>
                                <td><?= $getdata['gaji_rekrutmen'] ?></td>
                                <td><?= $getdata['waktu_rekrutmen'] ?></td>
                                <td>
                                    <?php if ($getdata['pengumuman'] == 0) : ?>
                                        <i class="far fa-times-circle"></i>
                                    <?php else : ?>
                                        <i class="far fa-check-circle"></i>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <?php if ($getdata['status_rekrutmen'] == 0) : ?>
                                        <i class="far fa-times-circle"></i>
                                    <?php else : ?>
                                        <i class="far fa-check-circle"></i>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="?page=penerimaan&action=editdata&id=<?= $getdata['id_rekrutmen'] ?>" class="btn btn-sm btn-primary text-white" title="Edit data"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger remove" title="Hapus data" data-nama="<?= $getdata['nama_rekrutmen'] ?>" data-id="<?= $getdata['id_rekrutmen'] ?>"><i class="fas fa-trash"></i></button>
                                    <button type="button" data-id="<?= $getdata['id_rekrutmen'] ?>" class="btn btn-sm btn-primary text-white tampilhalaman" title="Tampilkan rekrutmen"><i class="fas fa-eye"></i></button>
                                </td>
                                <td>
                                    <a href="?page=deskripsi&penerimaan=<?= $getdata['id_rekrutmen'] ?>" class="btn btn-sm btn-secondary">Deskripsi</a>
                                    <a href="?page=kriteria&penerimaan=<?= $getdata['id_rekrutmen'] ?>" class="btn btn-sm btn-secondary">Kriteria</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>