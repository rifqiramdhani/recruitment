<?php
$query = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE status_rekrutmen = 1");
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
        <div class="card-header"><strong>Data Rekrutmen Lowongan Kerja</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datalowongan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Rekrutmen</th>
                            <th>Tanggal Buka</th>
                            <th>Tanggal Tutup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_rekrutmen'] ?>">
                                <td><?= $i++; ?></td>
                                <td><?= $getdata['nama_rekrutmen'] ?></td>
                                <td><?= date('d-m-Y', strtotime($getdata['tanggal_buka'])) ?></td>
                                <td><?= date('d-m-Y', strtotime($getdata['tanggal_tutup'])) ?></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>