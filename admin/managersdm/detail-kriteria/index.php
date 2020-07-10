<?php
$query = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_rekrutmen` ORDER BY id_dt_krt_rekt ASC");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-8 col-md-6">
    <a href="?page=detail-kriteria&action=tambahdata" class="btn btn-success mt-3 mb-3">
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
        <div class="card-header"><strong>Data Detail Kriteria Rekrutmen</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datadetailkriteria">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_dt_krt_rekt'] ?>">
                                <td><?= $getdata['id_dt_krt_rekt'] ?></td>
                                <td><?= $getdata['nama_kriteria_rekrutmen'] ?></td>
                                <td>
                                    <a href="?page=detail-kriteria&action=editdata&id=<?= $getdata['id_dt_krt_rekt'] ?>" class="btn btn-sm btn-primary text-white"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger remove" title="Hapus" data-id="<?= $getdata['id_dt_krt_rekt'] ?>" data-nama="<?= $getdata['nama_kriteria_rekrutmen'] ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>