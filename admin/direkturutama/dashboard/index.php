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

//monitoring jabatan
$queryjabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan` JOIN divisi USING(id_divisi) ORDER BY `id_jabatan` ASC");


//monitoring karyawan
$querykaryawan = mysqli_query($koneksi, "SELECT nama_karyawan, nama_jabatan, nama_divisi FROM `karyawan` JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi)  WHERE status_karyawan = 1");

//monitoring jabatan
$queryjabatan = mysqli_query($koneksi, "SELECT * FROM `jabatan` JOIN divisi USING(id_divisi) ORDER BY `id_jabatan` ASC");


while ($getdatajabatan = mysqli_fetch_assoc($queryjabatan)) {

	$id_jabatan = $getdatajabatan['id_jabatan'];

	$queryjumlahkaryawan = mysqli_query($koneksi, "SELECT COUNT(id_jabatan) as jumlah FROM `karyawan` WHERE id_jabatan = '$id_jabatan'");

	$getjumlahkaryawan = mysqli_fetch_assoc($queryjumlahkaryawan);

	$grafikjabatan[] = $getdatajabatan['nama_jabatan']. ' ' . $getdatajabatan['nama_divisi'];
	$grafikkaryawan[] = $getjumlahkaryawan['jumlah'];
}

?>


<div class="container-fluid">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-4 col-sm-6 col-xs-12  mx-auto">
				<div class="info-box bg-pink hover-expand-effect">
					<div class="icon">
						<i class="fas fa-user"></i>
					</div>
					<div class="content">
						<div class="text text-white">CALON KARYAWAN</div>
						<div class="number count-to  text-white" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= number_format($getck['jumlah']) ?></div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-xs-12  mx-auto">
				<div class="info-box bg-cyan hover-expand-effect">
					<div class="icon">
						<i class="fas fa-users"></i>
					</div>
					<div class="content">
						<div class="text text-white">KARYAWAN</div>
						<div class="number count-to  text-white" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= number_format($getk['jumlah']) ?></div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-xs-12  mx-auto">
				<div class="info-box bg-green hover-expand-effect">
					<div class="icon">
						<i class="fas fa-user-plus"></i>
					</div>
					<div class="content">
						<div class="text text-white">REKRUTMEN AKTIF</div>
						<div class="number count-to  text-white" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $getrek['jumlah'] ?></div>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="card  card-accent-success">
					<div class="card-body">
						<canvas id="myChart" width="400" height="120px"></canvas>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="card card-accent-success">
					<div class="card-header"><strong>Monitoring Karyawan</strong></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped text-center" style="width:100%" id="datakaryawan">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th>Divisi</th>
									</tr>
								</thead>

								<tbody>
									<?php $no = 1;
									while ($getdata = mysqli_fetch_assoc($querykaryawan)) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $getdata['nama_karyawan'] ?></td>
											<td><?= $getdata['nama_jabatan'] ?></td>
											<td><?= $getdata['nama_divisi'] ?></td>
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
				label: 'Grafik Karyawan',
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