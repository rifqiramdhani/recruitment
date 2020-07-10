<?php 
require_once('../../../function/koneksi.php');

if(isset($_GET['persetujuan'])){
    $id = $_GET['id'];

    if($_GET['persetujuan'] == 'setuju'){
        mysqli_query($koneksi, "UPDATE `penilaian_kmp` SET `status` = '1' WHERE `penilaian_kmp`.`id_penilaian_kmp` = '$id'");

    }else if($_GET['persetujuan'] == 'tidaksetuju'){
        mysqli_query($koneksi, "UPDATE `penilaian_kmp` SET `status` = '2' WHERE `penilaian_kmp`.`id_penilaian_kmp` = '$id'");
    }

}else{
    header('location: ?page=penilaian-karyawan');
}
?>