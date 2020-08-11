<?php
$id_dt_jabatan = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT id_dt_jabatan, nama_jabatan, nama_divisi, kebutuhan_karyawan FROM `detail_jabatan` JOIN divisi ON detail_jabatan.id_divisi = divisi.id_divisi JOIN jabatan ON detail_jabatan.id_jabatan = jabatan.id_jabatan WHERE id_dt_jabatan = '$id_dt_jabatan'");
$getdata = mysqli_fetch_assoc($query);

$queryjumlahkaryawan = mysqli_query($koneksi, "SELECT COUNT(id_dt_jabatan) as jumlah FROM `karyawan` WHERE id_dt_jabatan = '$id_dt_jabatan'");

$getjumlahkaryawan = mysqli_fetch_assoc($queryjumlahkaryawan);

$kekosongan = intval($getdata['kebutuhan_karyawan']) - intval($getjumlahkaryawan['jumlah']);



$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    die;


    if ($sql) {
        $_SESSION['message'] = 'Data berhasil di tambahkan';
        $_SESSION['title'] = 'Data Rekrutmen';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal di tambahkan';
        $_SESSION['title'] = 'Data Rekrutmen';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=penerimaan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Form Permintaan Karyawan Baru</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="posisi_dibutuhkan">Posisi yang dibutuhkan</label>
                    <input type="posisi_dibutuhkan" class="form-control" id="posisi_dibutuhkan" name="posisi_dibutuhkan" value="<?= $getdata['nama_jabatan'] . ' ' . $getdata['nama_divisi'] ?>" data-required-error="Data tidak boleh kosong" required readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="jumlah_dibutuhkan">Jumlah yang dibutuhkan </label>
                    <input type="jumlah_dibutuhkan" class="form-control" id="jumlah_dibutuhkan" name="jumlah_dibutuhkan" value="<?= $kekosongan ?>" data-required-error="Data tidak boleh kosong" required readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="jumlah_karyawan_sekarang">Jumlah karyawan sekarang </label>
                    <input type="jumlah_karyawan_sekarang" class="form-control" id="jumlah_karyawan_sekarang" name="jumlah_karyawan_sekarang" value="<?= $getjumlahkaryawan['jumlah'] ?>" data-required-error="Data tidak boleh kosong" required readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="file_fpkb">File FPKB </label>
                    <div class="col-sm-12 custom-file">
                        <input type="file" id="file_fpkb" name="file_fpkb" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
                        <label class="custom-file-label" for="skpk">
                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                            </span>
                        </label>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=fpkb' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    var _validFileExtensions = [".pdf", ".docx"];

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