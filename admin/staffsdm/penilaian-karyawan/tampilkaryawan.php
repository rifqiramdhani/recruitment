<?php
require_once('../../../function/koneksi.php');

$query = mysqli_query($koneksi, "SELECT karyawan.*, nilai,id_penilaian_kmp, status FROM `penilaian_kmp` JOIN karyawan USING(id_karyawan) JOIN jabatan USING(id_jabatan) WHERE nilai > 0 ORDER BY nilai DESC");
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
                            <th>Nilai</th>
                            <th>Status</th>
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

                                            default:
                                                # code...
                                                break;
                                        }
                                        ?>
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
            url: "staffsdm/penilaian-karyawan/tampilkaryawan.php",
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
            title: 'Apakah yakin?',
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
                    url: 'staffsdm/penilaian-karyawan/penyetujuan.php?persetujuan=setuju&id=' + id_penilaian_kmp,
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
            title: 'Apakah yakin?',
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
                    url: 'staffsdm/penilaian-karyawan/penyetujuan.php?persetujuan=tidaksetuju&id=' + id_penilaian_kmp,
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