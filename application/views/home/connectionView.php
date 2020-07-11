
<!--

<div id="connection" class="container-fluid vh-100 d-flex flex-column align-items-center">

    <div class="row d-flex w-100 m-2">
        <div class="d-flex justify-content-center" style="flex-grow: 2;">
            <h1>Inscription Driv'N Cook Trucks</h1>
        </div>
        <div class="d-flex justify-content-end">
            <a class="nav-link" href="<?/*= site_url('home', 'Home', 'index') */?>">
                <button class="btn btn_orange" type="button">Retour</button>
            </a>
        </div>

    </div>
    <div class="row w-50 h-100">
        <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center">

            <form id="connectionForm" class="w-75">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn_connection_form">Connexion</button>
            </form>
            <button type="button" class="btn btn-primary btn_forgot_password" data-toggle="modal" data-target="#forgetPasswordModal">
                Mot de passe oublié ?
            </button>
        </div>
    </div>

</div>


 Button trigger modal -->

<!-- Modal --><!--
<div class="modal fade" id="forgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgetPasswordModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Récupérer son mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="forgetPasswordForm" class="w-75">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary btn_forgot_password_send">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="here"></div>-->

<?php include('localization.php');
$title = $lang['Connexion'] ?>

<div id="connection" class="container-fluid vh-100 d-flex flex-column align-items-center">

    <div class="row d-flex w-100 m-2">
        <div class="d-flex justify-content-center" style="flex-grow: 2;">
            <h1><?php echo $lang['Connexion Driv\'N Cook Trucks']?></h1>
        </div>
        <div class="d-flex justify-content-end">
            <a class="nav-link" href="<?= site_url('home', 'Home', 'index') ?>">
                <button class="btn btn_orange" type="button"><?php echo $lang['Retour'] ?></button>
            </a>
        </div>

    </div>
    <div class="row w-50 h-100">
        <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center">

            <form id="connectionForm" class="w-75">
                <div class="form-group">
                    <label for="email"><?php echo $lang['Email']?></label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password"><?php echo $lang['Mot de passe']?></label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn_connection_form"><?php echo $lang['Connexion'] ?></button>
            </form>

        </div>
    </div>

</div>