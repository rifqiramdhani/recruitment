<?php
require_once('../../../function/koneksi.php');

$query = mysqli_query($koneksi, "SELECT karyawan.*,nama_divisi, nilai,id_penilaian_kmp, status FROM `penilaian_kmp` JOIN karyawan USING(id_karyawan) JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi) WHERE nilai > 0 ORDER BY nilai DESC");
?>

<div id="tampilkaryawannew">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Data Nilai Karyawan</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="tampilpenilaiankaryawan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Divisi</th>
                            <th>Nilai</th>
                            <th>Rekomendasi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($query) > 0) : ?>
                            <?php
                            $i = 1;
                            while ($getdata = mysqli_fetch_assoc($query)) : ?>
                                <tr id="<?= $getdata['id_penilaian_kmp'] ?>">
                                    <td><?= $i++ ?></td>
                                    <td><?= $getdata['nama_karyawan'] ?></td>
                                    <td><?= $getdata['email_karyawan'] ?></td>
                                    <td><?= $getdata['nama_divisi'] ?></td>
                                    <td>
                                        <?= $getdata['nilai'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        switch ($getdata['status']) {
                                            case 0:
                                                echo '-';
                                                break;

                                            case 1:
                                                echo '<button class="btn btn-sm btn-block btn-primary">Diangkat</button>';
                                                break;

                                            case 2:
                                                echo '<button class="btn btn-sm btn-block btn-danger">Diberhentikan</button>  ';
                                                break;

                                            case 3:
                                                echo '<button class="btn btn-sm btn-block btn-warning">Dipertimbangkan</button>  ';
                                                break;

                                            default:
                                                # code...
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" title="Mengangkat" class="btn btn-success btn-sm penilaianditerima <?php if ($getdata['status'] > 0) echo 'disabled'; ?>" data-id="<?= $getdata['id_penilaian_kmp'] ?>" data-nama="<?= $getdata['nama_karyawan'] ?>" <?php if ($getdata['status'] > 0) echo 'disabled'; ?>><i class="fas fa-check"></i></button>
                                        <button type="button" title="Memberhentikan" class="btn btn-danger btn-sm penilaianditolak <?php if ($getdata['status'] > 0) echo 'disabled'; ?>" data-id="<?= $getdata['id_penilaian_kmp'] ?>" data-nama="<?= $getdata['nama_karyawan'] ?>" <?php if ($getdata['status'] > 0) echo 'disabled'; ?>><i class="fas fa-times"></i></button>
                                        <button type="button" title="Mempertimbangkan" class="btn btn-warning btn-sm penilaianditimbang <?php if ($getdata['status'] > 0) echo 'disabled'; ?>" data-id="<?= $getdata['id_penilaian_kmp'] ?>" data-nama="<?= $getdata['nama_karyawan'] ?>" <?php if ($getdata['status'] > 0) echo 'disabled'; ?>><i class="fas fa-balance-scale"></i></button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">No data available in table</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    //tampilan penilaian karyawan
    function tampilkaryawan() {
        $.ajax({
            url: "managersdm/penilaian-karyawan/tampilkaryawan.php",
            type: "get",
            success: function(response) {
                console.log(response)

                $("#tampilkaryawannew").remove()
                $("#tampilkaryawan").append(response)
            }
        });
    }

    //penilaiandiretima
    $("#tampilpenilaiankaryawan").on('click', '.penilaianditerima', function() {
        var id_penilaian_kmp = $(this).data('id')
        var nama_karyawan = $(this).data('nama')

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin Mengangkat " + nama_karyawan,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4dbd74',
            cancelButtonColor: '#f5a732',
            confirmButtonText: "Yakin",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'managersdm/penilaian-karyawan/penyetujuan.php?persetujuan=setuju&id=' + id_penilaian_kmp,
                    type: 'get',
                    success: function(response) {
                        tampilkaryawan()
                        Swal.fire(
                            'Data Karyawan',
                            'Karyawan Berhasil Diangkat',
                            'success'
                        )
                    }
                })
            }
        })
    })

    //penilaianditolak
    $("#tampilpenilaiankaryawan").on('click', '.penilaianditolak', function() {
        var id_penilaian_kmp = $(this).data('id')
        var nama_karyawan = $(this).data('nama')

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin Memberhentikan " + nama_karyawan,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4dbd74',
            cancelButtonColor: '#f5a732',
            confirmButtonText: "Yakin",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'managersdm/penilaian-karyawan/penyetujuan.php?persetujuan=tidaksetuju&id=' + id_penilaian_kmp,
                    type: 'get',
                    success: function(response) {
                        tampilkaryawan()
                        Swal.fire(
                            'Data Karyawan',
                            'Karyawan Berhasil Diberhentikan',
                            'success'
                        )

                    }
                })
            }
        })
    })

    //penilaianditimbang
    $("#tampilpenilaiankaryawan").on('click', '.penilaianditimbang', function() {
        var id_penilaian_kmp = $(this).data('id')
        var nama_karyawan = $(this).data('nama')

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin Mempertimbangkan " + nama_karyawan,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4dbd74',
            cancelButtonColor: '#f5a732',
            confirmButtonText: "Yakin",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'managersdm/penilaian-karyawan/penyetujuan.php?persetujuan=pertimbangan&id=' + id_penilaian_kmp,
                    type: 'get',
                    success: function(response) {
                        tampilkaryawan()
                        Swal.fire(
                            'Data Karyawan',
                            'Karyawan Berhasil Diberhentikan',
                            'success'
                        )

                    }
                })
            }
        })
    })
</script>