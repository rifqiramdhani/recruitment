<?php

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `divisi` WHERE `id_divisi` = '$id'");
    // mysqli_query($koneksi, "UPDATE `karyawan` SET `status_karyawan`= 0 WHERE id_karyawan = '$id'");
    
    if($sql){
        echo 'terhapus';
    }else{
        // echo 'tidak terhapus';
        echo mysqli_error($koneksi);
    }

}

?>