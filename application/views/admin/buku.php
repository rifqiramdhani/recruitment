<div class="container-fluid">
	<div class="animated fadeIn">
		<div class="row ">
				<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
				<!-- <?php if ($this->session->flashdata('message')) : ?>
					<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
						<?= $this->session->flashdata('message') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?> -->

			<!-- table -->
			<div class="table-responsive">
				<table class="table text-center" id="datatableserver" style="width: 100%">
					<thead class="thead-dark">
						<tr>
							<th scope="col">No</th>
							<th scope="col">Kode Buku</th>
							<th scope="col">Judul</th>
							<th scope="col">Penulis</th>
							<th scope="col">Penerbit</th>
							<th scope="col">ISBN</th>
							<th scope="col">Kategori</th>
							<th scope="col">Jumlah Buku</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- /table -->

			<!-- Modal Update Produk-->
			<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form action="<?php echo base_url() . 'admin/page/update' ?>" method="post">

							<div class="modal-header">
								<h5 class="modal-title">Update Buku</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<input type="text" name="kode_buku" class="form-control" placeholder="Kode Buku" required readonly>
								</div>
								<div class="form-group">
									<input type="text" name="judul" class="form-control" placeholder="Judul" required>
								</div>
								<div class="form-group">
									<input type="text" name="penulis" class="form-control" placeholder="Penulis" required>
								</div>
								<div class="form-group">
									<input type="text" name="isbn" class="form-control" placeholder="ISBN" required>
								</div>
								<div class="form-group">
									<select name="kategori" class="form-control" placeholder="Kode Barang" required>
										<?php foreach ($kategories as $row) : ?>
											<option value="<?php echo $row['kategori_id']; ?>"><?php echo $row['nama_kategori']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-success">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Modal Hapus Produk-->
			<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form action="<?php echo base_url() . 'admin/page/delete' ?>" method="post">
							<div class="modal-header">
								<h5 class="modal-title">Hapus Buku</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<input type="hidden" name="kode_buku" class="form-control" placeholder="Kode Barang" required>
								<strong>Anda yakin mau menghapus record ini?</strong>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-success">Hapus</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Modal view detail -->
			<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Detail Buku</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input type="hidden" name="kode_buku" class="form-control" placeholder="Kode Barang" required>
							<strong>Anda yakin mau menghapus record ini?</strong>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>




		</div>
	</div>
</div>