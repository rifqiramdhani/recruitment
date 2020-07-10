<?php
// $query = mysqli_query($koneksi, "SELECT fpkb.*, nama_karyawan FROM `fpkb` JOIN karyawan ON fpkb.id_karyawan = karyawan.id_karyawan");
$query = mysqli_query($koneksi, "SELECT fpkb.*, nama_karyawan, nama_jabatan, nama_divisi FROM `fpkb` JOIN karyawan USING(id_karyawan) JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN divisi USING(id_divisi)  WHERE status_fpkb = 3 ORDER BY tanggal_permintaan DESC");
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
        <div class="card-header"><strong>Data Form Permintaan Karyawan Baru</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datafpkb">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pengaju</th>
                            <th>Jabatan</th>
                            <th>Posisi dibutuhkan</th>
                            <th>Jumlah dibutuhkan</th>
                            <th>Tanggal Permintaan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_fpkb'] ?>">
                                <td><?= $i++; ?></td>
                                <td><?= $getdata['nama_karyawan'] ?></td>
                                <td><?= $getdata['nama_jabatan'] . ' ' . $getdata['nama_divisi'] ?></td>
                                <td><?= $getdata['posisi_dibutuhkan'] ?></td>
                                <td><?= $getdata['jumlah_dibutuhkan'] ?></td>
                                <td><?= date('d-m-Y', strtotime($getdata['tanggal_permintaan'])) ?></td>

                                <td>
                                    <?php
                                    switch ($getdata['status_fpkb']) {

                                        case 3:
                                            echo '<button class="btn btn-block btn-default col-green font-weight-bold" >Disetujui</button>';
                                            break;

                                        case 4:
                                            echo '<button class="btn btn-block btn-danger font-weight-bold" >Ditolak</button>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-block btn-warning btn-sm mt-1" data-toggle="modal" data-target="#modaldetail<?= $getdata['id_fpkb'] ?>" title="Detail FPKB"><i class="fas fa-eye"></i> Detail FPKB</a>
                                </td>
                            </tr>
                        <?php include('modaldetail.php');
                        endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>