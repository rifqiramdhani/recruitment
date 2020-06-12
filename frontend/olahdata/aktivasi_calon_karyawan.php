<?php

require_once('../../function/helper.php');
require_once('../../function/koneksi.php');

$email_calon_karyawan = $_GET['email'];
$token_calon_karyawan = $_GET['token'];
$type = $_GET['type'];

if($type == 'register'){
    $query = mysqli_query($koneksi, "SELECT * FROM `calon_karyawan` WHERE email_calon_karyawan = '$email_calon_karyawan'");
    $getdata = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) > 0) {
        if ($getdata['token_calon_karyawan'] == $token_calon_karyawan) {

            $sql = mysqli_query($koneksi, "UPDATE `calon_karyawan` SET `status_calon_karyawan`= 1 WHERE email_calon_karyawan = '$email_calon_karyawan'");

            if ($sql) {
                $_SESSION['message'] = 'Email anda telah aktif. Silahkan gunakan untuk login.';
                $_SESSION['title'] = 'Aktivasi Email';
                $_SESSION['type'] = 'success';
                redirect('index.php');
            } else {
                $_SESSION['message'] = 'Maaf akun anda gagal diaktifkan. Silahkan coba kembali!';
                $_SESSION['title'] = 'Aktivasi Email';
                $_SESSION['type'] = 'error';
                redirect('index.php');
            }
        } else {
            $_SESSION['message'] = 'Maaf token untuk aktivasi email salah!';
            $_SESSION['title'] = 'Login';
            $_SESSION['type'] = 'error';
            redirect('index.php');
        }
    } else {
        $_SESSION['message'] = 'Maaf email belum terdaftar!';
        $_SESSION['title'] = 'Login';
        $_SESSION['type'] = 'error';
        redirect('index.php');
    }

}else if($type == 'lupapassword'){
    $query = mysqli_query($koneksi, "SELECT * FROM `calon_karyawan` WHERE email_calon_karyawan = '$email_calon_karyawan'");
    $getdata = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) > 0) {
        if ($getdata['token_calon_karyawan'] == $token_calon_karyawan) {

            redirect('index.php?page=ubahpassword&change=true&email='. $email_calon_karyawan);
        } else {
            $_SESSION['message'] = 'Maaf token untuk aktivasi email salah!';
            $_SESSION['title'] = 'Login';
            $_SESSION['type'] = 'error';
            redirect('index.php');
        }
    } else {
        $_SESSION['message'] = 'Maaf email belum terdaftar!';
        $_SESSION['title'] = 'Login';
        $_SESSION['type'] = 'error';
        redirect('index.php');
    }
}