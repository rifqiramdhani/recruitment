<?php require('frontend/template/header.php') ?>
<?php require('frontend/template/top-section.php') ?>

<?php

$id_recruitment = $_GET['penerimaan'];
// $id_calon_karyawan_fore = $_SESSION['id_calon_karyawan'];


$query = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE id_rekrutmen= '$id_recruitment' AND status_rekrutmen = 1");

if (mysqli_num_rows($query) == 0) {
    $_SESSION['message'] = 'Maaf data rekrutmen tidak ada!';
    $_SESSION['title'] = 'Peringatan!';
    $_SESSION['type'] = 'warning';
    echo "<script>window.location.href = 'index.php';</script>";
}

// $cek_file_ck = mysqli_query($koneksi, "SELECT * FROM `file_calon_karyawan` WHERE id_rekrutmen = '$id_recruitment' AND id_calon_karyawan = '$id_calon_karyawan_fore' LIMIT 1");


// if (mysqli_num_rows($cek_file_ck) > 0) {
//     $_SESSION['message'] = 'Maaf anda telah melakukan pengisian form lamaran!';
//     $_SESSION['title'] = 'Peringatan!';
//     $_SESSION['type'] = 'warning';
//     echo "<script>window.location.href = 'index.php?page=detail&penerimaan=" . $id_recruitment . "';</script>";
// }

$getdata = mysqli_fetch_assoc($query);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><span>Beranda</span></a></li>
    <li class="breadcrumb-item active"><span>Form Lamaran</span></li>
</ol>
<section id="content-section">
    <div class="container">
        <div class="py-lg-5 py-3">
            <h3 class="text-center title-page mb-lg-4 mb-3">Lowongan Kerja <?= $getdata['nama_rekrutmen'] ?> PT. Bonli Cipta Sejahtera<br></h3>
            <div class="row">
                <div class="col-12">
                    <div class="card work-info">
                        <div class="card-body detail-job">
                            <h4 class="card-title text-center mb-5">Form Lamaran</h4>
                            <form action="frontend/olahdata/data_lamaran.php" method="post" enctype="multipart/form-data" role="form" id="myForm">

                                <!-- SmartWizard html -->
                                <div id="smartwizard">

                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#step-1">
                                                <strong>Tahap 1</strong> <br>Data diri
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#step-2">
                                                <strong>Tahap 2</strong> <br>Berkas lamaran
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                            <div id="form-step-0" role="form" data-toggle="validator">
                                                <div class="form-group row has-feedback">
                                                    <label class="col-sm-3 col-form-label" for="nama_calon_karyawan">Nama <span style="font-family: cursive; color: red">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="nama_calon_karyawan" name="nama_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                                                        <span class="help-block with-errors"></span>
                                                    </div>
                                                    <div class="col sm-1">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row has-feedback">
                                                    <label class="col-sm-3 col-form-label" for="alamat_calon_karyawan">Alamat Lengkap <span style="font-family: cursive; color: red">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="alamat_calon_karyawan" class="form-control" id="alamat_calon_karyawan" name="alamat_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                                                        <span class="help-block with-errors"></span>
                                                    </div>
                                                    <div class="col sm-1">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row has-feedback">
                                                    <label class="col-sm-3 col-form-label" for="kodepos_calon_karyawan">Kode pos<span style="font-family: cursive; color: red">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="kodepos_calon_karyawan" class="form-control" id="kodepos_calon_karyawan" name="kodepos_calon_karyawan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                                                        <span class="help-block with-errors"></span>
                                                    </div>
                                                    <div class="col sm-1">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row has-feedback">
                                                    <label class="col-sm-3 col-form-label" for="telp_calon_karyawan">No telepon<span style="font-family: cursive; color: red">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="telp_calon_karyawan" class="form-control" id="telp_calon_karyawan" name="telp_calon_karyawan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                                                        <span class="help-block with-errors"></span>
                                                    </div>
                                                    <div class="col sm-1">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row has-feedback">
                                                    <label class="col-sm-3 col-form-label" for="ttl_calon_karyawan">Tempat, tanggal lahir<span style="font-family: cursive; color: red">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="ttl_calon_karyawan" class="form-control" id="ttl_calon_karyawan" name="ttl_calon_karyawan" data-required-error="Data tidak boleh kosong" required>
                                                        <span class="help-block with-errors"></span>
                                                    </div>
                                                    <div class="col sm-1">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row has-feedback">
                                                    <label class="col-sm-3 col-form-label" for="status_pernikahan">Status Pernikahan<span style="font-family: cursive; color: red">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select data-required-error="Data tidak boleh kosong" required class="form-control" name="status_pernikahan" id="status_pernikahan">
                                                            <option value="">-Pilih Status Pernikahan-</option>
                                                            <option value="Menikah">Menikah</option>
                                                            <option value="Belum menikah">Belum menikah</option>
                                                        </select>
                                                        <span class="help-block with-errors"></span>
                                                    </div>
                                                    <div class="col sm-1">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row has-feedback">
                                                    <label class="col-sm-3 col-form-label" for="status_pendidikan">Status Pendidikan<span style="font-family: cursive; color: red">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select data-required-error="Data tidak boleh kosong" required class="form-control" name="status_pendidikan" id="status_pendidikan">
                                                            <option value="">-Pilih Status Pendidikan-</option>
                                                            <option value="SMU/SMK/SMA">SMU/SMK/SMA</option>
                                                            <option value="D1">D1</option>
                                                            <option value="D3">D3</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                        </select>
                                                        <span class="help-block with-errors"></span>
                                                    </div>
                                                    <div class="col sm-1">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row has-feedback">
                                                    <label class="col-sm-3 col-form-label" for="agama">Agama<span style="font-family: cursive; color: red">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select data-required-error="Data tidak boleh kosong" required class="form-control" name="agama" id="agama">
                                                            <option value="">-Pilih Agama-</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Protestan">Protestan</option>
                                                            <option value="Khatolik">Khatolik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Buddha">Buddha</option>
                                                            <option value="Khonghucu">Khonghucu</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                        <span class="help-block with-errors"></span>
                                                    </div>
                                                    <div class="col sm-1">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row has-feedback">
                                                    <label class="col-sm-3 col-form-label" for="email">Email<span style="font-family: cursive; color: red">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" id="email" name="email" data-required-error="Data tidak boleh kosong" required>
                                                        <span class="help-block with-errors"></span>
                                                    </div>
                                                    <div class="col sm-1">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                            <div id="form-step-1" role="form" data-toggle="validator">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_recruitment" value="<?= $id_recruitment ?>">
                                                    </div>
                                                    <!-- formulir_lamaran -->
                                                    <div class="form-group row has-feedback kebawah">
                                                        <label class="col-sm-3 col-form-label">Formulir Lamaran <span style="font-family: cursive; color: red">*</span></label>
                                                        <div class="col-sm-8 custom-file">
                                                            <input type="file" id="formulir_lamaran" name="formulir_lamaran" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
                                                            <label class="custom-file-label" for="formulir_lamaran">
                                                                <span class="d-inline-block text-truncate w-75">Choose file<br>
                                                                </span>
                                                            </label>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                        <div class="col sm-1">
                                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>

                                                    <!-- cv -->
                                                    <div class="form-group row has-feedback kebawah">
                                                        <label class="col-sm-3 col-form-label">CV (Curiculu Vitae) <span style="font-family: cursive; color: red">*</span></label>
                                                        <div class="col-sm-8 custom-file">
                                                            <input type="file" id="cv" name="cv" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
                                                            <label class="custom-file-label" for="cv">
                                                                <span class="d-inline-block text-truncate w-75">Choose file<br>
                                                                </span>
                                                            </label>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                        <div class="col sm-1">
                                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>

                                                    <!-- ktp -->
                                                    <div class="form-group row has-feedback kebawah">
                                                        <label class="col-sm-3 col-form-label">KTP (Kartu Tanda Penduduk) <span style="font-family: cursive; color: red">*</span></label>
                                                        <div class="col-sm-8 custom-file">
                                                            <input type="file" id="ktp" name="ktp" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
                                                            <label class="custom-file-label" for="ktp">
                                                                <span class="d-inline-block text-truncate w-75">Choose file<br>
                                                                </span>
                                                            </label>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                        <div class="col sm-1">
                                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>

                                                    <!-- akta_kelahiran -->
                                                    <div class="form-group row has-feedback kebawah">
                                                        <label class="col-sm-3 col-form-label">Akta Kelahiran <span style="font-family: cursive; color: red">*</span></label>
                                                        <div class="col-sm-8 custom-file">
                                                            <input type="file" id="akta_kelahiran" name="akta_kelahiran" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
                                                            <label class="custom-file-label" for="akta_kelahiran">
                                                                <span class="d-inline-block text-truncate w-75">Choose file<br>
                                                                </span>
                                                            </label>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                        <div class="col sm-1">
                                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>

                                                    <!-- kartu_keluarga -->
                                                    <div class="form-group row has-feedback kebawah">
                                                        <label class="col-sm-3 col-form-label">KK (Kartu Keluarga) <span style="font-family: cursive; color: red">*</span></label>
                                                        <div class="col-sm-8 custom-file">
                                                            <input type="file" id="kartu_keluarga" name="kartu_keluarga" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
                                                            <label class="custom-file-label" for="kartu_keluarga">
                                                                <span class="d-inline-block text-truncate w-75">Choose file<br>
                                                                </span>
                                                            </label>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                        <div class="col sm-1">
                                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>

                                                    <!-- ijazah -->
                                                    <div class="form-group row has-feedback">
                                                        <label class="col-sm-3 col-form-label">Lembar Ijazah dan Transkrip Nilai <span style="font-family: cursive; color: red">*</span></label>
                                                        <div class="col-sm-8 custom-file">
                                                            <input type="file" id="ijazah" name="ijazah" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
                                                            <label class="custom-file-label" for="ijazah">
                                                                <span class="d-inline-block text-truncate w-75">Choose file<br>
                                                                </span>
                                                            </label>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                        <div class="col sm-1">
                                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>

                                                    <!-- skpk -->
                                                    <div class="form-group row has-feedback">
                                                        <label class="col-sm-3 col-form-label">Surat Keterangan Pengalaman Kerja <span style="font-family: cursive; color: red">*</span></label>
                                                        <div class="col-sm-8 custom-file">
                                                            <input type="file" id="skpk" name="skpk" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
                                                            <label class="custom-file-label" for="skpk">
                                                                <span class="d-inline-block text-truncate w-75">Choose file<br>
                                                                </span>
                                                            </label>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                        <div class="col sm-1">
                                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>

                                                    <!-- pas_foto -->
                                                    <div class="form-group row has-feedback ">
                                                        <label class="col-sm-3 col-form-label">Pas Foto 3x4 Berwarna <span style="font-family: cursive; color: red">*</span></label>
                                                        <div class="col-sm-8 custom-file">
                                                            <input type="file" id="pas_foto" name="pas_foto" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
                                                            <label class="custom-file-label" for="pas_foto">
                                                                <span class="d-inline-block text-truncate w-75">Choose file<br>
                                                                </span>
                                                            </label>
                                                            <span class="help-block with-errors"></span>
                                                        </div>
                                                        <div class="col sm-1">
                                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>

                                                    <!-- catatan aja -->
                                                    <div class="form-group pt-5 mt-5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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