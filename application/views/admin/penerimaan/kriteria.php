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

            <h2>Data Kriteria - <?= $lowongan['nama_lowongan'] ?></h2>
            <div class="table responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Penerimaan</th>
                            <th>Tempat</th>
                            <th>Gaji</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>