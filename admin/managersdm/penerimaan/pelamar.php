<?php

$id_rekrutmen = $_GET['penerimaan'];
$query = mysqli_query($koneksi, "SELECT calon_karyawan.* FROM `file_calon_karyawan` JOIN calon_karyawan USING(id_calon_karyawan) WHERE id_rekrutmen = '$id_rekrutmen'");

$queryrek = mysqli_query($koneksi, "SELECT * FROM rekrutmen WHERE id_rekrutmen = '$id_rekrutmen'");
$getrek = mysqli_fetch_assoc($queryrek);
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->

<div class="col-12">

    <!-- show sweet alert -->
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
    <?php
        unset($_SESSION['message']);
        unset($_SESSION['title']);
        unset($_SESSION['type']);
    endif;
    ?>

    <a href="?page=penerimaan" class="btn btn-warning btn-sm mb-3"><i class="fas fa-reply"></i> Kembali</a>
    
    <div class="card card-accent-success">
        <div class="card-header"><strong>Data Pelamar - <?= $getrek['nama_rekrutmen'] ?></strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datacalonkaryawan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_calon_karyawan'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['nama_calon_karyawan'] ?></td>
                                <td><?= $getdata['email_calon_karyawan'] ?></td>
                                <td><?= $getdata['telp_calon_karyawan'] ?></td>
                                <td><?= $getdata['ttl_calon_karyawan'] ?></td>
                                <td><?= $getdata['alamat_calon_karyawan'] ?></td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#modalmail<?= $getdata['id_calon_karyawan'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-envelope"></i></button>
                                </td>
                            </tr>
                        <?php include('modalmail.php');
                        endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>