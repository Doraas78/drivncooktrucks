<?php $title = 'Profil'; ?>
<div id="here"></div>

<div id="profil" class="p-4 container-fluid h-100">
    <div id="here"></div>
    <div class="row h-100">
        <div class="col-3 d-flex flex-column justify-content-center navbar">
            <button type="button" class="btn btn-primary mb-3 d-flex align-items-center">
                <span class="font_btn_sizing">Données personnelles</span>
            </button>
            <button type="button" class="btn btn-primary mb-3 ">
                <span class="font_btn_sizing">Section client</span>
            </button>
        </div>

        <div class="col">
            <div class="row p-3">

                <div class="col text-center password_section m-3">

                    <!-- PASSWORD SECTION -->
                    <form id="form_password_section" class="h-100 d-flex flex-column p-3" novalidate>
                        <h1>Mot de passe</h1>
                        <div class="form-row m-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe actuel">
                        </div>
                        <div class="form-row m-3">
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nouveau mot de passe">
                        </div>
                        <div class="form-row m-3">
                            <input type="password" class="form-control" id="check_new_password" name="check_new_password" placeholder="Confirmer nouveau mot de passe">
                        </div>
                        <div class="form-row justify-content-center m-3">
                            <button type="submit" class="btn btn-primary mb-3 btn_save_password">
                                <span class="font_btn_sizing">Sauvegarder</span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col text-center email_section m-3">

                    <!-- EMAIL SECTION -->

                    <form id="form_email_section" class="h-100 d-flex flex-column p-3" novalidate>
                        <h1>Email</h1>
                        <div class="form-row">
                            <div class="form-group w-100">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$_SESSION['customer']['email'] ?>" disabled>
                            </div>
                            <div class="form-group w-100">
                                <input type="email" class="form-control" id="new_email" name="new_email" placeholder="Nouveau email">
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <button type="submit" class="btn btn-primary mb-3 btn_save_email">
                                <span class="font_btn_sizing">Sauvegarder</span>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="row w-100">
                    <div class="col infos_section m-3">

                        <!-- INFOS SECTION -->

                        <form class="h-100 d-flex flex-column p-3" id="form_infos_section" method="POST" action="<?= site_url('user', 'Profil', 'changeInfosCustomer') ?>">
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="text" class="form-control" id="number" name="number" placeholder="N°" value="<?=$_SESSION['customer']['number'] ?>">
                                </div>
                                <div class="form-group col">
                                    <input type="text" class="form-control" id="type_of_road" name="type_of_road" placeholder="Type de rue" value="<?=$_SESSION['customer']['type_of_road'] ?>">
                                </div>
                                <div class="form-group col">
                                    <input type="text" class="form-control" id="street" name="street" placeholder="Rue" value="<?=$_SESSION['customer']['street'] ?>">
                                </div>
                                <div class="form-group col list_city_col">
                                    <input type="text" id="city" class="form-control choose_city" placeholder="Selectionner votre ville..." name="city" value="<?=$_SESSION['customer']['name'] ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Prénom" value="<?=$_SESSION['customer']['first_name'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nom" value="<?=$_SESSION['customer']['last_name'] ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="N° de téléphone" value="<?=$_SESSION['customer']['phone'] ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <select id="gender" class="form-control" name="gender">
                                        <option value="1" >Femme</option>
                                        <option value="2">Homme</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="date" class="form-control" id="birthday_date" name="birthday_date" placeholder="Date de naissance" value="<?=$_SESSION['customer']['birthday_date'] ?>">
                                </div>
                            </div>
                            <div class="form-row align-self-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="newsletter" id="newsletter" <?php if($_SESSION['customer']['newsletter']) echo 'checked' ?> >
                                    <label class="custom-control-label" for="newsletter">Voulez vous recevoir les nouveautés et actualité des foodtrucks</label>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    <span class="font_btn_sizing">Sauvegarder</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="here"></div>

</div>


