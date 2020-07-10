<?php

// Include PHPMailer library files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../../../function/vendor/phpmailer/phpmailer/src/Exception.php');
require_once('../../../function/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../../../function/vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

// Load Composer's autoloader
require('../../../function/vendor/autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// SMTP configuration
configsmtp($mail);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    $penerimaan = $_POST['penerimaan'];

    $mail->addAddress($email);
    $mail->Subject = 'Noreply Email';

    $mail->Body = $pesan;

    header('location: ../../index.php?page=penerimaan&action=pelamar&penerimaan=' . $penerimaan);

    if ($mail->send()) {
        $_SESSION['message'] = 'Email berhasil dikirimkan';
        $_SESSION['title'] = 'Email';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = $mail->ErrorInfo;;
        $_SESSION['title'] = 'Email';
        $_SESSION['type'] = 'error';
    }
}

?>