<?php require('frontend/template/header.php') ?>
<?php require('frontend/template/top-section.php') ?>

<?php

$id_recruitment = $_GET['penerimaan'];
$query = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE id_rekrutmen= '$id_recruitment' AND status_rekrutmen = 1");
$getdata = mysqli_fetch_assoc($query);

$querydesk = mysqli_query($koneksi, "SELECT * FROM `desk_rekrutmen` WHERE id_rekrutmen = '$id_recruitment' AND tipe = 'deskripsi'");
$getdatadesk = mysqli_fetch_assoc($querydesk);

$querysyarat = mysqli_query($koneksi, "SELECT * FROM `desk_rekrutmen` WHERE id_rekrutmen = '$id_recruitment' AND tipe = 'persyaratan'");

if (mysqli_num_rows($query) == 0) {
    $_SESSION['message'] = 'Maaf data recruitment tidak ada!';
    $_SESSION['title'] = 'Peringatan!';
    $_SESSION['type'] = 'warning';
    header('location: index.php');
}

?>

<!-- show sweet alert -->
<?php if (isset($_SESSION['message'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
<?php
    unset($_SESSION['message']);
    unset($_SESSION['title']);
    unset($_SESSION['type']);
endif;
?>

</section>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><span>Home</span></a></li>
    <li class="breadcrumb-item active"><span>Detail</span></li>
</ol>
<section id="content-section">
    <div class="container">
        <div class="py-lg-5 py-3">
            <h3 class="text-center title-page mb-lg-4 mb-3">Lowongan Kerja <?= $getdata['nama_rekrutmen'] ?> PT. Bonli Cipta Sejahtera<br></h3>
            <div class="row">
                <div class="col-12">
                    <div class="card work-info">
                        <div class="card-body detail-job">
                            <div class="mb-5">
                                <h4><i class="fa fa-briefcase mr-3"></i>Deskripsi Pekerjaan</h4>
                                <hr>
                                <p>
                                    <?= $getdatadesk['deskripsi'] ?>
                                </p>
                            </div>
                            <div class="mb-5">
                                <h4><i class="fa fa-file-text mr-3"></i>Persyaratan</h4>
                                <hr>
                                <ul>
                                    <?php while ($getdatasyarat = mysqli_fetch_assoc($querysyarat)) : ?>
                                        <li><?= $getdatasyarat['deskripsi'] ?></li>
                                    <?php endwhile ?>
                                </ul>
                            </div>
                            <div class="mb-5">
                                <h4><i class="fa fa-download mr-3"></i>Download</h4>
                                <hr>
                                <a href="frontend/assets/file/FORMULIR_LAMARAN.doc" class="btn-link">formulir lamaran.docx</a>
                            </div>
                            <div class="col-12 text-center">
                                <a href="?page=form-lamaran&penerimaan=<?= $id_recruitment ?>" class="btn btn-success btn-sm">
                                    Lamar Sekarang
                                </a>
                                <a href="index.php#content-section" class="btn btn-warning btn-sm text-white">
                                    <i class="fa fa-reply text-white"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('frontend/template/footer.php') ?>