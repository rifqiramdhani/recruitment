<?php
require_once("../../../function/koneksi.php");


$id_divisi = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id_divisi = '$id_divisi'");

while ($getdatajabatan = mysqli_fetch_assoc($query)) :

    $id_jabatan = $getdatajabatan['id_jabatan'];

    $queryjumlahkaryawan = mysqli_query($koneksi, "SELECT COUNT(id_jabatan) as jumlah FROM `karyawan` WHERE id_jabatan = '$id_jabatan'");

    $getjumlahkaryawan = mysqli_fetch_assoc($queryjumlahkaryawan);


    $kekosongan = intval($getdatajabatan['jumlah_jabatan']) - intval($getjumlahkaryawan['jumlah']);

?>
    <tr>
        <td><?= $getdatajabatan['nama_jabatan'] ?></td>
        <td>
            <?= $getjumlahkaryawan['jumlah'] ?>
        </td>
        <td>
            <?php
            if ($kekosongan <= 0) {
                echo '-';
            } else {
                echo '<span class="text-danger">' . $kekosongan . ' orang</span>';
            }
            ?>
        </td>

    </tr>

<?php endwhile ?>