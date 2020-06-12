<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'dashboard') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=dashboard'; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                    <span class="badge badge-primary">NEW</span>
                </a>
            </li>
            <li class="nav-title">Components</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'penerimaan' || $page == 'kriteria' || $page == 'subkriteria'|| $page == 'deskripsi') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=penerimaan'; ?>">
                    <i class="nav-icon fas fa-search"></i> Penerimaan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'karyawan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=karyawan'; ?>">
                    <i class="nav-icon fas fa-user"></i> Karyawan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'calon-karyawan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=calon-karyawan'; ?>">
                    <i class="nav-icon fas fa-users"></i> Calon Karyawan</a>
            </li>
            <li class="nav-item nav-dropdown <?php if ($page == 'detail-kriteria') echo 'open' ?>">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fas fa-cog"></i> Detail</a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'detail-kriteria') echo 'active' ?>" href="?page=detail-kriteria">
                            <i class="nav-icon fas fa-clipboard-check"></i> Kriteria</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon icon-puzzle"></i> Tables</a>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>
</div>