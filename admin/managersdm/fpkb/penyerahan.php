<?php

if (isset($_GET['fpkb']) & isset($_GET['status'])) {
    $id_fpkb = $_GET['fpkb'];
    $status = $_GET['status'];
    $date = date('Y-m-d');

    if ($status == 1) {
        $sql = mysqli_query($koneksi, "UPDATE `fpkb` SET `status_fpkb` = '2', `tanggal_disetujui` = '$date' WHERE `fpkb`.`id_fpkb` = '$id_fpkb'");

        if ($sql) {
            $_SESSION['message'] = 'FPKB Berhasil Disetujui';
            $_SESSION['title'] = 'Data FPKB';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'FPKB Gagal Disetujui';
            $_SESSION['title'] = 'Data FPKB';
            $_SESSION['type'] = 'error';
        }
    } else if ($status == 0) {
        $sql = mysqli_query($koneksi, "UPDATE `fpkb` SET `status_fpkb` = '4' WHERE `fpkb`.`id_fpkb` = '$id_fpkb'");

        if ($sql) {
            $_SESSION['message'] = 'FPKB Berhasil ditolak';
            $_SESSION['title'] = 'Data FPKB';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'FPKB Gagal Ditolak';
            $_SESSION['title'] = 'Data FPKB';
            $_SESSION['type'] = 'error';
        }
    }

    echo "<script>window.location.href = '?page=fpkb';</script>";
} else {
    echo "<script>window.location.href = '?page=fpkb';</script>";
}
