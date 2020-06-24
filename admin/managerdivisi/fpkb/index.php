<?php

$query = mysqli_query($koneksi, "SELECT id_dt_jabatan, nama_jabatan, nama_divisi, kebutuhan_karyawan FROM `detail_jabatan` JOIN divisi ON detail_jabatan.id_divisi = divisi.id_divisi JOIN jabatan ON detail_jabatan.id_jabatan = jabatan.id_jabatan");
 
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">

    <a href="?page=fpkb&action=listfpkb" class="btn btn-success mt-3 mb-3">
        <i class="fas fa-list-ul"></i> List FPKB
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
        <div class="card-header"><strong>Permintaan FPKB (Kekosongan Jabatan)</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datakaryawan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jabatan</th>
                            <th>Kebutuhan Karyawan</th>
                            <th>Karyawan yang ada</th>
                            <th>Kekosongan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) :

                            $id_dt_jabatan = $getdata['id_dt_jabatan'];

                            $queryjumlahkaryawan = mysqli_query($koneksi, "SELECT COUNT(id_dt_jabatan) as jumlah FROM `karyawan` WHERE id_dt_jabatan = '$id_dt_jabatan'");

                            $getjumlahkaryawan = mysqli_fetch_assoc($queryjumlahkaryawan);


                            $kekosongan = intval($getdata['kebutuhan_karyawan']) - intval($getjumlahkaryawan['jumlah']);

                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['nama_jabatan'] . ' ' . $getdata['nama_divisi'] ?></td>
                                <td><?= $getdata['kebutuhan_karyawan'] . ' orang' ?></td>
                                <td>
                                    <?php
                                    if ($getjumlahkaryawan['jumlah'] <= 0) {
                                        echo '-';
                                    } else {
                                        echo $getjumlahkaryawan['jumlah'] . ' orang';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($kekosongan <= 0) {
                                        echo '-';
                                    } else {
                                        echo $kekosongan . ' orang';
                                    }
                                    ?>

                                </td>

                                <td>
                                    <?php if ($kekosongan < 0 || $kekosongan == 0) : ?>
                                        <button type="button" class="btn btn-block btn-default m-r-20 col-teal font-weight-bold">Aman</button>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-block btn-default m-r-20 col-red font-weight-bold">Kurang Karyawan</button>
                                    <?php endif ?>
                                </td>

                                <td>
                                    <?php if ($kekosongan > 0) : ?>
                                        <a href="?page=fpkb&action=permintaankaryawanbaru&id=<?= $getdata['id_dt_jabatan'] ?>" class="btn btn-block btn-warning btn-sm" title="Ajukan FPKB"><i class="fas fa-share-square"></i> Ajukan</a>
                                    <?php endif ?>
                                </td>


                            </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>