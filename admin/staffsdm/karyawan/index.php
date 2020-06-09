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

    <div class="card card-accent-success">
        <div class="card-header"><strong>Data Karyawan</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datakaryawan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_karyawan'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['nik'] ?></td>
                                <td><?= $getdata['nama_karyawan'] ?></td>
                                <td><?= $getdata['telp_karyawan'] ?></td>
                                <td><?= $getdata['ttl_karyawan'] ?></td>
                                <td><?= $getdata['alamat_karyawan'] ?></td>
                                <td><?= $getdata['email_karyawan'] ?></td>
                                <td><?= $getdata['nama_jabatan'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL . 'admin/index.php?page=karyawan&action=editdata&id=' . $getdata['id_karyawan'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <button type="button" data-id="<?= $getdata['id_karyawan'] ?>" data-nama="<?= $getdata['nama_karyawan'] ?>" class="btn btn-sm btn-danger remove"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>