<?php

//calon karyawan
$queryck = mysqli_query($koneksi, "SELECT COUNT(id_calon_karyawan) as jumlah FROM `calon_karyawan` WHERE status_calon_karyawan = 1");
$getck = mysqli_fetch_assoc($queryck);

//karyawan
$queryk = mysqli_query($koneksi, "SELECT COUNT(id_karyawan) as jumlah FROM `karyawan` WHERE status_karyawan = 1");
$getk = mysqli_fetch_assoc($queryk);

//rekturmen
$queryrek = mysqli_query($koneksi, "SELECT COUNT(id_rekrutmen) as jumlah FROM `rekrutmen` WHERE status_rekrutmen = 1");
$getrek = mysqli_fetch_assoc($queryrek);

//
$id_karyawan = $_SESSION['id_karyawan'];
$querykar = mysqli_query($koneksi, "SELECT id_divisi, nama_divisi FROM `karyawan` JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi) WHERE id_karyawan = '$id_karyawan'");
$getkar = mysqli_fetch_assoc($querykar);
$id_divisi = $getkar['id_divisi'];
$nama_divisi = $getkar['nama_divisi'];

//monitoring jabatan
$queryjabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan` JOIN divisi USING(id_divisi) WHERE id_divisi = '$id_divisi' ORDER BY `id_jabatan` ASC");


?>

<div class="container-fluid">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card  card-accent-success">
					<div class="card-body">
						<canvas id="myChart" width="400" height="120px"></canvas>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="card card-accent-success">
					<div class="card-header"><strong>Monitoring Kekosongan Jabatan</strong></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered text-center" style="width:100%" id="datakaryawan">
								<thead>
									<tr>
										<th>Jabatan</th>
										<th>Jumlah Karyawan</th>
										<th>Kekosongan</th>
									</tr>
								</thead>

								<tbody>
									<?php
									while ($getdatajabatan = mysqli_fetch_assoc($queryjabatan)) :

										$id_jabatan = $getdatajabatan['id_jabatan'];

										$queryjumlahkaryawan = mysqli_query($koneksi, "SELECT COUNT(id_jabatan) as jumlah FROM `karyawan` WHERE id_jabatan = '$id_jabatan'");

										$getjumlahkaryawan = mysqli_fetch_assoc($queryjumlahkaryawan);


										$kekosongan = intval($getdatajabatan['jumlah_jabatan']) - intval($getjumlahkaryawan['jumlah']);

										$grafikjabatan[] = $getdatajabatan['nama_jabatan'];
										$grafikkaryawan[] = $getjumlahkaryawan['jumlah'];

									?>
										<tr>
											<td><?= $getdatajabatan['nama_jabatan'] . ' ' . $getdatajabatan['nama_divisi'] ?></td>
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
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>


			<!--/.col-->
		</div>
		<!--/.row-->

		<!--/.row-->
	</div>

</div>

<?php
$grafikkaryawan = array_map('intval', $grafikkaryawan);
?>
<script>
	var ctx = document.getElementById('myChart');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($grafikjabatan) ?>,
			datasets: [{
				label: '<?= $nama_divisi ?>',
				data: <?= json_encode($grafikkaryawan) ?>,
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			tooltips: {
				callbacks: {
					label: function(tooltipItem, data) {
						var tooltipValue = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
						return parseInt(tooltipValue).toLocaleString();
					}
				}
			},
			responsive: true,
		}
	});
</script>