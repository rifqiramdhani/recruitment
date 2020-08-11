<?php
$id_jabatan = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT id_jabatan, nama_jabatan, nama_divisi, jumlah_jabatan FROM `jabatan` JOIN divisi ON jabatan.id_divisi = divisi.id_divisi WHERE id_jabatan = '$id_jabatan'");
$getdata = mysqli_fetch_assoc($query);

$queryjumlahkaryawan = mysqli_query($koneksi, "SELECT COUNT(id_jabatan) as jumlah FROM `karyawan` WHERE id_jabatan = '$id_jabatan'");

$getjumlahkaryawan = mysqli_fetch_assoc($queryjumlahkaryawan);

$kekosongan = intval($getdata['jumlah_jabatan']) - intval($getjumlahkaryawan['jumlah']);



$queryJabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan`");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $posisi_dibutuhkan = htmlspecialchars($_POST['posisi_dibutuhkan']);
    $jumlah_dibutuhkan = htmlspecialchars($_POST['jumlah_dibutuhkan']);
    $jumlah_karyawan = htmlspecialchars($_POST['jumlah_karyawan']);
    $nama_file_fpkb = $_FILES['nama_file_fpkb'];
    $id_karyawan = $_SESSION['id_karyawan'];
    $date = date('Y-m-d');

    // ekstensi yang diijinkan
    $ekstensi_diijinkan = ['pdf', 'docx'];

    //nama_file_fpkb
    $name_nama_file_fpkb = explode('.', $nama_file_fpkb['name']);
    $eks_nama_file_fpkb = strtolower(end($name_nama_file_fpkb));
    $cek_eks_nama_file_fpkb = in_array($eks_nama_file_fpkb, $ekstensi_diijinkan);
    $random_nama_file_fpkb = random_name($nama_file_fpkb['name']);

    //name folder
    $folder = "../assets/file/";
    //move from temp to folder
    move_uploaded_file($nama_file_fpkb["tmp_name"], $folder . $random_nama_file_fpkb);

    $sql = mysqli_query($koneksi, "INSERT INTO `fpkb`(`id_karyawan`, `nama_file_fpkb`, `posisi_dibutuhkan`, `jumlah_dibutuhkan`, `jumlah_karyawan`, `tanggal_permintaan`) VALUES ('$id_karyawan', '$random_nama_file_fpkb', '$posisi_dibutuhkan', '$jumlah_dibutuhkan', '$jumlah_karyawan' , '$date')");


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
                    <label for="jumlah_karyawan">Jumlah karyawan sekarang </label>
                    <input type="jumlah_karyawan" class="form-control" id="jumlah_karyawan" name="jumlah_karyawan" value="<?= $getjumlahkaryawan['jumlah'] ?>" data-required-error="Data tidak boleh kosong" required readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="nama_file_fpkb">File FPKB </label>
                    <div class="col-sm-12 custom-file">
                        <input type="file" id="nama_file_fpkb" name="nama_file_fpkb" class=" custom-file-input" onchange="validate(this);" data-required-error="Data tidak boleh kosong" required>
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