<?php
$query = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_penilaian`");
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
        <div class="card-header"><strong>Data Subkriteria Penilaian</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datakriteriapenilaian">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Bobot</th>
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
                                    <a href="?page=perbandingansubkriteria&action=perbandingan&kriteria=<?= $getdata['id_dt_kriteria_penilaian'] ?>" class="btn btn-sm btn-primary"> Perbandingan Subkriteria</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>