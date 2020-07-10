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

//monitoring karyawan
$querykaryawan = mysqli_query($koneksi, "SELECT nama_karyawan, nama_jabatan, nama_divisi FROM `karyawan` JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi)  WHERE status_karyawan = 1");
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
				<div class="card card-accent-success">
					<div class="card-header"><strong>Data Karyawan</strong></div>
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
									<?php $no=1; while ($getdata = mysqli_fetch_assoc($querykaryawan)) : ?>
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