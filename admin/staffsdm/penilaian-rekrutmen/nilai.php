<?php

$id_calon_karyawan = $_GET['calon_karyawan'];
$id_recruitment = $_GET['penerimaan'];

$queryck = mysqli_query($koneksi, "SELECT * FROM `calon_karyawan` WHERE id_calon_karyawan = '$id_calon_karyawan'");
$getdatack = mysqli_fetch_assoc($queryck);

$queryfile = mysqli_query($koneksi, "SELECT * FROM `file_calon_karyawan` WHERE id_rekrutmen = '$id_recruitment' AND id_calon_karyawan = '$id_calon_karyawan'");
$getdatafile = mysqli_fetch_assoc($queryfile);

$querykrit = mysqli_query($koneksi, "SELECT kriteria_rekrutmen.*, nama_kriteria_rekrutmen FROM `kriteria_rekrutmen` JOIN detail_kriteria_rekrutmen ON kriteria_rekrutmen.id_dt_krt_rekt = detail_kriteria_rekrutmen.id_dt_krt_rekt WHERE id_rekrutmen = '$id_recruitment' AND status_kriteria = 1");

$querynilai = mysqli_query($koneksi, "SELECT * FROM `penilaian_rekrutmen` WHERE id_rekrutmen = '$id_recruitment' AND id_calon_karyawan = '$id_calon_karyawan'");
$getnilai = mysqli_fetch_assoc($querynilai);

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-sm-12 mb-3">
    <a href="?page=penilaian-rekrutmen" class="btn btn-warning btn-sm"><i class="fas fa-reply"></i> Kembali</a>
</div>
<div class="col-sm-6">

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
        <div class="card-header"><strong>Berkas Calon Karyawan - <?= $getdatack['nama_calon_karyawan'] ?></strong></div>
        <div class="card-body">
            <form class="">
                <!-- formulir_lamaran -->
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Formulir Lamaran</label>
                    <div class="col-sm-8">
                        : <a href="<?= BASE_URL ?>frontend/assets/file/<?= $getdatafile['file_formulir_lamaran'] ?>" class="btn btn-link">
                            Formulir Lamaran.pdf
                        </a>
                    </div>
                </div>
                <!-- cv -->
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">CV (Curiculu Vitae)</label>
                    <div class="col-sm-8">
                        : <a href="<?= BASE_URL ?>frontend/assets/file/<?= $getdatafile['file_cv'] ?>" class="btn btn-link">
                            CV.pdf
                        </a>
                    </div>
                </div>

                <!-- ktp -->
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">KTP (Kartu Tanda Penduduk)</label>
                    <div class="col-sm-8">
                        : <a href="<?= BASE_URL ?>frontend/assets/file/<?= $getdatafile['file_ktp'] ?>" class="btn btn-link">
                            KTP.pdf
                        </a>
                    </div>
                </div>

                <!-- akta_kelahiran -->
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Akta Kelahiran</label>
                    <div class="col-sm-8">
                        : <a href="<?= BASE_URL ?>frontend/assets/file/<?= $getdatafile['file_akta_kelahiran'] ?>" class="btn btn-link">
                            Akta Kelahiran.pdf
                        </a>
                    </div>
                </div>

                <!-- kartu_keluarga -->
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">KK (Kartu Keluarga)</label>
                    <div class="col-sm-8">
                        : <a href="<?= BASE_URL ?>frontend/assets/file/<?= $getdatafile['file_kartu_keluarga'] ?>" class="btn btn-link">
                            KK (Kartu Keluarga).pdf
                        </a>
                    </div>
                </div>

                <!-- ijazah -->
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Lembar Ijazah dan Transkrip Nilai</label>
                    <div class="col-sm-8">
                        : <a href="<?= BASE_URL ?>frontend/assets/file/<?= $getdatafile['file_ijazah'] ?>" class="btn btn-link">
                            Lembar Ijazah dan Transkrip Nilai.pdf
                        </a>
                    </div>
                </div>

                <!-- skpk -->
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Surat Keterangan Pengalaman Kerja</label>
                    <div class="col-sm-8">
                        : <a href="<?= BASE_URL ?>frontend/assets/file/<?= $getdatafile['file_ijazah'] ?>" class="btn btn-link">
                            Surat Keterangan Pengalaman Kerja.pdf
                        </a>
                    </div>
                </div>

                <!-- pas_foto -->
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Pas Foto 3x4 Berwarna</label>
                    <div class="col-sm-8">
                        : <a href="<?= BASE_URL ?>frontend/assets/file/<?= $getdatafile['file_pas_foto'] ?>" class="btn btn-link">
                            Pas Foto 3x4 Berwarna.jpg
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Penilaian - <?= $getdatack['nama_calon_karyawan'] ?></strong></div>
        <div class="card-body">
            <?php if ($getnilai['vector_s'] == 0) : ?>
                <form action="<?= $level ?>/penilaian-rekrutmen/proses-penilaian-s.php" method="post" data-toggle="validator" role="form">
                    <?php while ($getkrit = mysqli_fetch_assoc($querykrit)) : ?>
                        <div class="form-group row has-feedback">
                            <label class="col-sm-4 col-form-label"><?= $getkrit['nama_kriteria_rekrutmen'] ?></label>
                            <input type="hidden" class="col-2" name="id_kriteria[]" value="<?= $getkrit['id_krt_rekt'] ?>">
                            <div class="col-sm-8">
                                <?php
                                $id_kriteria = $getkrit['id_krt_rekt'];
                                $querysubkrit = mysqli_query($koneksi, "SELECT * FROM `subkriteria_rekrutmen` WHERE id_kriteria_rekrutmen = '$id_kriteria' ORDER BY nama_subkriteria ASC");
                                ?>
                                <?php if (mysqli_num_rows($querysubkrit) > 0) : ?>
                                    <select name="nilaisub[]" class="form-control" data-required-error="Data tidak boleh kosong" required>
                                        <option value="">-Pilih <?= $getkrit['nama_kriteria_rekrutmen'] ?> -</option>
                                        <?php while ($getsubkrit = mysqli_fetch_assoc($querysubkrit)) : ?>
                                            <option value="<?= $getsubkrit['id_subkriteria_rekrutmen'] ?>"><?= $getsubkrit['nama_subkriteria'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                <?php elseif ($getkrit['id_dt_krt_rekt'] == 'K010') : ?>
                                    <input type="text" name="nilaipsikotes" class="form-control" placeholder="Masukkan Nilai" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                <?php else : ?>
                                    <select name="nilai[]" class="form-control" data-required-error="Data tidak boleh kosong" required>
                                        <option value="">-Pilih Nilai-</option>
                                        <option value="1">Sangat Kurang</option>
                                        <option value="2">Kurang</option>
                                        <option value="3">Cukup</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select>

                                <?php endif ?>

                                <span class="glyphicon form-control-feedback mr-3" aria-hidden="true"></span>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="bobot_kriteria[]" value="<?= $getkrit['bobot_kriteria'] ?>">
                        </div>

                    <?php endwhile ?>

                    <div class="form-group">
                        <input type="hidden" name="id_calon_karyawan" value="<?= $id_calon_karyawan ?>">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id_recruitment" value="<?= $id_recruitment ?>">
                    </div>

                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-save"></i>
                            Simpan
                        </button>
                    </div>


                </form>
            <?php else : ?>
                <div class="alert alert-light" role="alert">
                    Calon karyawan telah dinilai
                </div>
            <?php endif ?>

        </div>
    </div>
</div>