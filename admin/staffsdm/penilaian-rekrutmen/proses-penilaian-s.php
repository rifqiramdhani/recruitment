<?php
require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nilaisub = $_POST['nilaisub'];
    $nilaipsikotes = $_POST['nilaipsikotes'];
    $nilai = $_POST['nilai'];
    $bobot_kriteria = $_POST['bobot_kriteria'];
    $id_recruitment = $_POST['id_recruitment'];
    $id_calon_karyawan = $_POST['id_calon_karyawan'];
    $id_kriteria = $_POST['id_kriteria'];

    // var_dump($bobot_kriteria);
    // var_dump($id_kriteria);
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
    echo '<br>';


    // foreach ($id_kriteria as $key => $value) {
    //     $querySub = mysqli_query($koneksi, "SELECT bobot_subkriteria FROM subkriteria_rekrutmen WHERE id_kriteria_rekrutmen = '$value'");

    //     while ($getSub = mysqli_fetch_assoc($querySub)) {
    //         echo $getSub['bobot_subkriteria'] .' ';
    //     }
    // }

    $querykrit = mysqli_query($koneksi, "SELECT kriteria_rekrutmen.*, nama_kriteria_rekrutmen FROM `kriteria_rekrutmen` JOIN detail_kriteria_rekrutmen ON kriteria_rekrutmen.id_dt_krt_rekt = detail_kriteria_rekrutmen.id_dt_krt_rekt WHERE id_rekrutmen = '$id_recruitment' AND status_kriteria = 1");

    $i=0;
    $j=0;
    $s=0;
    $t=0;
    $key=0;
    while ($getkrit = mysqli_fetch_assoc($querykrit)){
        $id_kriteria = $getkrit['id_krt_rekt'];
        $querysubkrit = mysqli_query($koneksi, "SELECT * FROM `subkriteria_rekrutmen` WHERE id_kriteria_rekrutmen = '$id_kriteria' ORDER BY nama_subkriteria ASC");

        if (mysqli_num_rows($querysubkrit) > 0){
            while ($getsubkrit = mysqli_fetch_assoc($querysubkrit)){
                if($getsubkrit['id_subkriteria_rekrutmen'] == $nilaisub[$i]){
                    $s += round(pow($getsubkrit['bobot_subkriteria'], $warray[$key]), 2);
                    $id_subkriteria_rekrutmen = $nilaisub[$i];

                    // echo $id_calon_karyawan.' '. $id_kriteria .' '. $nilaisub[$i].' | ';

                    mysqli_query($koneksi, "INSERT INTO `detail_penilaian_rekrutmen`(`id_penilaian_rekrutmen`, `id_kriteria_rekrutmen`, `id_subkriteria_rekrutmen`) VALUES ('$id_penilaian_rekrutmen', '$id_kriteria', '$id_subkriteria_rekrutmen')");
                }
            }
        $i++;
        }elseif ($getkrit['id_dt_krt_rekt'] == 'K010'){
            $s += round(pow($nilaipsikotes, $warray[$key]), 2);
            // echo $id_calon_karyawan . ' ' . $id_kriteria . ' ' . $nilaipsikotes.' | ';

            mysqli_query($koneksi, "INSERT INTO `detail_penilaian_rekrutmen`(`id_penilaian_rekrutmen`, `id_kriteria_rekrutmen`, `id_subkriteria_rekrutmen`) VALUES ('$id_penilaian_rekrutmen', '$id_kriteria', '$nilaipsikotes')");
        }else{
            $s += round(pow($nilai[$j], $warray[$key]), 2);
            // echo $id_calon_karyawan . ' ' . $id_kriteria . ' ' . $nilai[$j].' | ';

            $nilaij = $nilai[$j];

            mysqli_query($koneksi, "INSERT INTO `detail_penilaian_rekrutmen`(`id_penilaian_rekrutmen`, `id_kriteria_rekrutmen`, `id_subkriteria_rekrutmen`) VALUES ('$id_penilaian_rekrutmen', '$id_kriteria', '$nilaij')");
            $j++;
        }
        $key++;
    }

    // echo $s;

    // $s += 0;
    // foreach ($nilai as $key => $value) {
    //     //  echo $s += $value ^ $warray[$key];
    //     $querySub = mysqli_query($koneksi, "SELECT bobot_subkriteria FROM subkriteria_rekrutmen WHERE id_subkriteria_rekrutmen = '$value'");
    //     $getSub = mysqli_fetch_assoc($querySub);

    //     $s += round(pow($getSub['bobot_subkriteria'], $warray[$key]), 2);
    //     //  echo '<br>';
    //     echo $value. ' ' ;
    // }

    // echo $s;

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

    echo "<script>window.location.href = '../../index.php?page=penilaian-rekrutmen&action=nilai&calon_karyawan=". $id_calon_karyawan . "&penerimaan=". $id_recruitment."';</script>";

}
