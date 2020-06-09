<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `subkriteria` WHERE id_subkriteria = '$id'");
    // mysqli_query($koneksi, "UPDATE `lowongan` SET `status_lowongan`= 0 WHERE id_lowongan = '$id'");
}

?>