<footer class="app-footer">
    <div>
        <span>&copy; 2020 Copyright <a href="https://bcs.co.id/">PT Bonli Cipta Sejahtera</a> </span>
    </div>
    <div class="ml-auto">
        <span>Developed by</span>
        <a href="#">Li</a>
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
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<!-- custom js -->
<script src="<?= BASE_URL . 'assets/js/custom.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- custom js -->
<script src="<?= BASE_URL . 'assets/js/all.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- jquery ui -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- smartwizard multistep form -->
<script src="<?= BASE_URL . 'assets/js/jquery.smartWizard.min.js' ?>"></script>
<!-- sweetaler 2 -->
<script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>
<script>
    // Setup datatables 
    $(document).ready(function() {

        //hapus datakaryawan
        $("#datakaryawan").dataTable()
        $("#datakaryawan").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data karyawan', "?page=karyawan&action=deletedata&id=", id, nama)
        })

        //hapus datalowongan
        $("#datalowongan").dataTable()
        $("#datalowongan").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data lowongan', "?page=penerimaan&action=deletedata&id=", id, nama)
        })

        //hapus datakriteria
        $("#datakriteria").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data kriteria', "?page=kriteria&action=deletedata&id=", id, nama)
            
        })

        //hapus datasubkriteria
        $("#datasubkriteria").on('click', '.remove', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data subkriteria', "?page=subkriteria&action=deletedata&id=", id, nama)
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