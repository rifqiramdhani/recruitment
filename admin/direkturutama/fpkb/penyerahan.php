<?php

if (isset($_GET['fpkb'])) {
    $id_fpkb = $_GET['fpkb'];
    $date = date('Y-m-d');

    $sql = mysqli_query($koneksi, "UPDATE `fpkb` SET `status_fpkb` = '2', `tanggal_disetujui` = '$date' WHERE `fpkb`.`id_fpkb` = '$id_fpkb'");

    if ($sql) {
        $_SESSION['message'] = 'FPKB Berhasil Diserahkan ke Manager SDM';
        $_SESSION['title'] = 'Data FPKB';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'FPKB Gagal Diserahkan ke Manager SDM';
        $_SESSION['title'] = 'Data FPKB';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=fpkb';</script>";
}else{
    echo "<script>window.location.href = '?page=fpkb';</script>";
}
