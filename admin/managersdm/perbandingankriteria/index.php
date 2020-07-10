<?php
$query = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_penilaian` ORDER BY id_dt_kriteria_penilaian ASC");




$kriteriaCount = mysqli_num_rows($query); //menghitung jumlah kriteria ada 3

$array = []; //array baru
while ($row = mysqli_fetch_assoc($query)) { //C1 -> [C,1] -> c = 2 -> r[c1] = 2
    $pcs = explode("C", $row['id_dt_kriteria_penilaian']); // C2 -> [C,2] -> c = 1 -> r[c2] = 1
    $c = $kriteriaCount - $pcs[1]; // c = 3 - 1 // C3 -> [C,3] -> c = 0 -> r[c3] = 0

    if ($c >= 1) {
        $array[$row['id_dt_kriteria_penilaian']] = $c;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
}

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
        <div class="card-header"><strong>Data Perbandingan Kriteria</strong></div>
        <div class="card-body">
            <?php if (mysqli_num_rows($query) > 1) : ?>
            <form method="post" action="?page=perbandingankriteria&action=analisa-kriteria" class="form-row">
                <div class="col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label class="font-weight-bold">Kriteria Pertama</label>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Pernilaian</label>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <div class="form-group">
                        <label class="font-weight-bold">Kriteria Kedua</label>
                    </div>
                </div>

                

                <?php
                

                $no = 1;
                foreach ($array as $key => $value) {
                    for ($i = 1; $i <= $value; $i++) {

                        $queryKrit = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_penilaian` WHERE id_dt_kriteria_penilaian = '$key'");
                        $getKrit = mysqli_fetch_assoc($queryKrit); ?>

                        <?php
                        $pcs = explode("C", $key);
                        $newId = "C" . ($pcs[1] + $i);
                        // echo $newId. $no;
                        $queryKrit2 = mysqli_query($koneksi, "SELECT * FROM `detail_kriteria_penilaian` WHERE id_dt_kriteria_penilaian = '$newId'");
                        $getKrit2 = mysqli_fetch_assoc($queryKrit2);

                        $querySkalaNilai = mysqli_query($koneksi, "SELECT * FROM `kriteria_penilaian` WHERE id_dt_krt_penilaian_1 = '$key' AND id_dt_krt_penilaian_2 = '$newId'");
                        $getSkalaNilai = mysqli_fetch_assoc($querySkalaNilai);
                        $idSkala = $getSkalaNilai['id_skala_penilaian'];
                        ?>

                        <div class="col-xs-12 col-lg-3">
                            <div class="form-group">
                                <!-- <?php echo $key . $no ?> -->
                                <input type="text" class="form-control" value="<?= $getKrit['nama_kriteria_penilaian'] ?>" readonly /> <!-- value=c1, value=c2 -->
                                <input type="hidden" name="krit_1[]" value="<?= $getKrit['id_dt_kriteria_penilaian'] ?>" />
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <select name="nilai[]" class="form-control">
                                    <?php $querySkala = mysqli_query($koneksi, "SELECT * FROM `skala_penilaian` ORDER BY id_skala_penilaian ASC"); ?>
                                    <?php while ($getSkala = mysqli_fetch_assoc($querySkala)) : ?>
                                        <option value="<?= $getSkala['id_skala_penilaian'] ?>" <?php if($getSkala['id_skala_penilaian'] == $idSkala)echo 'selected' ?>><?= $getSkala['keterangan'] ?></option>
                                    <?php endwhile ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-3">
                            <div class="form-group">

                                <input type="text" class="form-control" value="<?= $getKrit2['nama_kriteria_penilaian'] ?>" readonly /> <!-- value=c1, value=c2 -->
                                <input type="hidden" name="krit_2[]" value="<?= $getKrit2['id_dt_kriteria_penilaian'] ?>" />
                            </div>
                        </div>

                <?php
                        $no++;
                    }
                }
                ?>

                <!-- Array ( [C1] => 2 [C2] => 1 ) -->

                <div class="form-control border-0">
                    <button type="submit" name="submit" class="btn btn-dark"> Selanjutnya <span class="fa fa-arrow-right"></span></button>
                </div>
            </form>
            <?php else: ?>
                <h3>Tidak ada data kriteria untuk dibandingkan</h3>
            <?php endif ?>
        </div>
    </div>
</div>