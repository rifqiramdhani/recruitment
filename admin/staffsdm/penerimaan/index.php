<?php
$query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan FROM `karyawan` JOIN jabatan ON id_jabatan_fore = id_jabatan WHERE status_karyawan = 1");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <a href="<?= BASE_URL . 'admin/index.php?page=karyawan&action=tambahdata' ?>" class="btn btn-success mt-3 mb-3">
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

    <div class="card card-accent-success" id="datakaryawan">
        <div class="card-header"><strong>Data Penerimaan Lowongan Kerja</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Penerimaan</th>
                            <th>Tempat</th>
                            <th>Gaji</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($lowongan as $getdata) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $getdata->nama_lowongan ?></td>
                                <td>Lembang</td>
                                <td><?= $getdata->gaji_lowongan ?></td>
                                <td><?= $getdata->waktu_lowongan ?></td>
                                <td>
                                    <i class="far fa-check-circle"></i>
                                </td>
                                <td>
                                    <a href="page/admin" class="btn btn-primary text-white"><i class="fas fa-edit"></i></a>
                                    <a href="adfa/s" class="btn btn-danger" title="Edit"><i class="fas fa-trash"></i></a>
                                </td>
                                <td>
                                    <a href="<?= base_url($level . '/page/kriteria/' . $getdata->id_lowongan) ?>" class="btn btn-dark">Kriteria</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>