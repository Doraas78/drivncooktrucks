<nav class="navbar navbar-expand-lg navbar-light" style="height: 9%">
    <a class="navbar-brand d-flex align-items-center" href="<?= site_url('home', 'Home', 'index');?>">
        <img src="<?= img_url('logo.png') ?>" width="80" height="80" class="d-inline-block align-top" alt="">
        <span class="ml-3"><?php echo _('Driv\'N Cook Trucks');?></span>
    </a>
    <div class="collapse navbar-collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav  ml-auto justify-content-center">
            <li class="nav-item <?php if(isset($active_welcome)) echo 'active'; ?>">
                <a class="nav-link" href="<?= site_url('home', 'Home', 'index');?>"> <?php echo $lang['Accueil'];?></a>
            </li>
            <li class="nav-item <?php if(isset($active_about)) echo 'active'; ?>">
                <a class="nav-link" href="<?= site_url('home', 'About', 'index');?>"> <?php echo $lang['À propos'];?></a>
            </li>
            <li class="nav-item <?php if(isset($active_foodtrucks)) echo 'active'; ?>">
                <a class="nav-link" href="<?= site_url('home', 'Foodtrucks', 'index');?>"> <?php echo $lang['Nos FoodTrucks'];?></a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('home', 'Home', 'connection') ?>">
                    <button class="btn btn_orange" type="button"><?php echo $lang['Connexion']?></button>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('home', 'Home', 'signIn') ?>">
                    <button class="btn btn_orange" type="button"><?php echo $lang['Inscription'];?></button>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-md-1 ml-auto" >
        <b><a href="?lang=fr"> <img src="<?= $lang['lang_fr'] ?>"> </a></b>
        <br>
        <b><a href="?lang=en"><img src="<?= $lang['lang_en'] ?>" x"></a></b>
    </div>
</nav>