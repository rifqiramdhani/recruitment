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
    <title>403</title>

    <link href="<?= base_url('assets/vendors/simple-line-icons/css/simple-line-icons.css') ?>" rel="stylesheet">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('assets/img/site.webmanifest') ?>">
    <link rel="mask-icon" href="<?= base_url('assets/img/safari-pinned-tab.svg') ?>" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- style core ui -->
    <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/pace-progress/css/pace.min.css') ?>" rel="stylesheet">
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="clearfix">
                    <h1 class="float-left display-3 mr-4">403</h1>
                    <h4 class="pt-3">Oops! Access Forbidden</h4>
                    <p class="text-muted">Unfortunately you don't have the permissions required to access this page.</p>
                </div>
                <?php $level = strtolower($this->session->userdata('level'))  ?>
                <a href="<?= base_url() . $level .'/page/dashboard' ?>" class="btn btn-block btn-light">Go home</a>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/vendors/jquery/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pace-progress/js/pace.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/@coreui/coreui/js/coreui.min.js') ?>"></script>
    <script>
        $('#ui-view').ajaxLoad();
        $(document).ajaxComplete(function() {
            Pace.restart()
        });
    </script>
</body>

</html>