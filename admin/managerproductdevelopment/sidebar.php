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
                    <i class="nav-icon fas fa-star"></i> Penilaian Karyawan</a>
            </li>
        </ul>
    </nav>
</div>