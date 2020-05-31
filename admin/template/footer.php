<footer class="app-footer">
    <div>
        <span>&copy; 2020 Copyright PT Bonli Cipta Sejahtera</span>
    </div>
    <div class="ml-auto">
        <span>Powered by</span>
        <a href="#">Rifqi Ramdhani</a>
    </div>
</footer>

<script src="<?= BASE_URL . 'assets/vendors/jquery/js/jquery.min.js'; ?>">
</script>
<script src="<?= BASE_URL . 'assets/vendors/popper.js/js/popper.min.js'; ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/bootstrap/js/bootstrap.min.js'; ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js'; ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/pace-progress/js/pace.min.js' ?>"></script>
<script src="<?= BASE_URL . 'assets/vendors/@coreui/coreui/js/coreui.min.js' ?>"></script>
<!-- Plugins and scripts required by this view-->
<script src="<?= BASE_URL . 'assets/vendors/chart.js/js/Chart.min.js'; ?>"></script>
<script src="<?= BASE_URL . 'assets/js/charts.js'; ?>"></script>
<!-- form validation -->

<script src="<?= BASE_URL . 'assets/node_modules/bootstrap-validator/dist/validator.min.js'; ?>"></script>
<!-- datatables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<!-- custom js -->
<script src="<?= BASE_URL . 'assets/js/custom.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- fontawesome -->
<script src="https://kit.fontawesome.com/5e43405e99.js" crossorigin="anonymous"></script>
<script src="<?= BASE_URL . 'assets/vendors/pace-progress/js/pace.min.js' ?>"></script>
<!-- jquery ui -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- smartwizard multistep form -->
<script src="<?= BASE_URL . 'assets/js/jquery.smartWizard.min.js' ?>"></script>
<!-- sweetaler 2 -->
<script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>
<script>
    // Setup datatables 
    $(document).ready(function() {

        $('a[href="page/admin"]').css('color', 'green')

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

        var table = $("#datatableserver").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#datatableserver_filter input')
                    .off('.DT')
                    .on('input.DT', function() {
                        api.search(this.value).draw();
                    });
            },
            responsive: true,
            oLanguage: {
                sProcessing: '<div class="loader" id="loader-3"></div>'
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "",
                "type": "POST"
            },
            columns: [{
                    "data": "id",
                    "orderable": false
                },
                {
                    "data": "kode_buku"
                },
                {
                    "data": "judul"
                },
                {
                    "data": "penulis"
                },
                {
                    "data": "penerbit"
                },
                {
                    "data": "ISBN"
                },
                {
                    "data": "nama_kategori"
                },
                {
                    "data": "jumlah_buku"
                },
                {
                    "data": "view"
                }
            ],
            order: [
                [1, 'asc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }

        });

        // end setup datatables

        // get Edit Records
        $('#datatableserver').on('click', '.edit_record', function() {
            var kode = $(this).data('kode');
            var judul = $(this).data('judul');
            var penulis = $(this).data('penulis');
            var isbn = $(this).data('isbn');
            var kategori = $(this).data('kategori');
            $('#ModalUpdate').modal('show');
            $('[name="kode_buku"]').val(kode);
            $('[name="judul"]').val(judul);
            $('[name="penulis"]').val(penulis);
            $('[name="kategori"]').val(kategori);
            $('[name="isbn"]').val(isbn);
        });
        // End Edit Records

        // get Hapus Records
        $('#datatableserver').on('click', '.hapus_record', function() {
            var kode = $(this).data('kode');
            $('#ModalHapus').modal('show');
            $('[name="kode_buku"]').val(kode);
        });
        // End Hapus Records

        //get view record
        $('#datatableserver').on('click', '.view_record', function() {
            var kode = $(this).data('kode');
            var judul = $(this).data('judul');
            var penulis = $(this).data('penulis');
            var isbn = $(this).data('isbn');
            var kategori = $(this).data('kategori');
            $('#ModalView').modal('show');
            $('[name="kode_buku"]').val(kode);
            $('[name="judul"]').val(judul);
            $('[name="penulis"]').val(penulis);
            $('[name="kategori"]').val(kategori);
            $('[name="isbn"]').val(isbn);
        });
        // end view record

        //ajax autocomplete
        // autocomplete
        $(function() {
            function log(message) {
                $("<div>").text(message).prependTo("#log");
                $("#log").scrollTop(0);
            }

            $("#nf-email").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $('#nf-password').val(ui.item.judul)
                    log("Selected: " + ui.item.value + " aka " + ui.item.id);
                }
            });
        });


        $(function() {
            function log(message) {
                $("<div>").text(message).prependTo("#log");
                $("#log").scrollTop(0);
            }

            $("input[name='level']").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            $('#tableWizard tbody').remove();
                            $('#tableWizard').show();

                            tbody = $("<tbody></tbody>");

                            $.each(data, function(key, value) {
                                tr = $("<tr></tr>");
                                tr.append("<td>" + value.nama + "</td>");
                                tr.append("<td>" + value.email + "</td>");
                                tr.append("<td>" + value.alamat + "</td>");

                                $("#tableWizard").append(tbody);
                                $("#tableWizard tbody").append(tr);
                            });
                        }
                    });
                },
                minLength: 1,
            });
        });

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