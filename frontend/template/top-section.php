<body>
    <a id="back-to-top" class="btn btn-light btn-lg back-to-top" href="#"><i class="fa fa-chevron-up"></i></a>
    <section class="d-flex flex-column justify-content-between" id="top-section-page">
        <div id="header-top" class="mt-3">
            <nav class="navbar navbar-dark navbar-expand-lg">
                <div class="container-fluid">
                    <h1>
                        <a class="navbar-brand" href="index.php">
                            <img class="navbar-brand-full" src="<?= BASE_URL . 'assets/img/brand/bcs.png' ?>" width="150" height="48" alt="PT Bonli Cipta Sejahtera">
                        </a>
                    </h1>
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

                    <?php require('frontend/template/navbar.php') ?>
                </div>
            </nav>
        </div>
    </section>