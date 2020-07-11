<nav id="navbar_user" class="navbar navbar-expand navbar-light ">
    <a class="navbar-brand d-flex align-items-center" href="<?= site_url('user', 'Dashboard', 'index') ?>">
        <img src="<?= img_url('logo.png') ?>" width="80" height="80" class="d-inline-block align-top" alt="">
        <span class="ml-3">Driv'N Cook Trucks</span>
    </a>
    <div class="collapse navbar-collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav  ml-auto">
            <li class="page nav-item <?php if(isset($active_dashboard)) echo 'active'; ?> ">
                <a class="nav-link" href="<?= site_url('franchisee', 'Home', 'index') ?>">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="page nav-item <?php if(isset($active_event)) echo 'active'; ?>">
                <a class="nav-link" href="<?= site_url('franchisee', 'Home', 'event') ?>">Evenement</a>
            </li>
            <li class="page nav-item <?php if(isset($active_my_foodtruck)) echo 'active'; ?>">
                <a class="nav-link" href="<?= site_url('franchisee', 'Home', 'myFoodtruck') ?>">Mon foodtruck</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('auth', 'Auth', 'logout') ?>">
                    <button class="btn btn_orange" type="button">Se déconnecter</button>
                </a>
            </li>
        </ul>
    </div>
</nav>
