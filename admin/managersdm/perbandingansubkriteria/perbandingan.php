<?php

$id_kriteria = $_GET['kriteria'];
$query = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_krt_penilaian = '$id_kriteria' ORDER BY id_dt_subkriteria_penilaian ASC");


$subkritCount = mysqli_num_rows($query); //menghitung jumlah subkriteria ada 3

$array = []; //array baru
$arrayId = [];
$counter = 1;
while ($row = mysqli_fetch_assoc($query)) { //C1 -> [C,1] -> c = 2 -> r[c1] = 2
    $c = $subkritCount - $counter; // c = 3 - 1 // C3 -> [C,3] -> c = 0 -> r[c3] = 0
    // echo $row['id_dt_subkriteria_penilaian'] . ' ,';

    $arrayId[$counter] = $row['id_dt_subkriteria_penilaian'];
    if ($c >= 1) {
        $array[$row['id_dt_subkriteria_penilaian']] = $c;
    }
    $counter++;
}

// print_r($array);
// echo '<br>';
// print_r($arrayId);
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     print_r($_POST);
// }

// print_r($array);

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">

    <!-- show sweet alert -->
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
    <?php
        unset($_SESSION['message']);
        unset($_SESSION['title']);
        unset($_SESSION['type']);
    endif;
    ?>

    <div class="card card-accent-success">
        <div class="card-header"><strong>Data Penilaian Rekrutmen</strong></div>
        <div class="card-body">
            <?php if (mysqli_num_rows($query) > 1) : ?>
                <form method="post" action="?page=perbandingansubkriteria&action=analisa-subkriteria" class="form-row">
                    <div class="col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label class="font-weight-bold">Subkriteria Pertama</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Pernilaian</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-3">
                        <div class="form-group">
                            <label class="font-weight-bold">Subkriteria Kedua</label>
                        </div>
                    </div>


                    <?php

                    $no = 1;
                    foreach ($array as $key => $value) {
                        for ($i = 1; $i <= $value; $i++) {
                            //kriteria pertama
                            $querySubkrit = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_subkriteria_penilaian = '$key'");
                            $getSubkrit = mysqli_fetch_assoc($querySubkrit);

                            //kriteria kedua
                            $c = array_search($key, $arrayId);
                            $newId = $arrayId[$c + $i];
                            // echo $newId. $no;
                            $querySubkrit2 = mysqli_query($koneksi, "SELECT * FROM `detail_subkriteria_penilaian` WHERE id_dt_subkriteria_penilaian = '$newId'");
                            $getSubkrit2 = mysqli_fetch_assoc($querySubkrit2);

                            $querySkalaNilai = mysqli_query($koneksi, "SELECT * FROM `subkriteria_penilaian` WHERE id_dt_subkrt_penilaian_1 = '$key' AND id_dt_subkrt_penilaian_2 = '$newId'");
                            $getSkalaNilai = mysqli_fetch_assoc($querySkalaNilai);
                            $idSkala = $getSkalaNilai['id_skala_penilaian'];
                    ?>

                            <div class="col-xs-12 col-lg-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $getSubkrit['nama_subkriteria_penilaian'] ?>" readonly /> <!-- value=c1, value=c2 -->
                                    <input type="hidden" name="subkrit_1[]" value="<?= $getSubkrit['id_dt_subkriteria_penilaian'] ?>" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <select name="nilai[]" class="form-control">
                                        <?php $querySkala = mysqli_query($koneksi, "SELECT * FROM `skala_penilaian` ORDER BY id_skala_penilaian ASC"); ?>
                                        <?php while ($getSkala = mysqli_fetch_assoc($querySkala)) : ?>
                                            <option value="<?= $getSkala['id_skala_penilaian'] ?>" <?php if($idSkala == $getSkala['id_skala_penilaian'])echo 'selected' ?>><?= $getSkala['keterangan'] ?></option>
                                        <?php endwhile ?>
                                    </select>

                                </div>
                            </div>

                            <div class="col-xs-12 col-lg-3">
                                <div class="form-group">

                                    <input type="text" class="form-control" value="<?= $getSubkrit2['nama_subkriteria_penilaian'] ?>" readonly />
                                    <input type="hidden" name="subkrit_2[]" value="<?= $getSubkrit2['id_dt_subkriteria_penilaian'] ?>" />
                                </div>
                            </div>

                    <?php
                            $no++;
                        }
                    }
                    ?>

                    <!-- Array ( [C1] => 2 [C2] => 1 ) -->

                    <input type="hidden" name="kriteria" value="<?= $id_kriteria ?>">

                    <div class="form-control border-0">
                        <a href="?page=perbandingansubkriteria" class="btn btn-dark"><span class="fa fa-arrow-left"></span> Kembali</a>
                        <button type="submit" name="submit" class="btn btn-dark"> Selanjutnya <span class="fa fa-arrow-right"></span></button>
                    </div>
                </form>
            <?php else : ?>
                <h3>Tidak ada data kriteria untuk dibandingkan</h3>
                <a href="?page=perbandingansubkriteria" class="btn btn-dark"><span class="fa fa-arrow-left"></span> Kembali</a>
            <?php endif ?>

        </div>
    </div>
</div>