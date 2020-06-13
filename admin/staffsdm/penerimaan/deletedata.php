<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //delete kriteria dulu
    mysqli_query($koneksi, "DELETE FROM `kriteria_rekrutmen` WHERE id_rekrutmen = '$id'");
    //delete kriteria dulu
    mysqli_query($koneksi, "DELETE FROM `desk_rekrutmen` WHERE id_rekrutmen = '$id'");
    //lalu delete recruitment
    mysqli_query($koneksi, "DELETE FROM `rekrutmen` WHERE id_rekrutmen = '$id'");

    // mysqli_query($koneksi, "UPDATE `recruitment` SET `status_recruitment`= 0 WHERE id_recruitment = '$id'");

}

?>