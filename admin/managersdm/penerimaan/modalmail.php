<div class="modal fade" id="modalmail<?= $getdata['id_calon_karyawan'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form action="staffsdm/penerimaan/kirimemail.php" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pesan"> Pesan Email </label>
                        <textarea name="pesan" id="pesan" cols="30" rows="8" class="form-control" autofocus>Sdr/sdri <?= $getdata['nama_calon_karyawan'] ?> anda di panggil untuk melakukan wawancara pada &#13;&#10;Tanggal : -&#13;&#10;Tempat  : Jl.Bojongkoneng No.8 & 8b, Cibeunying, Kec. Cimenyan, Bandung, Jawa Barat 40191. &#13;&#10;Serta bawa berkas asli pada saat wawancara.
                    </textarea>
                    </div>
                    <input type="hidden" value="<?= $getdata['email_calon_karyawan'] ?>" name="email">
                    <input type="hidden" value="<?= $_GET['penerimaan'] ?>" name="penerimaan">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Kirim</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>