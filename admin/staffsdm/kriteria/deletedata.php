<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // $sql = mysqli_query($koneksi, "DELETE FROM `karyawan` WHERE id_karyawan = '$id'");
    mysqli_query($koneksi, "UPDATE `kriteria` SET `status_kriteria`= 0 WHERE id_kriteria = '$id'");
}

?>