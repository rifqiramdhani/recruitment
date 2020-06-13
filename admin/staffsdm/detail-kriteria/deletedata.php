<?php
require_once('../../../function/koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `detail_kriteria_rekrutmen` WHERE `id_dt_krt_rekt` = '$id'");
    // mysqli_query($koneksi, "UPDATE `kriteria_detail` SET `status_kriteria`= 0 WHERE id_kriteria = '$id'");
    if(!$sql){
        echo mysqli_error($koneksi);
    }
}

?>