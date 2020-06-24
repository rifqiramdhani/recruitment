<?php
$id_fpkb = $_GET['fpkb'];

$query = mysqli_query($koneksi, "SELECT * FROM `fpkb` WHERE id_fpkb = '$id_fpkb'");
$getdata = mysqli_fetch_assoc($query);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_file_fpkb = $_FILES['nama_file_fpkb'];
    $nama_old_file = $getdata['nama_file_fpkb'];

    if(!empty($nama_file_fpkb)){
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

        //file unlink
        $file_unlink = $folder.$nama_old_file;
        unlink($file_unlink);

        $sql = mysqli_query($koneksi, "UPDATE `fpkb` SET `nama_file_fpkb`='$random_nama_file_fpkb' WHERE id_fpkb = '$id_fpkb'");

        if ($sql) {
            $_SESSION['message'] = 'Form Permintaan Karyawan Berhasil Diperbaharui';
            $_SESSION['title'] = 'Data FPKB';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Form Permintaan Karyawan Gagal Diperbaharui';
            $_SESSION['title'] = 'Data FPKB';
            $_SESSION['type'] = 'error';
        }

        echo "<script>window.location.href = '?page=fpkb';</script>";
    }
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-lg-6 col-md-12 ">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Edit Form Permintaan Karyawan Baru</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form" enctype="multipart/form-data">

                <div class="form-group has-feedback">
                    <label for="posisi_dibutuhkan">Posisi yang dibutuhkan</label>
                    <input type="text" class="form-control" id="posisi_dibutuhkan" name="posisi_dibutuhkan" value="<?= $getdata['posisi_dibutuhkan'] ?>" readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="jumlah_dibutuhkan">Jumlah yang dibutuhkan</label>
                    <input type="text" class="form-control" id="jumlah_dibutuhkan" name="jumlah_dibutuhkan" value="<?= $getdata['jumlah_dibutuhkan'] ?>" readonly>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="jumlah_dibutuhkan">File FPKB</label>
                    <div class="col-sm-12 custom-file">
                        <input type="file" id="nama_file_fpkb" name="nama_file_fpkb" class=" custom-file-input" onchange="validate(this);" required>
                        <label class="custom-file-label" for="nama_file_fpkb">
                            <span class="d-inline-block text-truncate w-75">Choose file<br>
                            </span>
                        </label>
                    </div>
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
    //file input validation
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