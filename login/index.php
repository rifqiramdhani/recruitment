<?php 

require('../function/helper.php');
// cek apakah user sudah login
if(isset($_SESSION['login'])) redirect('admin');

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Portal Login - PT Bonli Cipta Sejahtera</title>

    <!-- favicon -->

    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL. 'assets/img/favicons.png'?>">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- style core ui -->
    <link href="<?= BASE_URL. 'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?= BASE_URL. 'assets/vendors/pace-progress/css/pace.min.css'?>" rel="stylesheet">
    <link href="<?= BASE_URL. 'assets/css/custom.css'?>" rel="stylesheet">
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <?php require('view.php') ?>
        </div>
    </div>

    <script src="<?= BASE_URL. 'assets/vendors/jquery/js/jquery.min.js'?>"></script>
    <script src="<?= BASE_URL. 'assets/vendors/bootstrap/js/bootstrap.min.js'?>"></script>
    <script src="<?= BASE_URL. 'assets/vendors/pace-progress/js/pace.min.js'?>"></script>
    <!-- form validation -->
    <script src="<?php echo BASE_URL. 'assets/node_modules/bootstrap-validator/dist/validator.min.js'; ?>"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/5e43405e99.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('.btn-forgot-password').click(function() {
                alert('Silahkan Hubungi Staff SDM')
            })

            // setTimeout(function() {
            //     $(".btn-register").click();
            // }, 1000);
        })
    </script>

    <!-- script menampilkan form regist -->


</body>

</html>