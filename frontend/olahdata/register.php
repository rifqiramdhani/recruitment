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
$mail->isSMTP();
$mail->Host     = 'ssl://smtp.googlemail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ctccimahi@gmail.com';
$mail->Password = 'ctccimahi123';
$mail->SMTPSecure = 'ssl';
$mail->Port     = 465;

$mail->setFrom('ctccimahi@gmail.com', 'Cimahi Therapy Center');
$mail->addReplyTo('ctccimahi@gmail.com', 'Cimahi Therapy Center');
// Set email format to HTML
$mail->isHTML(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama_calon_karyawan = htmlspecialchars($_POST['nama_calon_karyawan']);
    $alamat_calon_karyawan = htmlspecialchars($_POST['alamat_calon_karyawan']);
    $telp_calon_karyawan = htmlspecialchars($_POST['telp_calon_karyawan']);
    $ttl_calon_karyawan = htmlspecialchars($_POST['ttl_calon_karyawan']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

    $query = mysqli_query($koneksi, "SELECT * FROM `calon_karyawan` WHERE email_calon_karyawan = '$email'");

    if (mysqli_num_rows($query) == 0) {

        $token = base64_encode(random_bytes(32));
        $mail->addAddress($email);
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
            `ttl_calon_karyawan`, `alamat_calon_karyawan`, `token_calon_karyawan`, `status_calon_karyawan`) VALUES ('$nama_calon_karyawan',
            '$email','$password','$telp_calon_karyawan','$ttl_calon_karyawan',
            '$alamat_calon_karyawan', '$token', 0)");
        } else {
            $mail->ErrorInfo;
        }

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil diregistrasi. Silahkan cek email untuk proses aktivasi email.';
            $_SESSION['title'] = 'Data Calon Karyawan';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal diregistrasi, silahkan coba kembali!';
            $_SESSION['title'] = 'Data Calon Karyawan';
            $_SESSION['type'] = 'error';
        }

    } else {
        $_SESSION['message'] = 'Maaf email telah terdaftar';
        $_SESSION['title'] = 'Data Calon Karyawan';
        $_SESSION['type'] = 'error';
    }

    redirect('index.php');
}
