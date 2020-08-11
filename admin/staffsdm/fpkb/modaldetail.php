<div class="modal fade" id="modaldetail<?= $getdata['id_fpkb'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Detail FPKB</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Pengaju</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['nama_karyawan'] ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Jabatan</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['nama_jabatan'] . ' ' . $getdata['nama_divisi'] ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Posisi yang dibutuhkan</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['posisi_dibutuhkan'] ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Jumlah dibutuhkan</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['jumlah_dibutuhkan'] ?> Orang
                        </span>
                    </div>
                </div>

                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Jumlah karyawan saat ini</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['jumlah_karyawan'] ?> Orang
                        </span>
                    </div>
                </div>

                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Tanggal Permintaan</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= date('d-m-Y', strtotime($getdata['tanggal_permintaan'])) ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Pendidikan Formal</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['pendidikan_formal'] ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Pengalaman</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['pengalaman'] ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Kompetensi</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['kompetensi'] ?>
                        </span>
                    </div>
                </div>
                <div class="form-group row border-bottom">
                    <div class="col-5 text-left">
                        <label for="">Usia</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['usia'] ?>
                        </span>
                    </div>
                </div>
                <div class="form-group row border-bottom">
                    <div class="col-5">
                        <label for="">Deskripsi Pekerjaan</label>
                        <span class="float-right">
                            :
                        </span>
                    </div>
                    <div class="col-7">
                        <span class="">
                            <?= $getdata['job_desc'] ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>