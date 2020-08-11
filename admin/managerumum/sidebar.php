<?php
$id_divisi = $_SESSION['id_divisi'];

$queryNotifPenilaian = mysqli_query($koneksi, "SELECT karyawan.*, nilai,id_penilaian_kmp, status,nama_divisi, id_divisi FROM `penilaian_kmp` JOIN karyawan USING(id_karyawan) JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi) WHERE id_divisi = '$id_divisi' AND status > 0 ORDER BY nilai DESC");


?>

<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'dashboard') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=dashboard'; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Beranda
                </a>
            </li>
            <li class="nav-title">Data</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'fpkb') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=fpkb'; ?>">
                    <i class="nav-icon fas fa-file-invoice"></i> FPKB</a>
            </li>
            <li class="nav-title">PENILAIAN</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'penilaian-karyawan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=penilaian-karyawan'; ?>">
                    <i class="nav-icon fas fa-star"></i> Penilaian Karyawan
                    <?= mysqli_num_rows($queryNotifPenilaian) > 0 ? '<span class="badge badge-danger">' . mysqli_num_rows($queryNotifPenilaian) . '</span>' : '' ?>
                </a>
            </li>
        </ul>
    </nav>
</div>