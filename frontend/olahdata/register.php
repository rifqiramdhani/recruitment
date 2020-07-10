<?php

// Include PHPMailer library files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../../function/vendor/phpmailer/phpmailer/src/Exception.php');
require('../../function/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require('../../function/vendor/phpmailer/phpmailer/src/SMTP.php');
require('../../function/helper.php');
require('../../function/koneksi.php');

// Load Composer's autoloader
// require('../../function/vendor/autoload.php');
include('../../function/vendor/autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
// SMTP configuration
configsmtp($mail);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama_calon_karyawan = htmlspecialchars($_POST['nama_calon_karyawan']);
    $alamat_calon_karyawan = htmlspecialchars($_POST['alamat_calon_karyawan']);
    $telp_calon_karyawan = htmlspecialchars($_POST['telp_calon_karyawan']);
    $ttl_calon_karyawan = htmlspecialchars($_POST['ttl_calon_karyawan']);
    
    $kodepos_calon_karyawan = htmlspecialchars($_POST['kodepos_calon_karyawan']);
    $status_pernikahan = htmlspecialchars($_POST['status_pernikahan']);
    $status_pendidikan = htmlspecialchars($_POST['status_pendidikan']);
    $agama = htmlspecialchars($_POST['agama']);
    
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

    $query = mysqli_query($koneksi, "SELECT * FROM `calon_karyawan` WHERE email_calon_karyawan = '$email'");

    //redirect/header halaman
    header('location: ../../index.php');
 
    if (mysqli_num_rows($query) == 0) {

        $token = base64_encode(random_bytes(32));
        $mail->addAddress($email, $nama_calon_karyawan);
        $mail->Subject = 'Aktivasi Email';
        $mailContent = '
		<h3>Informasi Akun</h3>
		<p>Email    : ' . $email . ' </p>
		<p>Password : ' . $_POST['password'] . '</p>
        <p>Silahkan klik link berikut untuk mengaktifkan email anda. <a href="' . BASE_URL . 'frontend/olahdata/aktivasi_calon_karyawan.php?email=' . $email . '&token=' . urlencode($token) . '&type=register">Aktif</a>.</p>';
        
        $mail->Body = $mailContent;

        if ($mail->send()) {
            $sql = mysqli_query($koneksi, "INSERT INTO `calon_karyawan`(`nama_calon_karyawan`, 
            `email_calon_karyawan`, `password_calon_karyawan`, `telp_calon_karyawan`, 
            `ttl_calon_karyawan`, `alamat_calon_karyawan`, `token_calon_karyawan`, `status_calon_karyawan`, `kodepos_calon_karyawan`, `status_pernikahan`, `status_pendidikan`, `agama`) VALUES ('$nama_calon_karyawan',
            '$email','$password','$telp_calon_karyawan','$ttl_calon_karyawan',
            '$alamat_calon_karyawan', '$token', 0, '$kodepos_calon_karyawan','$status_pernikahan','$status_pendidikan','$agama')");

        } else {
            echo $mail->ErrorInfo;
            $_SESSION['message'] = $mail->ErrorInfo;
            $_SESSION['title'] = 'Data Calon Karyawan';
            $_SESSION['type'] = 'error';
        }

        if ($sql) {
            echo 'masuk';
            $_SESSION['message'] = 'Data berhasil diregistrasi. Silahkan cek email untuk proses aktivasi email.';
            $_SESSION['title'] = 'Data Calon Karyawan';
            $_SESSION['type'] = 'success';
        } else {
            echo 'gagal';
            $_SESSION['message'] = 'Data gagal diregistrasi, silahkan reload page dan coba register kembali!';
            $_SESSION['title'] = 'Data Calon Karyawan';
            $_SESSION['type'] = 'error';
        }

    } else {
        $_SESSION['message'] = 'Maaf email telah terdaftar';
        $_SESSION['title'] = 'Data Calon Karyawan';
        $_SESSION['type'] = 'error';
    }
}
