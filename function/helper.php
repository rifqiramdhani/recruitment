<?php
session_start();
define("BASE_URL", "http://localhost/skripsi/recruitment/");

function configsmtp($mail){
    // SMTP configuration
    $mail->isSMTP();

    $mail->SMTPDebug = TRUE;

    // $mail->Host     = 'ssl://smtp.googlemail.com';
    // $mail->Port       = 465;
    // $mail->SMTPSecure = 'ssl';
    // $mail->Username = 'bonliciptas@gmail.com';
    // $mail->Password = 'bonli123';
    // $mail->SMTPAuth   = true;

    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Host     = 'smtp.mailtrap.io';
    $mail->Port       = 2525;
    $mail->SMTPAuth   = true;
    $mail->Username = '430b3cf6903a9e';
    $mail->Password = '31aa5340c222a9';

    $mail->setFrom('bonliciptas@gmail.com', 'PT Bonli Cipta Sejahtera');
    $mail->addReplyTo('bonliciptas@gmail.com', 'PT Bonli Cipta Sejahtera');

    // Set email format to HTML
    $mail->isHTML(true);
}

function indexrandom($n){
    switch ($n) {
        case 1:
            $nilaiir = 0.00;
            break;

        case 2:
            $nilaiir = 0.00;
            break;

        case 3:
            $nilaiir = 0.58;
            break;

        case 4:
            $nilaiir = 0.90;
            break;

        case 5:
            $nilaiir = 1.12;
            break;

        case 6:
            $nilaiir = 1.24;
            break;

        case 7:
            $nilaiir = 1.32;
            break;

        case 8:
            $nilaiir = 1.41;
            break;

        case 9:
            $nilaiir = 1.45;
            break;

        case 10:
            $nilaiir = 1.49;
            break;

        case 11:
            $nilaiir = 1.51;
            break;

        case 12:
            $nilaiir = 1.48;
            break;

        case 13:
            $nilaiir = 1.56;
            break;
    }

    return $nilaiir;
}


function tampil_gaji($gaji)
{
    $string1 = explode(' - ', $gaji);
    $count = count($string1);
    if ($count == 1) {
        return number_format($string1[0]);
    } else {
        return number_format($string1[0]) . ' - ' . number_format($string1[1]);
    }
}


function random_name($name)
{
    // mengacak angka untuk nama file
    $acak = rand(00000000, 99999999);

    $ImageExt       = substr($name, strrpos($name, '.'));
    $ImageExt       = str_replace('.', '', $ImageExt); // Extension
    $name      = preg_replace("/\.[^.\s]{3,4}$/", "", $name);
    $NewImageName   = $acak . '.' . $ImageExt;
    return $NewImageName;
}


function cek_login()
{
    if (!isset($_SESSION['login'])) {
        redirect('login');
    }
}

//fungsi memasukan data kedalam session
function session_userdata($data)
{
    foreach ($data as $key => $value) {
        $_SESSION[$key] = $value;
    }
}

//fungsi untuk pindah halaman dengan membawa pesan
function redirect($url, $message = false)
{
    if ($message) {
        $_SESSION['message'] = $message;
    }
    header('location: ' . BASE_URL . $url);
}

//fungsi untuk cek pesan yang di bawa oleh fungsi redirect
function session_flashdata()
{
    if (isset($_SESSION['message'])) :
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    endif;
}

//fungsi untuk mengubah dari integer menjadi Rp, int
function rupiah($nilai = 0)
{
    $string = "Rp, " . number_format($nilai);
    return $string;
}

//fungsi untuk mencegah serangan xss
function cetak($str)
{
    return htmlentities($str, ENT_QUOTES, 'UTF-8');
}

//fungsii untuk mengubah tanggal menjadi tanggal indonesia
function tgl_indo($tgl)
{
    $ubah = gmdate($tgl, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
