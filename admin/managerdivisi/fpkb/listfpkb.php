<?php
$query = mysqli_query($koneksi, "SELECT * FROM `fpkb`");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <a href="<?= BASE_URL . 'admin/index.php?page=fpkb&action=tambahdata' ?>" class="btn btn-success mt-3 mb-3">
        <i class="fas fa-plus"></i> Tambah
    </a>
    <a href="<?= BASE_URL . 'admin/index.php?page=fpkb' ?>" class="btn btn-warning mt-3 mb-3">
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
        <div class="card-header"><strong>Data Form Permintaan Karyawan Baru</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datalowongan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Posisi yang dibutuhkan</th>
                            <th>Jumlah yang dibutuhkan</th>
                            <th>Tanggal Permintaan</th>
                            <th>File FPKB</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_fpkb'] ?>">
                                <td><?= $i++; ?></td>
                                <td><?= $getdata['posisi_dibutuhkan'] ?></td>
                                <td><?= $getdata['jumlah_dibutuhkan'] ?></td>
                                <td><?= $getdata['tanggal_permintaan'] ?></td>
                                <td>
                                    <a href="../assets/file/<?= $getdata['nama_file_fpkb'] ?>"><?= $getdata['nama_file_fpkb'] ?></a>
                                </td>
                                <td>
                                    <a href="?page=penerimaan&action=editdata&id=<?= $getdata['id_fpkb'] ?>" class="btn btn-sm btn-primary text-white mt-1" title="Edit data"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger remove mt-1" title="Hapus data" data-nama="<?= $getdata['nama_rekrutmen'] ?>" data-id="<?= $getdata['id_fpkb'] ?>"><i class="fas fa-trash"></i></button>
                                </td>

                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>