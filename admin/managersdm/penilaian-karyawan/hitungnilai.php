<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_karyawan = $_POST['id_karyawan'];
    $nilai = $_POST['nilai'];
    $queryKrit = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_penilaian` ORDER BY `id_dt_kriteria_penilaian` ASC");

    $i = 0;
    $total = 0;
    while ($getKrit = mysqli_fetch_assoc($queryKrit)) {
        $id_dt_krt_penilaian = $getKrit['id_dt_kriteria_penilaian'];
        
        $querySub = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_dt_krt_penilaian'");

        while ($getSubKrit = mysqli_fetch_assoc($querySub)) {
            $hasil = round($getSubKrit['nilai_bobot_global'] * $nilai[$i], 2);
            $total += $hasil;
            // echo $getSubKrit['nilai_bobot_global']. ' ';
            // echo $nilai[$i] . ' ';
            // echo $hasil . '<br>';
            // echo $i;
            $i++;
        }
    }

    // echo $total;

    $sql = mysqli_query($koneksi, "UPDATE penilaian_kmp SET nilai = '$total' WHERE id_karyawan = '$id_karyawan'");

    if ($sql) {
        $_SESSION['message'] = 'Karyawan Berhasil Dinilai';
        $_SESSION['title'] = 'Data Karyawan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Karyawan Gagal Dinilai';
        $_SESSION['title'] = 'Data Karyawan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=penilaian-karyawan';</script>";
}
?>