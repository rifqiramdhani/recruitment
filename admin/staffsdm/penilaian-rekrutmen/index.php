<?php
$query = mysqli_query($koneksi, "SELECT * FROM `recruitment` WHERE status_recruitment = 1");

$queryrec = mysqli_query($koneksi, "SELECT calon_karyawan.*, id_recruitment_fore FROM `detail_recruitment` JOIN calon_karyawan ON id_calon_karyawan_fore = id_calon_karyawan WHERE id_recruitment_fore = 9");

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <div class="form-group">
        <select id="selectrecruitment" class="form-control col-3">
            <option value="">-Pilih Rekrutmen-</option>
            <?php while ($getrecruitment = mysqli_fetch_assoc($query)) : ?>
                <option value="<?= $getrecruitment['id_recruitment'] ?>"><?= $getrecruitment['nama_recruitment'] ?></option>
            <?php endwhile ?>

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
                <table class="table table-striped table-bordered text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="penilaianck">
                        <tr>
                            <td colspan="7">No data available in table</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>