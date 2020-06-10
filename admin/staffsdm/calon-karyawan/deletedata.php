<?php

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // $sql = mysqli_query($koneksi, "DELETE FROM `karyawan` WHERE id_karyawan = '$id'");
    mysqli_query($koneksi, "UPDATE `calon_karyawan` SET `status_calon_karyawan`= 0 WHERE id_calon_karyawan = '$id'");
}

?>