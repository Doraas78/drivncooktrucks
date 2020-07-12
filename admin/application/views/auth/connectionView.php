<?php $title =  'Connexion'; ?>

<div class="container-fluid" id="connection">
    <div class="row top_row">
        <div class="col-sm col_top">
            <img class="img-fluid background-image" src="<?= img_url('food_truck_1.jpg') ?>">
<!--            <button type="submit" class="btn btn-primary forget-password">Mot de passe oublié ?</button>-->
        </div>
    </div>

    <div class="row main_row">
        <div class="col-6 main_left text-center">
            <img id="logo2" class="img-fluid" src="<?= img_url('logo2.png') ?>" alt="">
        </div>
        <div class="col-6 text-center main_login" id="col_form">
            <form action="<?= site_url('auth', 'Auth', 'login')?>" id="connectionForm">
                <h1>Connexion</h1>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Email" maxlength="80" autofocus required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe"  maxlength="80" required>
                </div>
                <button type="submit" name="connectionForm" class="btn btn-primary btn_connection_form">Se connecter</button>
            </form>
        </div>
    </div>

    <div class="row foot_row">
        <div class="col-sm col_foot">
            <img class="img-fluid background-image" src="<?= img_url('ice_cream.jpg') ?>" alt="">
        </div>
    </div>
</div>


<div id="here"></div>