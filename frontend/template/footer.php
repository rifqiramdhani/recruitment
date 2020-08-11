<!-- footer content -->
<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>Get in touch<br></h3>
                    <h4>Location :</h4>
                    <p>Jl.Bojongkoneng No.8 & 8b, Cibeunying, Kec. Cimenyan, Bandung, Jawa Barat 40191<br></p>
                    <h4>Contact :<br></h4>
                    <p>Phone : (+62) 8221 777 8106 <br /> Email : <a href="mailto:haloinacookies@gmail.com">haloinacookies@gmail.com</a><br /></p>
                </div>
                <div class="col-sm-6 col-md-3 item">
                    <h3>About Us</h3>
                    <p>Bandung telah banyak sekali memberikan cerita dan kesan. Kini cerita inipun semakin lengkap dengan hadirnya Nastar Lembang. Oleh-oleh dengan resep khas selai nanas yang lumer di mulut berpadu dengan adonan lembut, halal dan tanpa bahan pengawet<br></p>
                </div>
                <div class="col-md-6 item text">
                    <h3>Company Name</h3>
                    <p>Uncode is a pixel perfect creative multiuse WordPress Theme designed with terrific attention to details, flexibility and performance. It is ultra professional, smooth and sleek, with a clean modern layout for almost any needs.</p>
                </div>
                <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
            </div>
            <p class="text-center copy-right">© 2020 Recruitment. All Rights Reserved | Design By Fathia<br></p>
        </div>
    </footer>
</div>

<!-- script javascript -->
<script src="frontend/assets/js/jquery.min.js"></script>
<script src="frontend/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="frontend/assets/js/bs-custom-file-input.min.js"></script>
<script src="frontend/assets/js/main.js"></script>
<!-- form validator -->
<script src="assets/node_modules/bootstrap-validator/dist/validator.min.js"></script>
<!-- sweetaler 2 -->
<script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>
<!-- custom js -->
<script src="assets/js/custom.js" type="text/javascript" charset="utf-8"></script>
<!-- smartwizard -->
<script src="assets/node_modules/jquery-smartwizard-master/dist/js/jquery.smartWizard.min.js" type="text/javascript" charset="utf-8"></script>

<script>
    $(document).ready(function() {
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

        //show modal lupa password
        $("#lupapassword").click(() => {
            $("#modal_login").modal('hide')

            setTimeout(() => {
                $("#modal_lupa_password").modal('show')
            }, 500);

        })

        $("#submitformlamaran").click(function(e) {
            e.preventDefault;
            var form = $(this).parents('form')
            Swal.fire({
                title: 'Apakah anda yakin data sesuai?',
                text: "Karena data yang dikirim tidak dapat diubah.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4dbd74',
                cancelButtonColor: '#f86c6b',
                confirmButtonText: "Submit",
                cancelButtonText: "Cancel",
            }).then((result) => {
                console.log(result)
                if (result.value) {
                    form.submit()
                }
            })
        })

        //wizard multistep form
        // Toolbar extra buttons
        var btnFinish = $('<button type="button"></button>').text('Finish')
            .addClass('btn btn-info')
            .on('click', function() {
                Swal.fire({
                    title: 'Peringatan!',
                    text: "Harap periksa kembali berkas yang anda masukan, karena berkas yang telah dimasukan tidak dapat diubah kembali. Jika berkas yang anda masukan telah sesuai silahkan tekan tombol simpan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Kembali",
                }).then((result) => {
                    if (result.value) {
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
                    }
                })
            });



        var btnCancel = $('<button></button>').text('Cancel')
            .addClass('btn btn-danger')
            .on('click', function() {
                $('#smartwizard').smartWizard("reset");
            });

        // Step show event
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if (stepNumber == 3) {
                $('.btn-finish').removeClass('disabled');
            } else {
                $('.btn-finish').addClass('disabled');
            }
        });

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

        $('#smartwizard').smartWizard("reset");

        // Smart Wizard
        $('#smartwizard').smartWizard({
            theme: 'dots',
            justified: true, // Nav menu justification. true/false
            transition: {
                animation: 'fade', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            },
            enableFinishButton: false, // makes finish button enabled always,
            contentCache: true,
            onFinish: onFinishCallback,
            enableURLhash: true, // Enable selection of the step based on url hash
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'center', // left, right, center
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                toolbarExtraButtons: [btnFinish] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
            },
            anchorSettings: {
                anchorClickable: true, // Enable/Disable anchor navigation
                enableAllAnchors: false, // Activates all anchors clickable all times
                markDoneStep: true, // Add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            },
            lang: { // Language variables for button
                next: 'Lanjut',
                previous: 'kembali'
            },
        });

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

        // External Button Events
        $("#reset-btn").on("click", function() {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");
            return true;
        });

        $("#prev-btn").on("click", function() {
            // Navigate previous
            $('#smartwizard').smartWizard("prev");
            return true;
        });

        $("#next-btn").on("click", function() {
            // Navigate next
            $('#smartwizard').smartWizard("next");
            return true;
        });
    })
</script>
</body>

</html>