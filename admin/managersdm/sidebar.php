<?php
$queryNotifFpkb = mysqli_query($koneksi, "SELECT * FROM `fpkb` WHERE status_fpkb = 1");

$queryNotifNilaiRekrutmen = mysqli_query($koneksi, "SELECT calon_karyawan.*, id_rekrutmen, vector_s FROM `penilaian_rekrutmen` JOIN calon_karyawan ON penilaian_rekrutmen.id_calon_karyawan = calon_karyawan.id_calon_karyawan WHERE vector_s > 0");

$queryNotifNilaiKmp = mysqli_query($koneksi, "SELECT * FROM `penilaian_kmp` JOIN karyawan USING(id_karyawan) JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi)");


?>

<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'dashboard') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=dashboard'; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Beranda
                </a>
            </li>
            <li class="nav-title">REKRUTMEN</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'fpkb') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=fpkb'; ?>">
                    <i class="nav-icon fas fa-file-invoice"></i> FPKB
                    <?= mysqli_num_rows($queryNotifFpkb) > 0 ? '<span class="badge badge-danger">*</span>' : '' ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'penerimaan' || $page == 'kriteria' || $page == 'subkriteria' || $page == 'deskripsi') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=penerimaan'; ?>">
                    <i class="nav-icon fas fa-search"></i> Rekrutmen</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'penilaian-rekrutmen') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=penilaian-rekrutmen'; ?>">
                    <i class="nav-icon fas fa-star"></i> Penilaian Rekrutmen
                    <?= mysqli_num_rows($queryNotifNilaiRekrutmen) > 0 ? '<span class="badge badge-danger">' . mysqli_num_rows($queryNotifNilaiRekrutmen) . '</span>' : '' ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'detail-kriteria') echo 'active' ?>" href="?page=detail-kriteria">
                    <i class="nav-icon fas fa-clipboard-check"></i> Kriteria Rekrutmen
                </a>
            </li>
            <li class="nav-title">PENILAIAN</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'penilaian-karyawan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=penilaian-karyawan'; ?>">
                    <i class="nav-icon fas fa-star"></i> Penilaian Karyawan
                    <?= mysqli_num_rows($queryNotifNilaiKmp) > 0 ? '<span class="badge badge-danger">' . mysqli_num_rows($queryNotifNilaiKmp) . '</span>' : '' ?>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'kriteriapenilaian' || $page == 'subkriteriapenilaian') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=kriteriapenilaian'; ?>">
                    <i class="nav-icon fas fa-file-invoice"></i> Kriteria Penilaian</a>
            </li>

            <li class="nav-item nav-dropdown <?php if ($page == 'perbandingankriteria' || $page == 'perbandingansubkriteria') echo 'open' ?>">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fas fa-balance-scale"></i> Perbandingan</a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'perbandingankriteria') echo 'active' ?>" href="?page=perbandingankriteria">
                            <i class="nav-icon fas fa-clipboard-check"></i> Kriteria
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'perbandingansubkriteria') echo 'active' ?>" href="?page=perbandingansubkriteria">
                            <i class="nav-icon fas fa-clipboard-check"></i> Subkriteria
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-title">DATA MASTER</li>

            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'karyawan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=karyawan'; ?>">
                    <i class="nav-icon fas fa-user"></i> Karyawan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'jabatan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=jabatan'; ?>">
                    <i class="nav-icon fas fa-user"></i> Jabatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'divisi') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=divisi'; ?>">
                    <i class="nav-icon fas fa-user"></i>Divisi</a>
            </li>

        </ul>
    </nav>
</div>