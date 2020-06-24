<?php

require('../function/helper.php');
require('../function/koneksi.php');


cek_login();
$level = $_SESSION['level'];
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : false;
?>

<!-- load header from template -->
<?php require('template/header.php') ?>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <!-- load navbar from template -->
    <?php require('template/navbar.php') ?>

    <div class="app-body">
        <!-- load dynamic sidebar -->
        <?php require($level . '/sidebar.php'); ?>

        <!-- Your content will be here-->
        <main class="main">
            <!-- Breadcrumb-->
            <ol class="breadcrumb">
                <?php if ($action) : ?>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item"><?= ucfirst($page) ?></li>
                    <li class="breadcrumb-item active"><?= ucfirst($action) ?></li>
                <?php else : ?>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active"><?= ucfirst($page) ?></li>
                <?php endif ?>
            </ol>
            <!-- load dynamic content  -->
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row ">
                        <?php
                        if ($action) {
                            $file = $level . '/' . $page . '/' . $action . '.php';
                            if (file_exists($file)) {
                                require($file);
                            } else {
                                echo 'File tidak di temukan';
                            }
                        } else {
                            $file = $level . '/' . $page . '/index.php';
                            if (file_exists($file)) {
                                require($file);
                            } else {
                                echo 'File tidak di temukan';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <!-- load footer from template -->
    <?php require('template/footer.php') ?>