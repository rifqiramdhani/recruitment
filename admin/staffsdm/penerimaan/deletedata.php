<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // $sql = mysqli_query($koneksi, "DELETE FROM `recruitment` WHERE id_karyawan = '$id'");
    mysqli_query($koneksi, "UPDATE `recruitment` SET `status_lowongan`= 0 WHERE id_lowongan = '$id'");
}

?>