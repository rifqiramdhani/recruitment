<?php
// $query = mysqli_query($koneksi, "SELECT fpkb.*, nama_karyawan FROM `fpkb` JOIN karyawan ON fpkb.id_karyawan = karyawan.id_karyawan");
$query = mysqli_query($koneksi, "SELECT fpkb.*, nama_karyawan, nama_jabatan, nama_divisi FROM `fpkb` JOIN karyawan ON fpkb.id_karyawan = karyawan.id_karyawan JOIN detail_jabatan ON karyawan.id_dt_jabatan = detail_jabatan.id_dt_jabatan JOIN divisi ON detail_jabatan.id_divisi = divisi.id_divisi JOIN jabatan ON detail_jabatan.id_jabatan = jabatan.id_jabatan ORDER BY tanggal_permintaan DESC");
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
                            <th>Yang mengajukan</th>
                            <th>Jabatan</th>
                            <th>Posisi dibutuhkan</th>
                            <th>Jumlah dibutuhkan</th>
                            <th>Tanggal Permintaan</th>
                            <th>File FPKB</th>
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
                                    <a href="../assets/file/<?= $getdata['nama_file_fpkb'] ?>"><?= $getdata['nama_file_fpkb'] ?></a>
                                </td>
                                <td>
                                    <?php
                                    switch ($getdata['status_fpkb']) {
                                        case 1:
                                            echo '-';
                                            break;

                                        case 2:
                                            echo '<button class="btn btn-block btn-default col-red font-weight-bold" >Menunggu Persetujuan <br> Manager SDM</button>';
                                            break;


                                        case 3:
                                            echo '<button class="btn btn-block btn-default col-red font-weight-bold" >Menunggu Persetujuan <br> Direktur Support</button>';
                                            break;


                                        case 4:
                                            echo '<button class="btn btn-block btn-default col-red font-weight-bold" >Menunggu Persetujuan <br> Direktur Utama</button>';
                                            break;

                                        case 5:
                                            echo '<button class="btn btn-block btn-default col-green font-weight-bold" >Disetujui</button>';
                                            break;

                                        case 6:
                                            echo '<button class="btn btn-block btn-danger font-weight-bold" >Ditolak</button>';
                                            break;

                                        default:
                                            
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="?page=fpkb&action=editdata&fpkb=<?= $getdata['id_fpkb'] ?>" class="btn btn-sm btn-block btn-primary text-white mt-1" title="Edit FPKB"><i class="fas fa-edit"></i> Edit FPKB</a>
                                    <a href="?page=fpkb&action=penyerahan&fpkb=<?= $getdata['id_fpkb'] ?>" class="btn btn-block btn-warning btn-sm mt-1 penyerahankesdm <?php if ($getdata['status_fpkb'] > 1) echo 'disabled' ?>" title="Serahkan Ke Manager SDM"><i class="fas fa-share-square"></i> Serahkan</a>
                                    <button type="button" class="btn btn-sm btn-danger btn-block remove mt-1" title="Hapus FPKB" data-nama="<?= $getdata['posisi_dibutuhkan'] ?>" data-id="<?= $getdata['id_fpkb'] ?>"><i class="fas fa-trash"></i> Hapus FPKB</button>
                                </td>

                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>