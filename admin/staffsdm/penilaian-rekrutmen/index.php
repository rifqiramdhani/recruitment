<?php
$query = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE status_rekrutmen = 0");

$queryrek = mysqli_query($koneksi, "SELECT id_rekrutmen FROM `rekrutmen` WHERE status_rekrutmen = 1 ORDER BY id_rekrutmen ASC LIMIT 1");
$getrek = mysqli_fetch_assoc($queryrek);
$id_recruitment = $getrek['id_rekrutmen'];

$queryck = mysqli_query($koneksi, "SELECT calon_karyawan.*, id_rekrutmen FROM `penilaian_rekrutmen` JOIN calon_karyawan ON penilaian_rekrutmen.id_calon_karyawan = calon_karyawan.id_calon_karyawan WHERE id_rekrutmen = '$id_recruitment'");

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <div class="form-group row ml-1">
        <select id="selectrecruitment" class="form-control col-3">
            <?php $i = 1;
            while ($getrecruitment = mysqli_fetch_assoc($query)) : ?>
                <option value="<?= $getrecruitment['id_rekrutmen'] ?>" <?php if ($i == 1) echo 'selected' ?>><?= $getrecruitment['nama_rekrutmen'] ?></option>
            <?php $i++;
            endwhile ?>
        </select>

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
        <div class="card-header"><strong>Data Penilaian Rekrutmen</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Telah Dinilai</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="penilaianck">

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="col-12" id="tampilkanpenilaian">
    
</div>