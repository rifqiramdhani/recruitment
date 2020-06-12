<div class="collapse navbar-collapse" id="navcol-1">
    <ul class="nav navbar-nav ml-lg-auto text-center">
        <li class="nav-item <?php if ($page == false) echo 'active' ?>" role="presentation">
            <a class="nav-link" href="index.php">
                Home
            </a>
        </li>
        <li class="nav-item <?php if ($page == 'contact') echo 'active' ?>" role="presentation">
            <a class="nav-link" href="?page=contact">
                Contact
            </a>
        </li>
        <?php if (isset($_SESSION['login_calon_karyawan'])) : ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="frontend/olahdata/logout.php"><i class="fa fa-sign-out"></i>&nbsp;
                    Logout
                </a>
            </li>
        <?php else : ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_register"><i class="fa fa-user-o"></i>&nbsp;
                    Register
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_login"><i class="fa fa-lock"></i>&nbsp;
                    Login
                </a>
            </li>
        <?php endif ?>
    </ul>
</div>

