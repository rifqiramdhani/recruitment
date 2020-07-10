<?php require('frontend/template/header.php') ?>
<?php require('frontend/template/top-section-beranda.php') ?>

<?php
$query = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE status_rekrutmen = 1");

// var_dump($_SESSION);
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

<section id="content-section">
    <div class="container">
        <div class="py-lg-5 py-3">
            <h3 class="text-center title mb-lg-4 mb-3"><span>some info</span>Posisi Lowongan Kerja<br></h3>
            <div class="row">
                <div class="col-lg-4 text-center"><img class="img-fluid" src="frontend/assets/img/job-1.jpg"></div>
                <div class="col-lg-8">
                    <?php if (mysqli_num_rows($query) > 0) : ?>
                        <?php while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <?php
                            $id_recruitment = $getdata['id_rekrutmen'];

                            $querydesk = mysqli_query($koneksi, "SELECT * FROM `desk_rekrutmen` WHERE id_rekrutmen = '$id_recruitment' AND tipe = 'deskripsi'");
                            $getdatadesk = mysqli_fetch_assoc($querydesk);
                            ?>
                            <div class="row job-list">
                                <div class="col-md-9 job-info text-left">
                                    <div>
                                        <div class="job-icon"><i class="fa fa-briefcase"></i></div>
                                        <div class="job-description">
                                            <h4 class="job-info">
                                                <?= $getdata['nama_rekrutmen'] ?>
                                            </h4>
                                            <p><b>PT Bonli Cipta Sejahtera</b><br><br></p>
                                            <p>
                                                <?= substr($getdatadesk['deskripsi'], 0, 150). '....' ?>
                                            </p>
                                        </div>
                                        <!-- <div class="col-12">
                                            <ul class="d-flex justify-content-center job-info">
                                                <li><i class="fa fa-map-marker"></i>&nbsp;Lembang</li>
                                                
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-3 job-info-right text-right">
                                    <a class="btn-apply" href="?page=detail&penerimaan=<?= $getdata['id_rekrutmen'] ?>">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php else : ?>
                        <div class="row job-list">
                            <div class="col-md-12 job-info text-left">
                                <div>
                                    <div class="job-icon"><i class="fa fa-briefcase"></i></div>
                                    <div class="job-description">
                                        <p>Tidak ada daftar rekrutmen<br></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php require('frontend/template/footer.php') ?>