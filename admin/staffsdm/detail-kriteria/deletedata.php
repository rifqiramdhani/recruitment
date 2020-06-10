<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `kriteria_detail` WHERE kode_kriteria = '$id'");
    // mysqli_query($koneksi, "UPDATE `kriteria_detail` SET `status_kriteria`= 0 WHERE id_kriteria = '$id'");
}

?>