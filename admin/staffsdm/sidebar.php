<?php
$queryNotifFpkb = mysqli_query($koneksi, "SELECT * FROM `fpkb` WHERE status_fpkb = 3");

$queryNotifNilaiRekrutmen = mysqli_query($koneksi, "SELECT calon_karyawan.* FROM `penilaian_rekrutmen` JOIN calon_karyawan USING(id_calon_karyawan) WHERE hasil = 1");

$queryNotifNilaiKmp = mysqli_query($koneksi, "SELECT karyawan.*, nama_divisi, status FROM `penilaian_kmp` JOIN karyawan USING(id_karyawan) JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi) WHERE status = 4 ORDER BY `id_penilaian_kmp` ASC");
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
                    <?= mysqli_num_rows($queryNotifFpkb) > 0 ? '<span class="badge badge-danger">' . mysqli_num_rows($queryNotifFpkb) . '</span>' : '' ?>
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

            <li class="nav-title">PENILAIAN</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'penilaian-karyawan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=penilaian-karyawan'; ?>">
                    <i class="nav-icon fas fa-star"></i> Penilaian Karyawan
                    <?= mysqli_num_rows($queryNotifNilaiKmp) > 0 ? '<span class="badge badge-danger">' . mysqli_num_rows($queryNotifNilaiKmp) . '</span>' : '' ?>
                </a>
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