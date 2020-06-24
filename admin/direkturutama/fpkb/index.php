<?php
// $query = mysqli_query($koneksi, "SELECT fpkb.*, nama_karyawan FROM `fpkb` JOIN karyawan ON fpkb.id_karyawan = karyawan.id_karyawan");
$query = mysqli_query($koneksi, "SELECT fpkb.*, nama_karyawan, nama_jabatan, nama_divisi FROM `fpkb` JOIN karyawan ON fpkb.id_karyawan = karyawan.id_karyawan JOIN detail_jabatan ON karyawan.id_dt_jabatan = detail_jabatan.id_dt_jabatan JOIN divisi ON detail_jabatan.id_divisi = divisi.id_divisi JOIN jabatan ON detail_jabatan.id_jabatan = jabatan.id_jabatan WHERE status_fpkb >= 4 ORDER BY tanggal_disetujui DESC");
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
                            <th>Disetujui Oleh</th>
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
                                    if ($getdata['status_fpkb'] > 4 & $getdata['status_fpkb'] < 6) {
                                        echo 'Manager SDM, Direktur Suport, Direktur Utama';
                                    } else if ($getdata['status_fpkb'] == 6) {
                                        echo '-';
                                    } else {
                                        echo 'Manager SDM, Direktur Support';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="?page=fpkb&action=penyerahan&fpkb=<?= $getdata['id_fpkb'] ?>&status=1" class="btn btn-block btn-success btn-sm mt-1 penyerahankesupport <?php if ($getdata['status_fpkb'] > 4) echo 'disabled' ?>" title="Serahkan Ke Direktur Support"><i class="fas fa-check"></i> Setujui</a>
                                    <a href="?page=fpkb&action=penyerahan&fpkb=<?= $getdata['id_fpkb'] ?>&status=0" class="btn btn-block btn-danger btn-sm mt-1 tolakfpkb <?php if ($getdata['status_fpkb'] > 4) echo 'disabled' ?>" title="FPKB Ditolak"><i class="fas fa-times"></i> Tolak</a>

                                </td>

                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>