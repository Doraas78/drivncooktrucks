<?php
include ('localization.php');
$title = $lang['Bienvenue'];
?>
<div id="home">
    <div class="jumbotron jumbotron-fluid p-1 background" style="height: 400px">
        <div class="row">
            <div class="col d-flex flex-column">
                <img src="<?= img_url('logo2.png') ?>" alt="Driv'N Cook Trucks" style="width: 200px; height: 200px" class="img-fluid align-self-center">
                <p class="align-self-center" id="slogan1">
                    <?php echo  $lang['Des Foodtrucks tout']."\n"; echo $lang['près de chez vous']?>
                </p>
            </div>
            <div class="col d-flex flex-column justify-content-center" id="rightSide">
                <p class="text-danger display-4 w-50 align-self-center" id="slogan2">
                    Fast, Friendly, Quality
                </p>
                <p class="text-white font-weight-bold" style="font-family: Comfortaa-Bold" >Driv'N Cook Trucks</p>
            </div>
        </div>
    </div>
    <div class= "container-fluid px-0" id="containerHome" >
        <div class="row no-gutters">
            <div class="pl-5 col-4 no-gutters">
                <a class="button1" href="<?= site_url('home', 'Foodtrucks', 'index');?>">
                    <div class="card" style="width: 24rem;">
                        <img class="card-img-top" src="<?= img_url('localisation.jpg') ?>" alt="Card image cap">
                        <div class="card-body" style="background-color: rgb(252,126,84)">
                            <h5 class="card-title"><?php echo $lang['Nos FoodTrucks']; ?>  </h5>
                            <p class="card-text"><?php echo $lang['Des Food Trucks près de chez vous ? Allez jetez un oeil à notre carte! Ils se déploient très rapidement !']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="pl-5 col-4 no-gutters">
                <a class="button2" href="<?= base_url() . "public/PA/"  ?>">
                    <div class="card" style="width: 24rem;">
                        <img class="card-img-top" src="<?= img_url('immersion.png') ?>" alt="Card image cap">
                        <div class="card-body" style="background-color: #A7D2BD">
                            <h5 class="card-title"><?php echo $lang['Le concept']; ?></h5>
                            <p class="card-text"><?php echo $lang['Vivez une immersion 3D dans un environnement festif à base de burgers et de champagne à volonté !']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="pl-5 col-4 no-gutters">
                <a class="button3" href="#">
                    <div class="card" style="width: 24rem;">
                        <img class="card-img-top" src="<?= img_url('cuistot.png') ?>" alt="Card image cap">
                        <div class="card-body" style="background-color: #FFC857">
                            <h5 class="card-title"><?php echo $lang['Nous recrutons !']; ?></h5>
                            <p class="card-text"><?php echo $lang ['Devenir franchisé? C\'est possible! Remplir notre formulaire de candidature'];?> </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>