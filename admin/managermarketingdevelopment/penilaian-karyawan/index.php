<?php

$id_divisi = $_SESSION['id_divisi'];

$query = mysqli_query($koneksi, "SELECT * FROM `penilaian_kmp` JOIN karyawan USING(id_karyawan) JOIn jabatan USING(id_jabatan) JOIN divisi USING(id_divisi) WHERE id_divisi = '$id_divisi'");

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <div class="form-group row ml-1">
        <button class="btn ml-1 btn-success" id="hitungpenilaiankaryawan">Tampilkan Status</button>
    </div>

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
        <div class="card-header"><strong>Data Penilaian Karyawan</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="penilaiankaryawan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Divisi</th>
                            <th>Telah Dinilai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> <?php
                            $i = 1;
                            while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_karyawan'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['nama_karyawan'] ?></td>
                                <td><?= $getdata['email_karyawan'] ?></td>
                                <td><?= $getdata['telp_karyawan'] ?></td>
                                <td><?= $getdata['ttl_karyawan'] ?></td>
                                <td><?= $getdata['alamat_karyawan'] ?></td>
                                <td><?= $getdata['nama_divisi'] ?></td>
                                <td>
                                    <?php if ($getdata['nilai'] == 0) : ?>
                                        <i class="far fa-times-circle"></i>
                                    <?php else : ?>
                                        <i class="far fa-check-circle"></i>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="?page=penilaian-karyawan&action=nilai&karyawan=<?= $getdata['id_karyawan'] ?>" class="btn btn-sm btn-primary <?php if ($getdata['nilai'] <> 0) echo 'disabled bg-danger' ?>">Nilai</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="col-12" id="tampilkaryawan">

</div>