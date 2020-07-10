<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subkrit_1 = $_POST['subkrit_1'];
    $subkrit_2 = $_POST['subkrit_2'];
    $nilai = $_POST['nilai'];
    $id_kriteria = $_POST['kriteria'];

    foreach ($nilai as $key => $value) {
        $querySkalaNilai = mysqli_query($koneksi, "SELECT * FROM `skala_penilaian` WHERE id_skala_penilaian = '$value'");
        $getSkalaNilai = mysqli_fetch_assoc($querySkalaNilai);

        $nilai_key = $getSkalaNilai['nilai'];
        $subkrit_1_key = $subkrit_1[$key];
        $subkrit_2_key = $subkrit_2[$key];
        $per_nilai = round(1 / $nilai_key, 2);

        // echo $subkrit_1_key . ' ';
        // echo $nilai_key . ' ';
        // echo $subkrit_2_key . ' ';
        // echo $per_nilai . '<br>';

        $sql1 = mysqli_query($koneksi, "INSERT INTO `subkriteria_penilaian`(`id_skala_penilaian`, `id_dt_subkrt_penilaian_1`, `nilai_perbandingan`, `id_dt_subkrt_penilaian_2`) VALUES ('$value','$subkrit_1_key','$nilai_key','$subkrit_2_key')");

        $sql2 = mysqli_query($koneksi, "INSERT INTO `subkriteria_penilaian`(`id_skala_penilaian`, `id_dt_subkrt_penilaian_1`, `nilai_perbandingan`, `id_dt_subkrt_penilaian_2`) VALUES ('$value','$subkrit_2_key','$per_nilai','$subkrit_1_key')");

        if ($sql1) {
            // echo 'berhasil';
        } else {
            mysqli_query($koneksi, "UPDATE `subkriteria_penilaian` SET `id_skala_penilaian`= '$value', `nilai_perbandingan`= '$nilai_key' WHERE `id_dt_subkrt_penilaian_1` = '$subkrit_1_key' AND `id_dt_subkrt_penilaian_2` = '$subkrit_2_key'");
        }

        if ($sql2) {
            // echo 'berhasil';
        } else {
            mysqli_query($koneksi, "UPDATE `subkriteria_penilaian` SET `id_skala_penilaian`= '$value', `nilai_perbandingan`= '$per_nilai' WHERE `id_dt_subkrt_penilaian_1` = '$subkrit_2_key' AND `id_dt_subkrt_penilaian_2` = '$subkrit_1_key'");
        }
    }
}

$queryKrit = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_penilaian`  WHERE id_dt_kriteria_penilaian = '$id_kriteria'");
$getKrit = mysqli_fetch_assoc($queryKrit);

$queryN = mysqli_query($koneksi, "SELECT COUNT(id_dt_subkriteria_penilaian) as jumlah FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_kriteria'");
$banyakdata = mysqli_fetch_assoc($queryN);

$sumrow = [];

for ($i = 0; $i < 15; $i++) {
    $querysubkrit[$i] = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_kriteria'");
    $sumrow[$i] = 0;
}

$_SESSION['message'] = 'Subkriteria Berhasil Dibandingkan';
$_SESSION['title'] = 'Data Subkriteria';
$_SESSION['type'] = 'success';

echo "<script>window.location.href = '?page=perbandingansubkriteria';</script>";

?>

<div class="col-12">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Data Penilaian Rekrutmen</strong></div>
        <div class="card-body">
            <div class="table-responsive table-striped">
                <table class="table" width="100%">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <?php while ($getsubkrit = mysqli_fetch_assoc($querysubkrit[0])) : ?>
                                <th><?= $getsubkrit['nama_subkriteria_penilaian'] ?></th>
                            <?php endwhile ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($baris = mysqli_fetch_assoc($querysubkrit[1])) : ?>
                            <tr>
                                <th><?= $baris['nama_subkriteria_penilaian'] ?></th>

                                <?php
                                $querySubkritAll = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_kriteria'");

                                while ($kolom = mysqli_fetch_assoc($querySubkritAll)) {
                                    $bariskode = $baris['id_dt_subkriteria_penilaian'];
                                    $kolomkode = $kolom['id_dt_subkriteria_penilaian'];

                                    $querytNilai = mysqli_query($koneksi, "SELECT * FROM `subkriteria_penilaian` WHERE id_dt_subkrt_penilaian_1 = '$bariskode' AND id_dt_subkrt_penilaian_2 = '$kolomkode' LIMIT 1");
                                    
                                    $getNilai = mysqli_fetch_assoc($querytNilai);

                                    //menampilkan kolom nilai
                                    // echo '<td>' . $getNilai['nilai_perbandingan'] . '</td>';
                                }

                                ?>
                            </tr>
                        <?php endwhile ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>&#931; Kolom</th>
                            <?php
                            while ($getsubKrit = mysqli_fetch_assoc($querysubkrit[2])) {
                                $kodeSubkrit = $getsubKrit['id_dt_subkriteria_penilaian'];

                                $queryJmlNilai = mysqli_query($koneksi, "SELECT SUM(nilai_perbandingan) as jumlah FROM `subkriteria_penilaian` WHERE id_dt_subkrt_penilaian_2 = '$kodeSubkrit'");
                                $getJmlNilai = mysqli_fetch_assoc($queryJmlNilai);
                                $jmlNilai = round($getJmlNilai['jumlah'], 2);

                                mysqli_query($koneksi, "UPDATE `detail_subkriteria_penilaian` SET `jumlah_subkriteria_penilaian`= '$jmlNilai' WHERE `id_dt_subkriteria_penilaian` = '$kodeSubkrit'");

                                // echo '<th>' . round($getJmlNilai['jumlah'], 2) . '</th>';
                            }
                            ?>
                        </tr>
                    </tfoot>
                </table>


                <table class="table mt-5 mb-5" width="100%">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <?php while ($getsubkrit = mysqli_fetch_assoc($querysubkrit[3])) : ?>
                                <th><?= $getsubkrit['nama_subkriteria_penilaian'] ?></th>
                            <?php endwhile ?>
                            <th>&#931; Baris</th>
                            <th>Prioritas</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $j = 0;
                        $totalprioritas = 0;
                        while ($baris = mysqli_fetch_assoc($querysubkrit[4])) : ?>
                            <tr>
                                <th><?= $baris['nama_subkriteria_penilaian'] ?></th>

                                <?php
                                $querySubkritAll = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_kriteria'");

                                $i = 1;
                                while ($kolom = mysqli_fetch_assoc($querySubkritAll)) {
                                    $bariskode = $baris['id_dt_subkriteria_penilaian'];
                                    $kolomkode = $kolom['id_dt_subkriteria_penilaian'];

                                    $querytNilai = mysqli_query($koneksi, "SELECT * FROM `subkriteria_penilaian` WHERE id_dt_subkrt_penilaian_1 = '$bariskode' AND id_dt_subkrt_penilaian_2 = '$kolomkode' LIMIT 1");
                                    $getNilai = mysqli_fetch_assoc($querytNilai);

                                    $gethasil = round($getNilai['nilai_perbandingan'] / $kolom['jumlah_subkriteria_penilaian'], 2);

                                    // echo $sumrow[$j] . ' ';
                                    // echo $j . '<br>';

                                    $sumrow[$j] += $gethasil;
                                    $prioritas = round($sumrow[$j] / $banyakdata['jumlah'], 2);

                                    //update hasil penilaian
                                    $querytNilai = mysqli_query($koneksi, "UPDATE `subkriteria_penilaian` SET `hasil_perbandingan`='$gethasil' WHERE id_dt_subkrt_penilaian_1 = '$bariskode' AND id_dt_subkrt_penilaian_2 = '$kolomkode'");

                                    //menampilkan kolom nilai
                                    // echo '<td>' . $gethasil . '</td>';
                                    if ($i != 0) {
                                        if ($i % $banyakdata['jumlah'] == 0) {
                                            //bobot global
                                            $bobotGlobal = round($getKrit['nilai_prioritas_kriteria'] * $prioritas, 3);

                                            //update bobot kriteria penilaian
                                            mysqli_query($koneksi, "UPDATE `detail_subkriteria_penilaian` SET `nilai_prioritas_subkriteria`='$prioritas' WHERE `id_dt_subkriteria_penilaian` = '$bariskode'");
                                            
                                            mysqli_query($koneksi, "UPDATE `detail_subkriteria_penilaian` SET `nilai_bobot_global`='$bobotGlobal' WHERE `id_dt_subkriteria_penilaian` = '$bariskode'");


                                            // echo '<td>' . $sumrow[$j] . '</td>';
                                            // echo '<td>' . $prioritas . '</td>';
                                            $totalprioritas += $prioritas;
                                            $j++;
                                        }
                                    }

                                    $i++;
                                }

                                ?>
                            </tr>
                        <?php endwhile ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="<?= $banyakdata['jumlah'] + 2 ?>" class="text-right">Jumlah</th>
                            <?php
                            // echo '<td>' . $totalprioritas . '</td>'
                            ?>
                        </tr>
                    </tfoot>
                </table>

                <table class="table mt-5 mb-5" width="100%">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <?php while ($getsubkrit = mysqli_fetch_assoc($querysubkrit[6])) : ?>
                                <th><?= $getsubkrit['nama_subkriteria_penilaian'] ?></th>
                            <?php endwhile ?>
                            <th>&#931; Baris</th>
                            <th>&#931; Baris / n</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $jmlbarispern = 0;
                        while ($baris = mysqli_fetch_assoc($querysubkrit[7])) : ?>
                            <tr>
                                <th><?= $baris['nama_subkriteria_penilaian'] ?></th>

                                <?php
                                $querySubkritAll = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_kriteria'");

                                $jumlah = 0;
                                while ($kolom = mysqli_fetch_assoc($querySubkritAll)) {
                                    $bariskode = $baris['id_dt_subkriteria_penilaian'];
                                    $kolomkode = $kolom['id_dt_subkriteria_penilaian'];

                                    $querytNilai = mysqli_query($koneksi, "SELECT * FROM `subkriteria_penilaian` WHERE id_dt_subkrt_penilaian_1 = '$bariskode' AND id_dt_subkrt_penilaian_2 = '$kolomkode' LIMIT 1");
                                    $getNilai = mysqli_fetch_assoc($querytNilai);

                                    $queryGetBobot = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_subkriteria_penilaian = '$kolomkode'");
                                    $getBobot = mysqli_fetch_assoc($queryGetBobot);

                                    // echo $getBobot['nilai_prioritas_kriteria'] . ' ';
                                    // echo $getNilai['nilai_perbandingan'] . ' ';

                                    $matrixprioritas = round($getBobot['nilai_prioritas_subkriteria'] * $getNilai['nilai_perbandingan'], 2);
                                    $jumlah += $matrixprioritas;


                                    //menampilkan kolom nilai
                                    // echo '<td>' . $matrixprioritas . '</td>';
                                }

                                // $jumlahperprioritas = round($jumlah / $baris['nilai_prioritas_subkriteria'], 2);

                                $jumlahpern = round($jumlah / $banyakdata['jumlah'], 2);
                                $jmlbarispern += $jumlahpern;
                                $jmlmax = round($jmlbarispern / $banyakdata['jumlah'], 2);
                                // echo '<td>' . $jumlah . '</td>';
                                // echo '<td>' . $jumlahpern . '</td>';

                                ?>
                            </tr>
                        <?php endwhile ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="<?= $banyakdata['jumlah'] + 2 ?>" class="text-right">jumlah</th>
                            <th><?= $jmlbarispern ?></th>
                        </tr>
                        <tr>
                            <th colspan="<?= $banyakdata['jumlah'] + 2 ?>" class="text-right"> &lambda; max</th>
                            <th><?= $jmlmax ?></th>
                        </tr>
                        <tr>
                            <th> &lambda; max</th>
                            <th colspan="<?= $banyakdata['jumlah'] + 2 ?>"><?= $jmlmax ?></th>
                        </tr>
                        <tr>
                            <th> CI</th>
                            <th colspan="<?= $banyakdata['jumlah'] + 2 ?>">
                                <?php
                                $ci = round(($jmlmax - $banyakdata['jumlah']) / ($banyakdata['jumlah'] - 1), 2);
                                // echo $ci;
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th> IR</th>
                            <th colspan="<?= $banyakdata['jumlah'] + 2 ?>">
                                <?php
                                echo $ir = indexrandom($banyakdata['jumlah']);
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th> CR</th>
                            <th colspan="<?= $banyakdata['jumlah'] + 2 ?>">
                                <?php
                                // echo $cr = round($ci / $ir, 2);
                                ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>