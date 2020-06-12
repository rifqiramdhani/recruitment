<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');


function random_name($name)
{
    // mengacak angka untuk nama file
    $acak = rand(00000000, 99999999);

    $ImageExt       = substr($name, strrpos($name, '.'));
    $ImageExt       = str_replace('.', '', $ImageExt); // Extension
    $name      = preg_replace("/\.[^.\s]{3,4}$/", "", $name);
    $NewImageName   = $acak . '.' . $ImageExt;
    return $NewImageName;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_recruitment_fore = $_POST['id_recruitment'];
    $id_calon_karyawan_fore = $_SESSION['id_calon_karyawan'];
    $formulir_lamaran = $_FILES['formulir_lamaran'];
    $cv = $_FILES['cv'];
    $ktp = $_FILES['ktp'];
    $akta_kelahiran = $_FILES['akta_kelahiran'];
    $kartu_keluarga = $_FILES['kartu_keluarga'];
    $ijazah = $_FILES['ijazah'];
    $skpk = $_FILES['skpk'];
    $pas_foto = $_FILES['pas_foto'];

    // ekstensi yang diijinkan
    $ekstensi_diijinkan = ['pdf', 'jpeg', 'png', 'jpg'];

    //formulir_lamaran
    $name_formulir_lamaran = explode('.', $formulir_lamaran['name']);
    $eks_formulir_lamaran = strtolower(end($name_formulir_lamaran));
    $cek_eks_formulir_lamaran = in_array($eks_formulir_lamaran, $ekstensi_diijinkan);
    $random_formulir_lamaran = random_name($formulir_lamaran['name']);

    //cv
    $name_cv = explode('.', $cv['name']);
    $eks_cv = strtolower(end($name_cv));
    $cek_eks_cv = in_array($eks_cv, $ekstensi_diijinkan);
    $random_cv = random_name($cv['name']);

    //ktp
    $name_ktp = explode('.', $ktp['name']);
    $eks_ktp = strtolower(end($name_ktp));
    $cek_eks_ktp = in_array($eks_ktp, $ekstensi_diijinkan);
    $random_ktp = random_name($ktp['name']);

    //akta_kelahiran
    $name_akta_kelahiran = explode('.', $akta_kelahiran['name']);
    $eks_akta_kelahiran = strtolower(end($name_akta_kelahiran));
    $cek_eks_akta_kelahiran = in_array($eks_akta_kelahiran, $ekstensi_diijinkan);
    $random_akta_kelahiran = random_name($akta_kelahiran['name']);

    //kartu_keluarga
    $name_kartu_keluarga = explode('.', $kartu_keluarga['name']);
    $eks_kartu_keluarga = strtolower(end($name_kartu_keluarga));
    $cek_eks_kartu_keluarga = in_array($eks_kartu_keluarga, $ekstensi_diijinkan);
    $random_kartu_keluarga = random_name($kartu_keluarga['name']);

    //ijazah
    $name_ijazah = explode('.', $ijazah['name']);
    $eks_ijazah = strtolower(end($name_ijazah));
    $cek_eks_ijazah = in_array($eks_ijazah, $ekstensi_diijinkan);
    $random_ijazah = random_name($ijazah['name']);

    //skpk
    $name_skpk = explode('.', $skpk['name']);
    $eks_skpk = strtolower(end($name_skpk));
    $cek_eks_skpk = in_array($eks_skpk, $ekstensi_diijinkan);
    $random_skpk = random_name($skpk['name']);

    //pas_foto
    $name_pas_foto = explode('.', $pas_foto['name']);
    $eks_pas_foto = strtolower(end($name_pas_foto));
    $cek_eks_pas_foto = in_array($eks_pas_foto, $ekstensi_diijinkan);
    $random_pas_foto = random_name($pas_foto['name']);


    $folder = "../assets/file/";

    if ($cek_eks_formulir_lamaran & $cek_eks_cv & $cek_eks_ktp & $cek_eks_akta_kelahiran & $cek_eks_kartu_keluarga & $cek_eks_ijazah & $cek_eks_skpk) {
        echo $random_formulir_lamaran . '<br>';
        echo $random_cv . '<br>';
        echo $random_ktp . '<br>';
        echo $random_akta_kelahiran . '<br>';
        echo $random_kartu_keluarga . '<br>';
        echo $random_ijazah . '<br>';
        echo $random_pas_foto . '<br>';
        echo $_SESSION['id_calon_karyawan'] . '<br>';


        mysqli_begin_transaction($koneksi, MYSQLI_TRANS_START_READ_ONLY);

        //insert formulir_lamaran
        $sql1 = mysqli_query($koneksi, "INSERT INTO `file_calon_karyawan`(`id_recruitment_fore`, `id_calon_karyawan_fore`, `nama_file_calon_karyawan`) VALUES ('$id_recruitment_fore','$id_calon_karyawan_fore','$random_formulir_lamaran')");
        move_uploaded_file($formulir_lamaran["tmp_name"], $folder . $random_formulir_lamaran);

        //insert cv
        $sql2 = mysqli_query($koneksi, "INSERT INTO `file_calon_karyawan`(`id_recruitment_fore`, `id_calon_karyawan_fore`, `nama_file_calon_karyawan`) VALUES ('$id_recruitment_fore','$id_calon_karyawan_fore','$random_cv')");
        move_uploaded_file($formulir_lamaran["tmp_name"], $folder . $random_cv);

        // insert ktp
        $sql3 = mysqli_query($koneksi, "INSERT INTO `file_calon_karyawan`(`id_recruitment_fore`, `id_calon_karyawan_fore`, `nama_file_calon_karyawan`) VALUES ('$id_recruitment_fore','$id_calon_karyawan_fore','$random_ktp')");
        move_uploaded_file($formulir_lamaran["tmp_name"], $folder . $random_ktp);

        //insert akta_kelahiran
        $sql4 = mysqli_query($koneksi, "INSERT INTO `file_calon_karyawan`(`id_recruitment_fore`, `id_calon_karyawan_fore`, `nama_file_calon_karyawan`) VALUES ('$id_recruitment_fore','$id_calon_karyawan_fore','$random_akta_kelahiran')");
        move_uploaded_file($formulir_lamaran["tmp_name"], $folder . $random_akta_kelahiran);

        //insert kartu keluarga
        $sql5 = mysqli_query($koneksi, "INSERT INTO `file_calon_karyawan`(`id_recruitment_fore`, `id_calon_karyawan_fore`, `nama_file_calon_karyawan`) VALUES ('$id_recruitment_fore','$id_calon_karyawan_fore','$random_kartu_keluarga')");
        move_uploaded_file($formulir_lamaran["tmp_name"], $folder . $random_kartu_keluarga);

        //insert ijazah
        $sql6 = mysqli_query($koneksi, "INSERT INTO `file_calon_karyawan`(`id_recruitment_fore`, `id_calon_karyawan_fore`, `nama_file_calon_karyawan`) VALUES ('$id_recruitment_fore','$id_calon_karyawan_fore','$random_ijazah')");
        move_uploaded_file($formulir_lamaran["tmp_name"], $folder . $random_ijazah);

        //insert pas_foto
        $sql7 = mysqli_query($koneksi, "INSERT INTO `file_calon_karyawan`(`id_recruitment_fore`, `id_calon_karyawan_fore`, `nama_file_calon_karyawan`) VALUES ('$id_recruitment_fore','$id_calon_karyawan_fore','$random_pas_foto')");
        move_uploaded_file($formulir_lamaran["tmp_name"], $folder . $random_pas_foto);


        if ($sql1 & $sql2 & $sql3 & $sql4 & $sql5 & $sql6 & $sql7) {
            mysqli_commit($koneksi);
            $_SESSION['message'] = 'Berkas berhasil disimpan, silahkan menunggu email dari kami untuk keputusan lebih lanjut.';
            $_SESSION['title'] = 'Data lamaran';
            $_SESSION['type'] = 'success';
            redirect('index.php?page=detail&penerimaan='. $id_recruitment_fore);
        } else {
            mysqli_rollback($koneksi);
            $_SESSION['message'] = 'Maaf berkas gagal disimpah, silahkan coba kembali!';
            $_SESSION['title'] = 'Data lamaran';
            $_SESSION['type'] = 'error';
            redirect('index.php?page=detail&penerimaan=' . $id_recruitment_fore);
        }

        mysqli_close($koneksi);

    } else {
        $_SESSION['message'] = 'Maaf Hanya Boleh File yang Berekstensi : .pdf, .jpg, .jpeg, .png!';
        $_SESSION['title'] = 'Login';
        $_SESSION['type'] = 'error';
        redirect('index.php');
    }

}
