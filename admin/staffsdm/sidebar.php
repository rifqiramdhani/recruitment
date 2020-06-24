<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'dashboard') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=dashboard'; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-title">REKRUTMEN</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'calon-karyawan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=calon-karyawan'; ?>">
                    <i class="nav-icon fas fa-users"></i> Calon Karyawan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'karyawan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=karyawan'; ?>">
                    <i class="nav-icon fas fa-user"></i> Karyawan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'penilaian-rekrutmen') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=penilaian-rekrutmen'; ?>">
                    <i class="nav-icon fas fa-star"></i> Penilaian Rekrutmen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'penerimaan' || $page == 'kriteria' || $page == 'subkriteria' || $page == 'deskripsi') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=penerimaan'; ?>">
                    <i class="nav-icon fas fa-search"></i> Rekrutmen</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'fpkb') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=fpkb'; ?>">
                    <i class="nav-icon fas fa-file-invoice"></i> FPKB</a>
            </li>
            <li class="nav-title">PENILAIAN</li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'penilaian-karyawan') echo 'active' ?>" href="<?= BASE_URL . 'admin/index.php?page=penilaian-karyawan'; ?>">
                    <i class="nav-icon fas fa-star"></i> Penilaian Karyawan</a>
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
            <li class="nav-title">SETTING</li>
            <li class="nav-item nav-dropdown <?php if ($page == 'detail-kriteria') echo 'open' ?>">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fas fa-cog"></i> Setting</a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'detail-kriteria') echo 'active' ?>" href="?page=detail-kriteria">
                            <i class="nav-icon fas fa-clipboard-check"></i> Kriteria Rekrutmen
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'jabatan') echo 'active' ?>" href="?page=jabatan">
                            <i class="nav-icon fas fa-clipboard-check"></i> Jabatan
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>
</div>