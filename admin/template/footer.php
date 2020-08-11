<footer class="app-footer">
    <div>
        <span>&copy; 2020 Copyright <a href="https://bcs.co.id/">PT Bonli Cipta Sejahtera</a> </span>
    </div>
    <div class="ml-auto">
        <span>Developed by</span>
        <a href="#">Fathia</a>
    </div>
</footer>

<script src="<?= BASE_URL . 'assets/vendors/jquery/js/jquery.min.js'; ?>">
</script>
<script src="<?= BASE_URL . 'assets/vendors/bootstrap/js/bootstrap.min.js'; ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js'; ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/pace-progress/js/pace.min.js' ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/@coreui/coreui/js/coreui.min.js' ?>"></script>
<!-- form validation -->
<script src="<?= BASE_URL . 'assets/node_modules/bootstrap-validator/dist/validator.min.js'; ?>"></script>
<!-- datatables -->
<script src="<?= BASE_URL . 'assets/vendors/datatables/datatables.min.js' ?>"></script>
<!-- custom js -->
<script src="<?= BASE_URL . 'assets/js/custom.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- fontawesome -->
<script src="<?= BASE_URL . 'assets/js/all.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- smartwizard multistep form -->
<script src="<?= BASE_URL . 'assets/js/jquery.smartWizard.min.js' ?>"></script>
<!-- sweetaler 2 -->
<script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>
<!-- custom file input -->
<script src="<?= BASE_URL . 'assets/node_modules/bs-custom-file-input/dist/bs-custom-file-input.min.js' ?>"></script>
<!-- gijgo datepicker -->
<script src="<?= BASE_URL . 'assets/node_modules/datepicker/js/bootstrap-datepicker.min.js' ?>"></script>

<script>
    // Setup datatables 
    $(document).ready(function() {

        //init custom file input
        bsCustomFileInput.init()

        $('#tanggal_buka .input-group.date').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            language: "id",
            todayHighlight: true,
            autoclose: true
        });

        $('#tanggal_tutup .input-group.date').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            language: "id",
            todayHighlight: true,
            autoclose: true
        });

        //datakaryawan
        $("#datakaryawan").dataTable()

        //datakriteria
        $("#datakriteria").dataTable()

        //datadetailkriteria
        $("#datadetailkriteria").dataTable()

        //penilaiankaryawan
        $("#penilaiankaryawan").dataTable()

        //datasubkriteria
        $("#datasubkriteria").dataTable()

        //data fpkb
        $("#datafpkb").dataTable()
        $('#datafpkb').on('click', '.remove', function(e) {
            e.preventDefault();
            var id = $(this).data('id')
            var nama = $(this).data('nama')

            hapusdata('Data FPKB', "?page=fpkb&action=deletedata&id=", id, nama)
        });

        $('#datafpkb').on('click', '.penyerahankesdm', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            var text = "Ingin menyerahkan FPKB kepada Manager SDM?";
            swalhref(link, text);
        });

        $('#datafpkb').on('click', '.penyerahankesupport', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            var text = "Akan menyetujui FPKB";
            swalhref(link, text)
        });

        $('#datafpkb').on('click', '.tolakfpkb', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            var text = "Akan menolak FPKB";
            swalhref(link, text)
        });

        //hapus datadivisi
        $("#datadivisi").dataTable()
        $("#datadivisi").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Divisi', "?page=divisi&action=deletedata&id=", id, nama)
        })

        //hapus datadetailjabatan
        $("#datadetailjabatan").dataTable()
        $("#datadetailjabatan").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Divisi', "?page=detailjabatan&action=deletedata&id=", id, nama)
        })

        //hapus datajabatan
        $("#datajabatan").dataTable()
        $("#datajabatan").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Jabatan', "?page=jabatan&action=deletedata&id=", id, nama)

        })

        //hapus datakaryawan
        $("#datakaryawan").dataTable()
        $("#datakaryawan").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data karyawan', "?page=karyawan&action=deletedata&id=", id, nama)
        })

        //hapus datacalonkaryawan
        $("#datacalonkaryawan").dataTable()
        $("#datacalonkaryawan").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data calon karyawan', "?page=calon-karyawan&action=deletedata&id=", id, nama)
        })

        //hapus datalowongan
        $("#datalowongan").dataTable()
        $("#datalowongan").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            // console.log(id + nama)
            hapusdata('Data Rekrutmen', "?page=penerimaan&action=deletedata&id=", id, nama)
        })

        //tampilhalaman lowongan
        $("#datalowongan").on('click', '.tampilhalaman', function() {
            var id = $(this).data('id');

            $.ajax({
                url: "?page=penerimaan&action=visible&id=" + id,
                type: "post",
                data: {
                    'id_recruitment': id
                },
                success: function(response) {
                    // var page = 'admin/index.php?page=penerimaan';
                    // $(this).load(page);
                    location.reload()
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })

        //hapus datakriteriapenilaian
        $("#datakriteriapenilaian").dataTable()
        $("#datakriteriapenilaian").dataTable().on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data kriteria', "?page=kriteriapenilaian&action=deletedata&id=", id, nama)
        })

        //hapus datakriteria
        $("#datakriteria").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data kriteria', "?page=kriteria&action=deletedata&id=", id, nama)
        })

        //hapus datadetailkriteria
        $("#datadetailkriteria").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin Menghapus Data " + nama,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#db3325',
                cancelButtonColor: '#f5a732',
                confirmButtonText: "Hapus",
                cancelButtonText: "Kembali",
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= $level ?>/detail-kriteria/deletedata.php?id=" + id,
                        type: 'DELETE',
                        error: function(xhr, textStatus, error) {
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);
                        },
                        success: function(data) {
                            if (data) {
                                console.log(data)
                                Swal.fire({
                                    title: 'Kesalahan!',
                                    text: 'Cek console untuk melihat pesan kesalahan',
                                    icon: 'error'
                                })
                            } else {
                                $("#" + id).remove();
                                Swal.fire({
                                    title: 'Data detail kriteria rekrutmen',
                                    text: 'Data Berhasil Dihapus!',
                                    icon: 'success'
                                })
                            }
                        }
                    });
                }
            })
        })

        //hapus datasubkriteriapenilaia
        $("#datasubkriteriapenilaian").dataTable()
        $("#datasubkriteriapenilaian").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data subkriteria', "?page=subkriteriapenilaian&action=deletedata&id=", id, nama)
        })

        //hapus datasubkriteria
        $("#datasubkriteria").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data subkriteria', "?page=subkriteria&action=deletedata&id=", id, nama)
        })

        //hapus datapersyaratan
        $("#datapersyaratan").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Persyaratan', "?page=deskripsi&action=deletedata&id=", id, nama)
        })

        //edit deskripsi
        $("#savedeskripsi").click(function() {
            var deskripsi = $('textarea').val()
            var id_desk_recruitment = $('input[name="id_desk_rekrutmen"]').val()
            var id_lowongan = $('input[name="id_lowongan"]').val()

            $.ajax({
                url: "?page=deskripsi&penerimaan=" + id_lowongan,
                type: "post",
                data: {
                    'deskripsi': deskripsi,
                    'id_desk_rekrutmen': id_desk_recruitment
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Data Deskripsi',
                        text: 'Data Berhasil Diperbaharui!',
                        icon: 'success'
                    })
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })

        //tambah persyaratan
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $("#tambahfield"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            x++; //text box increment
            $(wrapper).append('<div id="field' + x + '"><div class="form-group"><input type="text" class="form-control" id="deskripsi' + x + '" name="deskripsi[]" data-required-error="Data tidak boleh kosong" required></div></div>'); //add input box
        });
        
        //data jabatan
        var id_divisi = $("#pilihdivisi option:selected").val()
        var page = "<?= BASE_URL . 'admin/' . $level . '/dashboard/datatable.php?id=' ?>" + id_divisi
        $("#newjabatan").append().load(page)

        $("#pilihdivisi").on("change", () => {
            var id_divisi = $("#pilihdivisi option:selected").val()
            var page = "<?= BASE_URL . 'admin/' . $level . '/dashboard/datatable.php?id=' ?>" + id_divisi

            // $(".table-responsive").remove()
            $("#newjabatan").append().load(page)
            // $("#tablepenilaian").remove()
            // $("#penilaianck").load(page)

        })

        //data penilaian
        $("#datapenilaiancalonkaryawan").dataTable()
        $("#datapenilaiancalonkaryawannew").dataTable()
        $("#selectrecruitment").on("change", () => {
            var id_recruitment = $("#selectrecruitment option:selected").val()
            var page = "<?= BASE_URL . 'admin/' . $level . '/penilaian-rekrutmen/datatable.php?id_recruitment=' ?>" + id_recruitment
            $("#tablepenilaian").remove()
            $("#penilaianck").load(page)

        })

        var id_recruitment = $("#selectrecruitment option:selected").val()
        var page = "<?= BASE_URL . 'admin/' . $level . '/penilaian-rekrutmen/datatable.php?id_recruitment=' ?>" + id_recruitment
        $("#penilaianck").load(page)

        //hitung penilaian
        $("#hitungpenilaian").click(() => {
            var id_recruitment = $("#selectrecruitment option:selected").val()

            $.ajax({
                url: "<?= $level ?>/penilaian-rekrutmen/proses-penilaian-v.php",
                type: "get",
                data: {
                    'id_recruitment': id_recruitment
                },
                success: function(response) {
                    $("#tablepenilaian").remove()
                    $("#tampilkanpenilaian").append(response)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })

        //tampilan penilaian karyawan
        $("#hitungpenilaiankaryawan").click(function() {
            // $("#tampilkaryawan").append()
            $.ajax({
                url: "<?= $level ?>/penilaian-karyawan/tampilkaryawan.php",
                type: "get",
                success: function(response) {
                    $("#tampilkaryawan").append(response)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })


        // sweetalert
        const flashdata = $('.flash-data').data('flashdata');
        const title = $('.flash-data').data('title');
        const type = $('.flash-data').data('type');

        if (flashdata) {
            Swal.fire({
                title: title,
                text: flashdata,
                icon: type
            })
        }

        // Setup datatables
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };



        //wizard multistep form
        // Toolbar extra buttons
        var btnFinish = $('<button></button>').text('Finish')
            .addClass('btn btn-info')
            .on('click', function() {
                if (!$(this).hasClass('disabled')) {
                    var elmForm = $("#myForm");
                    if (elmForm) {
                        elmForm.validator('validate');
                        var elmErr = elmForm.find('.has-error');
                        if (elmErr && elmErr.length > 0) {
                            alert('Tolong lengkapi data di form');
                            return false;
                        } else {
                            elmForm.submit();
                            return false;
                        }
                    }
                }
            });


        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows',
            transitionEffect: 'fade',
            transitionEffect: 'fade', // Effect on navigation, none/fade/slide/slideleft
            enableFinishButton: true, // makes finish button enabled always,
            contentCache: true,
            onFinish: onFinishCallback,
            labelFinish: 'Finish', // label for Finish button     
            labelCancel: 'Cancel',
            toolbarSettings: {
                toolbarPosition: 'bottom',
                toolbarExtraButtons: [btnFinish]
            },
        })

        function onFinishCallback() {
            $.ajax({
                type: 'POST',
                url: 'index.cfm?action=addClassData&nolayout',
                data: $('#myForm').serialize(),
                cache: false,
                success: function(ress) {
                    alert("successful post");
                    /*$("#editPage").jqmHide();*/
                }
            });
        }

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            if (stepDirection === 'forward' && elmForm) {
                elmForm.validator('validate');
                var elmErr = elmForm.children('.has-error');
                if (elmErr && elmErr.length > 0) {
                    // Form validation failed
                    return false;
                }
            }
            return true;
        });

        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if (stepNumber == 3) {
                $('.btn-finish').removeClass('disabled');
            } else {
                $('.btn-finish').addClass('disabled');
            }
        });

    });
</script>
</body>

</html>