<?php

$query = mysqli_query($koneksi, "SELECT * FROM `jabatan` JOIN divisi USING(id_divisi) ORDER BY `id_jabatan` ASC"); 

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">

    <a href="?page=jabatan&action=tambahdata" class="btn btn-success mt-3 mb-3">
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
        <div class="card-header"><strong>Data jabatan</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datajabatan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jabatan</th>
                            <th>Kebutuhan Karyawan</th>
                            <th>Karyawan yang ada</th>
                            <th>Kekosongan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) :

                            $id_jabatan = $getdata['id_jabatan'];

                            $queryjumlahkaryawan = mysqli_query($koneksi, "SELECT COUNT(id_jabatan) as jumlah FROM `karyawan` WHERE id_jabatan = '$id_jabatan'");

                            $getjumlahkaryawan = mysqli_fetch_assoc($queryjumlahkaryawan);


                            $kekosongan = intval($getdata['jumlah_jabatan']) - intval($getjumlahkaryawan['jumlah']);

                        ?>
                            <tr id="<?= $getdata['id_jabatan'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['nama_jabatan'] . ' ' . $getdata['nama_divisi'] ?></td>
                                <td><?= $getdata['jumlah_jabatan'] . ' orang' ?></td>
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
                                    <a href="?page=jabatan&action=editdata&jabatan=<?= $getdata['id_jabatan'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <button type="button" data-id="<?= $getdata['id_jabatan'] ?>" data-nama="<?= $getdata['nama_jabatan']  ?>" class="btn btn-sm btn-danger remove"><i class="fas fa-trash"></i></button>
                                </td>

                            </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>