<nav id="navbar_user" class="navbar navbar-expand navbar-light ">
    <a class="navbar-brand d-flex align-items-center" href="<?= site_url('user', 'Dashboard', 'index') ?>">
        <img src="<?= img_url('logo.png') ?>" width="80" height="80" class="d-inline-block align-top" alt="">
        <span class="ml-3">Driv'N Cook Trucks</span>
    </a>
    <div class="collapse navbar-collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav  ml-auto">
            <li class="page nav-item <?php if(isset($active_dashboard)) echo 'active'; ?> ">
                <a class="nav-link" href="<?= site_url('user', 'Dashboard', 'index') ?>"> <?php echo _('Accueil');?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="page nav-item <?php if(isset($active_order)) echo 'active'; ?>">
                <a class="nav-link" href="<?= site_url('user', 'Dashboard', 'toOrder') ?>"><?php echo _('Commander');?></a>
            </li>
            <li class="page nav-item <?php if(isset($active_profil)) echo 'active'; ?>">
                <a class="nav-link" href="<?= site_url('user', 'Dashboard', 'profil') ?>"><?php echo _('Profil');?></a>
            </li>
            <li class="page nav-item <?php if(isset($active_cart)) echo 'active'; ?>">
                <a class="nav-link" href="<?= site_url('user', 'Dashboard', 'cart') ?>"><?php echo _('Panier');?></a>
            </li>
            <li class="page nav-item <?php if(isset($active_event)) echo 'active'; ?>">
                <a class="nav-link" href="<?= site_url('user', 'Dashboard', 'event') ?>"><?php echo _('Evenement');?></a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('auth', 'Auth', 'logout') ?>">
                    <button class="btn btn_orange" type="button"><?php echo _('Se déconnecter');?></button>
                </a>
            </li>
        </ul>
    </div>
</nav>
