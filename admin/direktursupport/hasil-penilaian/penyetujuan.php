<?php 
require_once('../../../function/koneksi.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    mysqli_query($koneksi, "UPDATE `penilaian_kmp` SET `status` = '4' WHERE `penilaian_kmp`.`id_penilaian_kmp` = '$id'");

}else{
    header('location: ../../?page=penilaian-karyawan');
}
