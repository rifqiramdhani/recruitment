<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // $sql = mysqli_query($koneksi, "DELETE FROM `karyawan` WHERE id_karyawan = '$id'");
    mysqli_query($koneksi, "DELETE FROM `desk_rekrutmen` WHERE id_desk_rekrutmen = '$id'");
}

?>