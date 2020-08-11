<?php

$id_karyawan = $_SESSION['id_karyawan'];
$query = mysqli_query($koneksi, "SELECT * FROM `penilaian_kmp` JOIN karyawan USING(id_karyawan) WHERE id_karyawan = '$id_karyawan'");
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

    <div class="card card-accent-success">
        <div class="card-header"><strong>Data Nilai</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datakaryawan">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Data Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_karyawan'] ?>">
                                <td><?= $getdata['nik'] ?></td>
                                <td><?= $getdata['nama_karyawan'] ?></td>
                                <td><?= $getdata['alamat_karyawan'] ?></td>
                                <td><?= $getdata['telp_karyawan'] ?></td>
                                <td><?= $getdata['nilai'] ?></td>
                                <td>
                                    <?php
                                    switch ($getdata['status']) {
                                        case 0:
                                            echo '-';
                                            break;

                                        case 1:
                                            echo '<button class="btn btn-sm btn-block btn-primary">Diangkat</button>';
                                            break;

                                        case 2:
                                            echo '<button class="btn btn-sm btn-block btn-danger">Diberhentikan</button>  ';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="?page=dashboard&action=nilai&karyawan=<?= $getdata['id_karyawan'] ?>" class="btn btn-sm btn-primary">Data Nilai</a>
                                </td>

                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>