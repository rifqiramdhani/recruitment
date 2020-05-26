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

            <h2>Data Penerimaan Lowongan Kerja</h2>
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
                        <?php $i = 1;
                        foreach ($lowongan as $getdata) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $getdata->nama_lowongan ?></td>
                                <td>Lembang</td>
                                <td><?= $getdata->gaji_lowongan ?></td>
                                <td><?= $getdata->waktu_lowongan ?></td>
                                <td>
                                    <i class="far fa-check-circle"></i>
                                </td>
                                <td>
                                    <a href="page/admin" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger" title="Edit"><i class="fas fa-trash"></i></a>
                                </td>
                                <td>
                                    <a href="<?= base_url($level . '/page/kriteria/'. $getdata->id_lowongan) ?>" class="btn btn-dark">Kriteria</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>