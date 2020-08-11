<?php

//jabatan
$queryjabatan = mysqli_query($koneksi, "SELECT COUNT(id_jabatan) as jumlah FROM `jabatan`");
$getjabatan = mysqli_fetch_assoc($queryjabatan);

//karyawan
$queryk = mysqli_query($koneksi, "SELECT COUNT(id_karyawan) as jumlah FROM `karyawan` WHERE status_karyawan = 1 AND id_jabatan <> ''");
$getk = mysqli_fetch_assoc($queryk);

//divisi
$querydivisi = mysqli_query($koneksi, "SELECT COUNT(id_divisi) as jumlah FROM `divisi`");
$getdivisi = mysqli_fetch_assoc($querydivisi);

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
						<div class="text text-white">JABATAN</div>
						<div class="number count-to  text-white" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= number_format($getjabatan['jumlah']) ?></div>
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
						<i class="fas fa-user"></i>
					</div>
					<div class="content">
						<div class="text text-white">DIVISI</div>
						<div class="number count-to  text-white" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $getdivisi['jumlah'] ?></div>
					</div>
				</div>
			</div>


			<!--/.col-->
		</div>
		<!--/.row-->

		<!--/.row-->
	</div>

</div>