<?php

require('../function/helper.php');
require('../function/koneksi.php');

cek_login();
$level = $_SESSION['level'];
$page = isset($_GET['page']) ? $_GET['page'] : 'Dashboard';
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
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active"><?= ucfirst($page) ?></li>
            </ol>
            <!-- load dynamic content  -->
            <?php 
                $file = $level . '/' . $page . '.php';
                if(file_exists($file)){
                    require($file);
                }else{
                    echo 'File tidak di temukan';
                }
            ?>
        </main>

    </div>

    <!-- load footer from template -->
    <?php require('template/footer.php') ?>