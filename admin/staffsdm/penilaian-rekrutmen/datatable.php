<?php
require_once("../../../function/koneksi.php");

$id_recruitment = $_GET['id_recruitment'];
$query = mysqli_query($koneksi, "SELECT calon_karyawan.*, id_recruitment_fore FROM `detail_recruitment` JOIN calon_karyawan ON id_calon_karyawan_fore = id_calon_karyawan WHERE id_recruitment_fore = '$id_recruitment'");

?>

<?php
if (mysqli_num_rows($query) > 0) :

    $i = 1;
    while ($getdata = mysqli_fetch_assoc($query)) : ?>
        <tr id="<?= $getdata['id_calon_karyawan'] ?>">
            <td><?= $i++ ?></td>
            <td><?= $getdata['nama_calon_karyawan'] ?></td>
            <td><?= $getdata['email_calon_karyawan'] ?></td>
            <td><?= $getdata['telp_calon_karyawan'] ?></td>
            <td><?= $getdata['ttl_calon_karyawan'] ?></td>
            <td><?= $getdata['alamat_calon_karyawan'] ?></td>
            <td>
                <a href="?page=penilaian-recruitment&action=nilai&calon_karyawan=<?= $getdata['id_calon_karyawan'] ?>&penerimaan=<?= $id_recruitment ?>" class="btn btn-sm btn-primary">Nilai</a>
            </td>
        </tr>
    <?php endwhile;
else :
    ?>
    <tr>
        <td colspan="7">No data available in table</td>
    </tr>
<?php
endif;
?>