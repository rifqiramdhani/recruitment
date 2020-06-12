<?php require('frontend/template/header.php') ?>
<?php require('frontend/template/top-section.php') ?>

<?php

if(!isset($_SESSION['login_calon_karyawan'])){
    $_SESSION['message'] = 'Maaf anda harus login terlebih dahulu';
    $_SESSION['title'] = 'Peringatan!';
    $_SESSION['type'] = 'warning';
    header('location: index.php');
}

$id_recruitment = $_GET['penerimaan'];
$id_calon_karyawan_fore = $_SESSION['id_calon_karyawan'];


$query = mysqli_query($koneksi, "SELECT * FROM `recruitment` WHERE id_recruitment= '$id_recruitment' AND status_recruitment = 1");

if (mysqli_num_rows($query) == 0) {
    $_SESSION['message'] = 'Maaf data recruitment tidak ada!';
    $_SESSION['title'] = 'Peringatan!';
    $_SESSION['type'] = 'warning';
    header('location: index.php');
}

$cek_file_ck = mysqli_query($koneksi, "SELECT * FROM `file_calon_karyawan` WHERE id_recruitment_fore = '$id_recruitment' AND id_calon_karyawan_fore = '$id_calon_karyawan_fore' LIMIT 1");


if (mysqli_num_rows($cek_file_ck) > 0) {
    $_SESSION['message'] = 'Maaf anda telah melakukan pengisian form lamaran!';
    $_SESSION['title'] = 'Peringatan!';
    $_SESSION['type'] = 'warning';
    header('location: index.php?page=detail&penerimaan='. $id_recruitment);
}

$getdata = mysqli_fetch_assoc($query);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><span>Home</span></a></li>
    <li class="breadcrumb-item active"><span>Form Lamaran</span></li>
</ol>
<section id="content-section">
    <div class="container">
        <div class="py-lg-5 py-3">
            <h3 class="text-center title-page mb-lg-4 mb-3">Lowongan Kerja <?= $getdata['nama_recruitment'] ?> PT. Bonli Cipta Sejahtera<br></h3>
            <div class="row">
                <div class="col-12">
                    <div class="card work-info">
                        <div class="card-body detail-job">
                            <h4 class="card-title text-center mb-5">Form Lamaran</h4>
                            <form action="frontend/olahdata/data_lamaran.php" method="post" enctype="multipart/form-data" role="form">
                                <div class="form-group">
                                    <input type="hidden" name="id_recruitment" value="<?= $id_recruitment ?>">
                                </div>
                                <!-- formulir_lamaran -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Formulir Lamaran <span style="font-family: cursive; color: red">*</span></label>
                                    <div class="col-sm-9 custom-file">
                                        <input type="file" id="formulir_lamaran" name="formulir_lamaran" class=" custom-file-input" onchange="validate(this);">
                                        <label class="custom-file-label" for="formulir_lamaran">
                                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- cv -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">CV (Curiculu Vitae) <span style="font-family: cursive; color: red">*</span></label>
                                    <div class="col-sm-9 custom-file">
                                        <input type="file" id="cv" name="cv" class=" custom-file-input" onchange="validate(this);">
                                        <label class="custom-file-label" for="cv">
                                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- ktp -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">KTP (Kartu Tanda Penduduk) <span style="font-family: cursive; color: red">*</span></label>
                                    <div class="col-sm-9 custom-file">
                                        <input type="file" id="ktp" name="ktp" class=" custom-file-input" onchange="validate(this);">
                                        <label class="custom-file-label" for="ktp">
                                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- akta_kelahiran -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Akta Kelahiran <span style="font-family: cursive; color: red">*</span></label>
                                    <div class="col-sm-9 custom-file">
                                        <input type="file" id="akta_kelahiran" name="akta_kelahiran" class=" custom-file-input" onchange="validate(this);">
                                        <label class="custom-file-label" for="akta_kelahiran">
                                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- kartu_keluarga -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">KK (Kartu Keluarga) <span style="font-family: cursive; color: red">*</span></label>
                                    <div class="col-sm-9 custom-file">
                                        <input type="file" id="kartu_keluarga" name="kartu_keluarga" class=" custom-file-input" onchange="validate(this);">
                                        <label class="custom-file-label" for="kartu_keluarga">
                                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- ijazah -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Lembar Ijazah dan Transkrip Nilai <span style="font-family: cursive; color: red">*</span></label>
                                    <div class="col-sm-9 custom-file">
                                        <input type="file" id="ijazah" name="ijazah" class=" custom-file-input" onchange="validate(this);">
                                        <label class="custom-file-label" for="ijazah">
                                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- skpk -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Surat Keterangan Pengalaman Kerja <span style="font-family: cursive; color: red">*</span></label>
                                    <div class="col-sm-9 custom-file">
                                        <input type="file" id="skpk" name="skpk" class=" custom-file-input" onchange="validate(this);">
                                        <label class="custom-file-label" for="skpk">
                                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- pas_foto -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pas Foto 3x4 Berwarna <span style="font-family: cursive; color: red">*</span></label>
                                    <div class="col-sm-9 custom-file">
                                        <input type="file" id="pas_foto" name="pas_foto" class=" custom-file-input" onchange="validate(this);">
                                        <label class="custom-file-label" for="pas_foto">
                                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- catatan aja -->
                                <div class="form-group">
                                    <div>
                                        <p class="text-danger">Catatan :</p>
                                        <ul class="text-danger">
                                            <li>Download Formulir Lamaran Dihalaman Detail</li>
                                            <li>Format Lampiran Wajib .pdf</li>
                                            <li>Pas Foto Lampirkan Dalam Bentuk jpg|jpeg|png</li>
                                            <li>Cek terlebih dahulu berkas yang di masukkan sebelum melakukan submit. Karena data tidak dapat diubah!</li>
                                            <li>
                                                <span style="font-family: cursive">*</span>
                                                Wajib diisi
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fa fa-save text-white"></i> Simpan
                                    </button>
                                    <a href="?page=detail&penerimaan=<?= $id_recruitment ?>" class="btn btn-warning text-white btn-sm" type="submit">
                                        <i class="fa fa-reply text-white"></i> Kembali
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var _validFileExtensions = [".pdf", ".jpg", ".jpeg", ".png"];

    function validate(file) {
        if (file.type == "file") {
            var sFileName = file.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Maaf Hanya Boleh File yang Berekstensi : " + _validFileExtensions.join(", "));
                    file.value = "";
                    return false;
                }
            }
        }
        return true;
    }
</script>
<?php require('frontend/template/footer.php') ?>