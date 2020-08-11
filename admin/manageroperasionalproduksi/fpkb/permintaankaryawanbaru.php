<?php
$id_jabatan = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT id_jabatan, nama_jabatan, nama_divisi, jumlah_jabatan FROM `jabatan` JOIN divisi ON jabatan.id_divisi = divisi.id_divisi WHERE id_jabatan = '$id_jabatan'");
$getdata = mysqli_fetch_assoc($query);

$queryjumlahkaryawan = mysqli_query($koneksi, "SELECT COUNT(id_jabatan) as jumlah FROM `karyawan` WHERE id_jabatan = '$id_jabatan'");

$getjumlahkaryawan = mysqli_fetch_assoc($queryjumlahkaryawan);

$kekosongan = intval($getdata['jumlah_jabatan']) - intval($getjumlahkaryawan['jumlah']);



$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $posisi_dibutuhkan = htmlspecialchars(ucwords($_POST['posisi_dibutuhkan']));
    $jumlah_dibutuhkan = htmlspecialchars($_POST['jumlah_dibutuhkan']);
    $jumlah_karyawan = htmlspecialchars($_POST['jumlah_karyawan']);
    $pendidikan_formal = htmlspecialchars(ucwords($_POST['pendidikan_formal']));
    $pengalaman = htmlspecialchars(ucwords($_POST['pengalaman']));
    $kompetensi = htmlspecialchars(ucwords($_POST['kompetensi']));
    $usia = htmlspecialchars(ucwords($_POST['usia']));
    $job_desc = htmlspecialchars(ucwords($_POST['job_desc']));

    $id_karyawan = $_SESSION['id_karyawan'];
    $date = date('Y-m-d');

    $sql = mysqli_query($koneksi, "INSERT INTO `fpkb`(`id_jabatan`,`id_karyawan`, `posisi_dibutuhkan`, `jumlah_dibutuhkan`, `jumlah_karyawan`, `tanggal_permintaan`, `pendidikan_formal`, `pengalaman`, `kompetensi`, `usia`,  `job_desc`) VALUES ('$id_jabatan','$id_karyawan', '$posisi_dibutuhkan', '$jumlah_dibutuhkan', '$jumlah_karyawan' , '$date', '$pendidikan_formal', '$pengalaman', '$kompetensi', '$usia', '$job_desc')");

    if ($sql) {
        $_SESSION['message'] = 'Permintaan Karyawan Berhasil Diajukan';
        $_SESSION['title'] = 'Data FPKB';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Permintaan Karyawan Gagal Diajukan';
        $_SESSION['title'] = 'Data FPKB';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=fpkb';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Form Permintaan Karyawan Baru</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form" enctype="multipart/form-data">

                <div class="form-group has-feedback">
                    <label for="posisi_dibutuhkan">Posisi yang dibutuhkan</label>
                    <input type="text" class="form-control" id="posisi_dibutuhkan" name="posisi_dibutuhkan" value="<?= $getdata['nama_jabatan'] . ' ' . $getdata['nama_divisi'] ?>" data-required-error="Data tidak boleh kosong" required readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="jumlah_dibutuhkan">Jumlah yang dibutuhkan </label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="jumlah_dibutuhkan" name="jumlah_dibutuhkan" value="<?= $kekosongan ?>" data-required-error="Data tidak boleh kosong" required readonly>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="jumlah_karyawan">Jumlah karyawan sekarang </label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="jumlah_karyawan" name="jumlah_karyawan" value="<?= $getjumlahkaryawan['jumlah'] ?>" data-required-error="Data tidak boleh kosong" required readonly>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="pendidikan_formal">Pendidikan Formal </label>
                    <input type="text" class="form-control" id="pendidikan_formal" name="pendidikan_formal" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="pengalaman">Pengalaman</label>
                    <input type="text" class="form-control" id="pengalaman" name="pengalaman" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="kompetensi">Kompetensi</label>
                    <input type="text" class="form-control" id="kompetensi" name="kompetensi" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="usia">Usia</label>
                    <input type="text" class="form-control" id="usia" name="usia" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="job_desc">Deskripsi Pekerjaan</label>
                    <textarea name="job_desc" id="job_desc" rows="6" class="form-control" data-required-error="Data tidak boleh kosong" required></textarea>
                    <span class="help-block with-errors"></span>
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