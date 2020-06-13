<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `subkriteria_rekrutmen` WHERE id_subkriteria_rekrutmen = '$id'");
    // mysqli_query($koneksi, "UPDATE `lowongan` SET `status_lowongan`= 0 WHERE id_lowongan = '$id'");
}

?>