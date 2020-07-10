<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // $sql = mysqli_query($koneksi, "DELETE FROM `karyawan` WHERE id_karyawan = '$id'");
    mysqli_query($koneksi, "DELETE FROM `detail_subkriteria_penilaian` WHERE id_dt_subkriteria_penilaian = '$id'");
}

?>