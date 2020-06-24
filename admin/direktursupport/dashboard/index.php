<?php

//calon karyawan
$queryck = mysqli_query($koneksi, "SELECT COUNT(id_calon_karyawan) as jumlah FROM `calon_karyawan` WHERE status_calon_karyawan = 1");
$getck = mysqli_fetch_assoc($queryck);

//karyawan
$queryk = mysqli_query($koneksi, "SELECT COUNT(id_karyawan) as jumlah FROM `karyawan` WHERE status_karyawan = 1");
$getk = mysqli_fetch_assoc($queryk);

//karyawan
$queryrek = mysqli_query($koneksi, "SELECT COUNT(id_rekrutmen) as jumlah FROM `rekrutmen` WHERE status_rekrutmen = 1");
$getrek = mysqli_fetch_assoc($queryrek);
?>

<div class="container-fluid">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-4 col-sm-6 col-xs-12  mx-auto">
				<div class="info-box bg-pink hover-expand-effect">
					<div class="icon">
						<i class="fas fa-list-ul"></i>
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
						<i class="fas fa-question-circle"></i>
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

			<div class="col-md-6">
				<div class="container-fluid">
					<div class="block-header">
						<h2>Monitoring Kekosongan Jabatan</h2>
					</div>
					<div class="card">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Jabatan</th>
									<th>Kekurangan</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>Account Receivable Administrator</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Account Receivable Administrator</td>
									<td class="font-danger">5 Orang</td>
								</tr>
								<tr>
									<td>Account Receivable Administrator</td>
									<td>-</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>


			<!--/.col-->
		</div>
		<!--/.row-->

		<!--/.row-->
	</div>

</div>