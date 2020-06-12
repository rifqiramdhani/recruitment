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
            <p class="text-center copy-right">© 2020 Recruitment. All Rights Reserved | Design By Li<br></p>
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
    })
</script>
</body>

</html>