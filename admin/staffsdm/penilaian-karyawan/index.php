<?php
$query = mysqli_query($koneksi, "SELECT karyawan.*, nama_divisi, status FROM `penilaian_kmp` JOIN karyawan USING(id_karyawan) JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi) WHERE status = 4 ORDER BY `id_penilaian_kmp` ASC");
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
        <div class="card-header"><strong>Data Hasil Penilaian</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datacalonkaryawan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Divisi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_karyawan'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['nik'] ?></td>
                                <td><?= $getdata['nama_karyawan'] ?></td>
                                <td><?= $getdata['email_karyawan'] ?></td>
                                <td><?= $getdata['telp_karyawan'] ?></td>
                                <td><?= $getdata['ttl_karyawan'] ?></td>
                                <td><?= $getdata['alamat_karyawan'] ?></td>
                                <td><?= $getdata['nama_divisi'] ?></td>
                                <td>
                                    <button class="btn btn-default col-green"><?= $getdata['status'] == 4 ? 'Diterima' : '-' ?></button>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>