<?php
$query = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_penilaian`");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <!-- <a href="?page=kriteriapenilaian&action=tambahdata" class="btn btn-success mt-3 mb-3">
        <i class="fas fa-plus"></i> Tambah
    </a> -->


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
        <div class="card-header"><strong>Data Kriteria Penilaian</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datakriteriapenilaian">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Bobot</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_dt_kriteria_penilaian'] ?>">
                                <td><?= $getdata['id_dt_kriteria_penilaian'] ?></td>
                                <td><?= $getdata['nama_kriteria_penilaian'] ?></td>
                                <td><?= $getdata['nilai_prioritas_kriteria'] ?></td>
                                <td>
                                    <!-- <a href="?page=kriteriapenilaian&action=editdata&id=<?= $getdata['id_dt_kriteria_penilaian'] ?>" class="btn btn-sm btn-primary text-white"><i class="fas fa-edit"></i></a> -->
                                    <button type="button" class="btn btn-sm btn-danger remove" title="Hapus" data-id="<?= $getdata['id_dt_kriteria_penilaian'] ?>" data-nama="<?= $getdata['nama_kriteria_penilaian'] ?>"><i class="fas fa-trash"></i></button>
                                </td>
                                <td>
                                    <a href="?page=subkriteriapenilaian&kriteria=<?= $getdata['id_dt_kriteria_penilaian'] ?>" class="btn btn-sm btn-secondary">Subkriteria</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>