<div class="collapse navbar-collapse" id="navcol-1">
    <ul class="nav navbar-nav ml-lg-auto text-center">
        <li class="nav-item <?php if ($page == false) echo 'active' ?>" role="presentation">
            <a class="nav-link" href="index.php"><i class="fa fa-home"></i>&nbsp;
                Beranda
            </a>
        </li>
        <li class="nav-item <?php if ($page == 'contact') echo 'active' ?>" role="presentation">
            <a class="nav-link" href="?page=contact"><i class="fa fa-phone-square"></i>&nbsp;
                Kontak
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" href="admin"><i class="fa fa-lock"></i>&nbsp;
                Login Admin
            </a>
        </li>

    </ul>
</div>