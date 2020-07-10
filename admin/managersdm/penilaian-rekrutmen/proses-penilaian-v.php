<?php
require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');


$level = $_SESSION['level'];

$id_recruitment = $_GET['id_recruitment'];

$query = mysqli_query($koneksi, "SELECT * FROM `penilaian_rekrutmen` WHERE id_rekrutmen = '$id_recruitment' AND vector_s > 0");

if (isset($_GET['disetujui'])) {
    $id_penilaian_rekrutmen = $_GET['id_penilaian_rekrutmen'];
    mysqli_query($koneksi, "UPDATE `penilaian_rekrutmen` SET `hasil`=1 WHERE `id_penilaian_rekrutmen` = '$id_penilaian_rekrutmen'");
}


if (mysqli_num_rows($query) > 0) {
    $total_vector_s = 0;
    while ($getdata = mysqli_fetch_assoc($query)) {
        $id_calon_karyawan[] = $getdata['id_calon_karyawan'];
        $vector_s[] = $getdata['vector_s'];
        $total_vector_s += $getdata['vector_s'];
    }

    $length_s = count($vector_s);

    for ($i = 0; $i < $length_s; $i++) {
        $vector_v[] = round($vector_s[$i] / $total_vector_s, 3);
        // echo $vector_v[$i];

        $hasil_vektor_v = $vector_v[$i];
        $id_calon_karyawan2 = $id_calon_karyawan[$i];
        mysqli_query($koneksi, "UPDATE `penilaian_rekrutmen` SET `vector_v`='$hasil_vektor_v' WHERE `id_rekrutmen` = '$id_recruitment' AND `id_calon_karyawan` = '$id_calon_karyawan2'");
    }
}

$queryhasil_vektor_v = mysqli_query($koneksi, "SELECT penilaian_rekrutmen.*, nama_calon_karyawan,email_calon_karyawan,telp_calon_karyawan FROM `penilaian_rekrutmen` JOIN calon_karyawan ON calon_karyawan.id_calon_karyawan = penilaian_rekrutmen.id_calon_karyawan WHERE id_rekrutmen = '$id_recruitment' AND vector_v > 0 ORDER BY `penilaian_rekrutmen`.`vector_v`  DESC");

?>



<div class="card card-accent-success" id="tablepenilaian">
    <div class="card-header"><strong>Data Penilaian Rekrutmen</strong></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center" style="width:100%" id="hasilpenilaianv">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Nilai Vector V</th>
                        <th>Hasil Rekrutmen</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($queryhasil_vektor_v) > 0) : ?>
                        <?php $i = 1;
                        while ($getdatav = mysqli_fetch_assoc($queryhasil_vektor_v)) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $getdatav['nama_calon_karyawan'] ?></td>
                                <td><?= $getdatav['email_calon_karyawan'] ?></td>
                                <td><?= $getdatav['telp_calon_karyawan'] ?></td>
                                <td><?= $getdatav['vector_v'] ?></td>
                                <td class="hasil">
                                    <?php if ($getdatav['hasil'] == 0) : ?>
                                        <i class="far fa-times-circle"></i>
                                    <?php else : ?>
                                        <i class="far fa-check-circle"></i>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm penerimaannilai" data-id="<?= $getdatav['id_penilaian_rekrutmen'] ?>" data-nama="<?= $getdatav['nama_calon_karyawan'] ?>"><i class="fas fa-check"></i></button>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">No data available in table</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $("#hasilpenilaianv").on('click', '.penerimaannilai', function() {
        String.prototype.capitalize = function() {
            return this.charAt(0).toUpperCase() + this.slice(1);
        }

        var id_penilaian_rekrutmen = $(this).data('id');
        var nama = $(this).data('nama')
        var newnama = nama.capitalize();

        Swal.fire({
            title: 'Apakah yakin?',
            text: "Ingin Menerima " + newnama + " Menjadi Karyawan Masa Percobaan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4dbd74',
            cancelButtonColor: '#db3325',
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= BASE_URL . 'admin/' . $level . '/penilaian-rekrutmen/proses-penilaian-v.php' ?>",
                    type: "get",
                    data: {
                        'id_penilaian_rekrutmen': id_penilaian_rekrutmen,
                        'disetujui': 'ya'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Data Calon Karyawan',
                            text: newnama + ' Diterima Menjadi Karyawan Masa Percobaan',
                            icon: 'success'
                        })
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

                $(this).closest('tr').find('td:eq(5) svg').removeClass('fa-times-circle').addClass('fa-check-circle')
                $(this).closest('tr').find('td:eq(5) svg').attr('data-icon', 'check-circle')
            }
        })

    })
</script>