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

echo "<script>window.location.href = '../../index.php?page=penilaian-rekrutmen';</script>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nilaisub = $_POST['nilaisub'];
    // $nilaipsikotes = $_POST['nilaipsikotes'];
    $newnilai = $_POST['nilai'];
    $bobot_kriteria = $_POST['bobot_kriteria'];
    $id_recruitment = $_POST['id_recruitment'];
    $id_calon_karyawan = $_POST['id_calon_karyawan'];
    $id_kriteria = $_POST['id_kriteria'];
    $nilai = [];

    $queryNilai = mysqli_query($koneksi, "SELECT * FROM `nilai_penilaian_rekrutmen` WHERE id_rekrutmen = '$id_recruitment' AND id_calon_karyawan = '$id_calon_karyawan' AND status = 'nilaisub' ORDER BY id_nilai_penilaian_rekrutmen ASC");

    $i = 0;
    while ($getNilai = mysqli_fetch_assoc($queryNilai)) {
        // echo $getNilai['nilai'];
        if ($i == 0) {
            array_push($nilaisub, $getNilai['nilai']);
        } else {
            $nilaipsikotes = $getNilai['nilai'];
        }
        $i++;
    }

    echo '<br>';

    $queryPenilaian = mysqli_query($koneksi, "SELECT * FROM penilaian_rekrutmen WHERE `id_rekrutmen` = '$id_recruitment' AND `id_calon_karyawan` = '$id_calon_karyawan'");
    $getPenilaian = mysqli_fetch_assoc($queryPenilaian);
    $id_penilaian_rekrutmen = $getPenilaian['id_penilaian_rekrutmen'];

    $w = 0;
    foreach ($bobot_kriteria as $key => $value) {
        $w += $value;
    }

    foreach ($bobot_kriteria as $key => $value) {
        $warray[$key] = $value / $w;
        // echo $warray[$key].' ';
    }


    $query = mysqli_query($koneksi, "SELECT * FROM `penilaian_rekrutmen` WHERE `id_rekrutmen` = '$id_recruitment' AND `id_calon_karyawan` = '$id_calon_karyawan'");
    $getdata = mysqli_fetch_assoc($query);

    if ($getdata['status'] == 0) {
        foreach ($newnilai as $key => $value) {
            mysqli_query($koneksi, "INSERT INTO `nilai_penilaian_rekrutmen`(`id_rekrutmen`, `id_calon_karyawan`, `nilai`, `status`) VALUES ('$id_recruitment', '$id_calon_karyawan', '$value', 'nilairek')");
        }

        $nilai = [0, 0, 0, 0, 0];

        mysqli_query($koneksi, "UPDATE `penilaian_rekrutmen` SET `status` = '2' WHERE `id_rekrutmen` = '$id_recruitment' AND `id_calon_karyawan` = '$id_calon_karyawan'");

        //get email karyawan
        $queryKar = mysqli_query($koneksi, "SELECT email_karyawan FROM `rekrutmen` JOIN fpkb USING(id_fpkb) JOIN karyawan USING(id_karyawan) WHERE id_rekrutmen = '$id_recruitment'");
        $getKar = mysqli_fetch_assoc($queryKar);
        $email = $getKar['email_karyawan'];

        $mail->addAddress($email);
        $mail->Subject = 'Noreply Email';

        $mail->Body = "Silahkan lakukan penilaian rekrutmen";

        if (!$mail->send()) {
            $mail->ErrorInfo;;
            die;
        }
    } else if ($getdata['status'] == 1) {
        $queryNilai = mysqli_query($koneksi, "SELECT * FROM `nilai_penilaian_rekrutmen` WHERE id_rekrutmen = '$id_recruitment' AND id_calon_karyawan = '$id_calon_karyawan' AND status = 'nilairek' ORDER BY id_nilai_penilaian_rekrutmen ASC");

        $count = 0;
        while ($getNilai = mysqli_fetch_assoc($queryNilai)) {
            $nilai_s = ($getNilai['nilai'] + $newnilai[$count]) / 2;

            array_push($nilai, $nilai_s);
            $count++;
        }

        mysqli_query($koneksi, "UPDATE `penilaian_rekrutmen` SET `status` = '3' WHERE `id_rekrutmen` = '$id_recruitment' AND `id_calon_karyawan` = '$id_calon_karyawan'");
    }


    $querykrit = mysqli_query($koneksi, "SELECT kriteria_rekrutmen.*, nama_kriteria_rekrutmen FROM `kriteria_rekrutmen` JOIN detail_kriteria_rekrutmen ON kriteria_rekrutmen.id_dt_krt_rekt = detail_kriteria_rekrutmen.id_dt_krt_rekt WHERE id_rekrutmen = '$id_recruitment' AND status_kriteria = 1");

    $i = 0;
    $j = 0;
    $s = 0;
    $t = 0;
    $key = 0;

    if (($nilai[0] == 0)) {
        $s = 0;
    } else {
        while ($getkrit = mysqli_fetch_assoc($querykrit)) {
            $id_kriteria = $getkrit['id_krt_rekt'];
            $querysubkrit = mysqli_query($koneksi, "SELECT * FROM `subkriteria_rekrutmen` WHERE id_kriteria_rekrutmen = '$id_kriteria' ORDER BY nama_subkriteria ASC");

            if (mysqli_num_rows($querysubkrit) > 0) {
                while ($getsubkrit = mysqli_fetch_assoc($querysubkrit)) {
                    if ($getsubkrit['id_subkriteria_rekrutmen'] == $nilaisub[$i]) {
                        $s += round(pow($getsubkrit['bobot_subkriteria'], $warray[$key]), 2);
                        $id_subkriteria_rekrutmen = $nilaisub[$i];

                        mysqli_query($koneksi, "INSERT INTO `detail_penilaian_rekrutmen`(`id_penilaian_rekrutmen`, `id_kriteria_rekrutmen`, `id_subkriteria_rekrutmen`) VALUES ('$id_penilaian_rekrutmen', '$id_kriteria', '$id_subkriteria_rekrutmen')");
                    }
                }
                $i++;
            } elseif ($getkrit['id_dt_krt_rekt'] == 'K010') {
                $s += round(pow($nilaipsikotes, $warray[$key]), 2);
                // echo $id_calon_karyawan . ' ' . $id_kriteria . ' ' . $nilaipsikotes.' | ';

                mysqli_query($koneksi, "INSERT INTO `detail_penilaian_rekrutmen`(`id_penilaian_rekrutmen`, `id_kriteria_rekrutmen`, `id_subkriteria_rekrutmen`) VALUES ('$id_penilaian_rekrutmen', '$id_kriteria', '$nilaipsikotes')");
            } else {
                $s += round(pow($nilai[$j], $warray[$key]), 2);
                // echo $id_calon_karyawan . ' ' . $id_kriteria . ' ' . $nilai[$j].' | ';

                $nilaij = $nilai[$j];

                mysqli_query($koneksi, "INSERT INTO `detail_penilaian_rekrutmen`(`id_penilaian_rekrutmen`, `id_kriteria_rekrutmen`, `id_subkriteria_rekrutmen`) VALUES ('$id_penilaian_rekrutmen', '$id_kriteria', '$nilaij')");
                $j++;
            }
            $key++;
        }
    }

    $sql = mysqli_query($koneksi, "UPDATE `penilaian_rekrutmen` SET `vector_s`='$s' WHERE `id_rekrutmen` = '$id_recruitment' AND `id_calon_karyawan` = '$id_calon_karyawan'");

    if ($sql) {
        $_SESSION['message'] = 'Penilaian Berhasil disimpan';
        $_SESSION['title'] = 'Data Penilaian';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Penilaian gagal disimpan';
        $_SESSION['title'] = 'Data Penilaian';
        $_SESSION['type'] = 'error';
    }
}
