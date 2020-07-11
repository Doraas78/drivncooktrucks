<?php include ('localization.php');
$title = $lang['Inscription'] ?>

<div class="vh-100" id="backgroundSignIn"></div>

<div id="signIn" class="container-fluid vh-100 d-flex flex-column align-items-center">

    <div class="row d-flex w-100 m-2">
        <div class="d-flex justify-content-center" style="flex-grow: 2;">
            <h1><?php echo $lang['Inscription Driv\'N Cook Trucks'] ?></h1>
        </div>
        <div class="d-flex justify-content-end">
            <a class="nav-link" href="<?= site_url('home', 'Home', 'index') ?>">
                <button class="btn btn_orange" type="button"><?php echo $lang['Retour'] ?></button>
            </a>
        </div>

    </div>

    <div class="row w-75">
        <div class="col">
            <form id="signInForm" novalidate>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="email"><?php echo $lang['Email'] ?></label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password"><?php echo $lang['Mot de passe'] ?></label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="check_password"><?php echo $lang['Confirmation mot de passe']?></label>
                        <input type="password" class="form-control" id="check_password" name="check_password">
                    </div>
                </div>

                <h5 class="mr-5"><?php echo $lang['Adresse']?></h5>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="number">N°</label>
                        <input type="text" class="form-control" id="number" name="number">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="type_of_road"><?php echo $lang['Type de rue']?></label>
                        <input type="text" class="form-control" id="type_of_road" name="type_of_road">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="street"><?php echo $lang['Rue']?></label>
                        <input type="text" class="form-control" id="street" name="street">
                    </div>
                    <div class="form-group col list_city_col">
                        <label for="city"><?php echo $lang['Ville']?></label>
                        <input type="text" id="city" class="form-control choose_city" placeholder=<?php echo $lang['Selectionner votre ville...'] ?> name="city">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name"><?php echo $lang['Prénom']?></label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name"><?php echo $lang['Nom']?></label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone"><?php echo $lang['Téléphone']?></label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="gender"><?php echo $lang['Sexe']?></label>
                        <select id="gender" class="form-control" name="gender">
                            <option disabled selected><?php echo $lang['Choisissez...']?></option>
                            <option value="1"><?php echo $lang['Femme']?></option>
                            <option value="2"><?php echo $lang['Homme']?></option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="birthday_date"><?php echo $lang['Date de naissance'] ?> </label>
                        <input type="date" class="form-control" id="birthday_date" name="birthday_date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agreement" name="agreement">
                        <button id="btn_conditions" type="button" class="btn btn-primary" data-toggle="modal" data-target="#conditions">
                            <?php echo $lang['J\'accepte les conditions']?>
                        </button>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="newsletter" id="newsletter">
                        <label class="custom-control-label" for="newsletter"><?php echo $lang['Voulez vous recevoir les nouveautés et actualités des foodtrucks ?']?></label>
                    </div>
                </div>
                <button type="submit" name="signInFormBtn" class="btn btn-primary"><?php echo $lang['Inscription']?></button>
            </form>
        </div>
    </div>

</div>

<div id="here"></div>
<!-- Modal -->
<div class="modal fade" data- id="conditions" tabindex="-1" role="dialog" aria-labelledby="conditionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="conditionsLabel"><?php echo $lang['Conditions générales d’utilisation du site drivncooktrucks']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h1><?php echo $lang['Article 1 : Objet'];?></h1>
                <p><?php echo $lang['article1_description']?></p>
                <h1><?php echo $lang['Article 2 : Mentions légales']?></h1>
                <p><?php echo $lang['article2_description']?></p>
                <h1><?php echo $lang['Article 3 : Accès au site']?></h1>
                <p><?php echo $lang['article3_description']?></p>
                <h1><?php echo $lang['Article 4 : Collecte des données']?></h1>
                <p><?php echo $lang['article4_description']?></p>

                <h1><?php echo $lang['Article 5 : Propriété intellectuelle']?></h1>
                <p><?php echo $lang['article5_description']?></p>
                <h1><?php echo $lang['Article 6 : Responsabilité']?></h1>
                <p><?php echo $lang['article6_description']?></p>
                <h1><?php echo $lang['Article 7 : Liens hypertextes']?></h1>
                <p><?php echo $lang['article7_description']?></p>
                <h1><?php echo $lang['Article 8 : Cookies']?></h1>
                <p><?php echo $lang['article8_description']?></p>
                <h1><?php echo $lang['Article 9 : Publication par l’Utilisateur']?></h1>
                <p><?php echo $lang['article9_description']?></p>
                <h1><?php echo $lang['Article 11 : Durée du contrat']?></h1>
                <p><?php echo $lang['Le présent contrat est valable pour une durée indéterminée. Le début de l’utilisation des services du site marque l’application du contrat à l’égard de l’Utilisateur.']?></p>
                <h1><?php echo $lang['Article 12 : Droit applicable et juridiction compétente']?></h1>
                <p><?php echo $lang['Le présent contrat est soumis à la législation française. L’absence de résolution à l’amiable des cas de litige entre les parties implique le recours aux tribunaux français compétents pour régler le contentieux.']?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['Fermer']?></button>
            </div>
        </div>
    </div>
</div>