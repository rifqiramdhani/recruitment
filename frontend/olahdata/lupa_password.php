<?php

// Include PHPMailer library files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../../function/vendor/phpmailer/phpmailer/src/Exception.php');
require_once('../../function/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../../function/vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');

// Load Composer's autoloader
require('../../function/vendor/autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// SMTP configuration
configsmtp($mail);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];

    $query = mysqli_query($koneksi, "SELECT * FROM `calon_karyawan` WHERE email_calon_karyawan = '$email'");
    $getdata = mysqli_fetch_assoc($query);

    //redirect atau header halaman
    // redirect('index.php');
    echo "<script>window.location.href = '../../index.php';</script>";

    if (mysqli_num_rows($query) > 0) {
        if($getdata['status_calon_karyawan'] == 1){
            $token = base64_encode(random_bytes(32));

            $mail->addAddress($email);
            $mail->Subject = 'Forgot Password';
            $mailContent = '
            <h2>Reset Password</h2>
            <p>Untuk Reset Password Silahkan Klik Link Dibawah Ini <a href="' . BASE_URL . 'frontend/olahdata/aktivasi_calon_karyawan.php?email=' . $email . '&token=' . urlencode($token) . '&type=lupapassword">Reset Password</a>.</p>';
            $mail->Body = $mailContent;

            if ($mail->send()) {
                //update token
                $sql = mysqli_query($koneksi, "UPDATE `calon_karyawan` SET `token_calon_karyawan`= '$token' WHERE email_calon_karyawan = '$email'");
            } else {
                $mail->ErrorInfo;
            }

            if ($sql) {
                $_SESSION['message'] = 'Silahkan cek email untuk reset password';
                $_SESSION['title'] = 'Data Calon Karyawan';
                $_SESSION['type'] = 'success';
            } else {
                $_SESSION['message'] = 'Proses reset password gagal, silahkan coba kembali!';
                $_SESSION['title'] = 'Data Calon Karyawan';
                $_SESSION['type'] = 'error';
            }
        }else{
            $_SESSION['message'] = 'Maaf email belum aktif';
            $_SESSION['title'] = 'Data Calon Karyawan';
            $_SESSION['type'] = 'error';
        }
    } else {
        $_SESSION['message'] = 'Maaf email belum terdaftar';
        $_SESSION['title'] = 'Data Calon Karyawan';
        $_SESSION['type'] = 'error';
    }

    
}
