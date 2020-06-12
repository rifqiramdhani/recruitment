<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //delete kriteria dulu
    mysqli_query($koneksi, "DELETE FROM `kriteria` WHERE id_recruitment_fore = '$id'");
    //delete kriteria dulu
    mysqli_query($koneksi, "DELETE FROM `desk_recruitment` WHERE id_recruitment_fore = '$id'");
    //lalu delete recruitment
    mysqli_query($koneksi, "DELETE FROM `recruitment` WHERE id_recruitment = '$id'");

    // mysqli_query($koneksi, "UPDATE `recruitment` SET `status_recruitment`= 0 WHERE id_recruitment = '$id'");

}

?>