<?php
require_once("../../../function/koneksi.php");

$id_recruitment = $_GET['id_recruitment'];
$query = mysqli_query($koneksi, "SELECT calon_karyawan.*, id_rekrutmen, vector_s, hasil FROM `penilaian_rekrutmen` JOIN calon_karyawan ON penilaian_rekrutmen.id_calon_karyawan = calon_karyawan.id_calon_karyawan WHERE id_rekrutmen = '$id_recruitment' ORDER BY hasil DESC");
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
                <?php if ($getdata['vector_s'] == 0) : ?>
                    <i class="far fa-times-circle"></i>
                <?php else : ?>
                    <i class="far fa-check-circle"></i>
                <?php endif ?>
            </td>
            <td><?= $getdata['hasil'] == 1 ? '<button class="btn btn-block btn-default col-green font-weight-bold">Diterima</button>' : '' ?></td>
            <td>
                <a href="?page=penilaian-rekrutmen&action=nilai&calon_karyawan=<?= $getdata['id_calon_karyawan'] ?>&penerimaan=<?= $id_recruitment ?>" class="btn btn-sm btn-primary">Nilai</a>
            </td>
        </tr>
    <?php endwhile;
else :
    ?>
    <tr>
        <td colspan="8">No data available in table</td>
    </tr>
<?php
endif;
?>