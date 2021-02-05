<?php
require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nilai = $_POST['nilai'];
    $bobot_kriteria = $_POST['bobot_kriteria'];
    $id_recruitment = $_POST['id_recruitment'];
    $id_calon_karyawan = $_POST['id_calon_karyawan'];

    // var_dump($bobot_kriteria);
    // var_dump($nilai);

    $w = 0;
    foreach ($bobot_kriteria as $key => $value) {
        $w += $value;
    }

    foreach ($bobot_kriteria as $key => $value) {
        $warray[] = $value / $w;
    }

    $panjangwarray = count($warray);
    for ($i=0; $i < $panjangwarray; $i++) { 
        // echo $warray[$i] . '<br>';
    }


    $s = 0;
    foreach ($nilai as $key => $value) {
        //  echo $s += $value ^ $warray[$key];
        $s += round(pow($value, $warray[$key]), 2);
        //  echo '<br>';
    }

    $sql = mysqli_query($koneksi, "UPDATE `penilaian_rekrutmen` SET `vector_s`='$s' WHERE `id_rekrutmen` = '$id_recruitment' AND `id_calon_karyawan` = '$id_calon_karyawan'");

    if ($sql) {
        $_SESSION['message'] = 'Penilaian Berhasil disimpan';
        $_SESSION['title'] = 'Data Penilaian';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Penilaian gagal disimpan';
        $_SESSION['title'] = 'Data Penilaian';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '../../index.php?page=penilaian-rekrutmen&action=nilai&calon_karyawan=". $id_calon_karyawan . "&penerimaan=". $id_recruitment."';</script>";

}
