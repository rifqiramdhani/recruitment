<?php

$id_karyawan = $_GET['karyawan'];
$queryKrit = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_penilaian` ORDER BY `id_dt_kriteria_penilaian` ASC");

$queryKar = mysqli_query($koneksi, "SELECT nama_karyawan FROM karyawan WHERE id_karyawan = '$id_karyawan'");
$getKar = mysqli_fetch_assoc($queryKar);
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->

<div class="col-sm-12 col-md-10">
    <a href="?page=dashboard" class="btn btn-warning btn-sm mb-3"><i class="fas fa-reply"></i> Kembali</a>
    <div class="card card-accent-success">
        <div class="card-header">
            <strong>Data Penilaian - <?= $getKar['nama_karyawan'] ?></strong>
        </div>
        <div class="card-body">
            <form action="?page=penilaian-karyawan&action=hitungnilai" method="post" enctype="multipart/form-data">
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Kriteria</th>
                                <th>Subkriteria</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($getKrit = mysqli_fetch_assoc($queryKrit)) :

                                $id_dt_krt_penilaian = $getKrit['id_dt_kriteria_penilaian'];

                                $queryLengSubkrit = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_dt_krt_penilaian'");
                                $panjang = mysqli_num_rows($queryLengSubkrit);
                            ?>
                                <tr>
                                    <td rowspan="<?= $panjang + 1 ?>" class="text-center align-middle"><?= $getKrit['nama_kriteria_penilaian'] ?></td>

                                </tr>

                                <?php

                                $querySubkrit = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_dt_krt_penilaian'");

                                ?>

                                <?php
                                while ($getSubkrit = mysqli_fetch_assoc($querySubkrit)) :

                                    $id_dt_subkriteria_penilaian = $getSubkrit['id_dt_subkriteria_penilaian'];

                                    $queryNilai = mysqli_query($koneksi, "SELECT * FROM `detail_penilaian_kmp` WHERE id_karyawan = '$id_karyawan' AND id_dt_kriteria_penilaian = '$id_dt_krt_penilaian' AND id_dt_subkriteria_penilaian = '$id_dt_subkriteria_penilaian'");

                                    $getNilai = mysqli_fetch_assoc($queryNilai);
                                ?>
                                    <tr>
                                        <td><?= $getSubkrit['nama_subkriteria_penilaian'] ?></td>
                                        <td>
                                            <input type="text" class="form-control" value="<?= $getNilai['nilai'] ?>" readonly>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>