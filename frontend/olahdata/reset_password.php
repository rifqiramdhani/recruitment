<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = mysqli_query($koneksi, "SELECT * FROM `calon_karyawan` WHERE email_calon_karyawan = '$email'");
    $getdata = mysqli_fetch_assoc($query);
    
    
    if (mysqli_num_rows($query) > 0) {
        $sql = mysqli_query($koneksi, "UPDATE `calon_karyawan` SET `password_calon_karyawan`='$password' WHERE email_calon_karyawan = '$email'");

        $_SESSION['message'] = 'Selamat password ' . $email . ' berhasil perbaharui';
        $_SESSION['title'] = 'Akun';
        $_SESSION['type'] = 'success';
        redirect('index.php');
    } else {
        $_SESSION['message'] = 'Maaf email belum terdaftar!';
        $_SESSION['title'] = 'Akun';
        $_SESSION['type'] = 'error';
        redirect('index.php');
    }
}
