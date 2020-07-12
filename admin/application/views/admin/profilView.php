<?php $title = 'Mon profil';
include 'localization.php';
?>

<div class="container-fluid" id="profil">
    <div class="row top_row">
        <div class="col-sm col_top">
            <img class="img-fluid background-image" src="<?= img_url('food_truck_1.jpg') ?>">
        </div>
    </div>

    <div class="row w-100 main_row d-flex justify-content-around">
        <div class="col-6 h-100 d-flex flex-column">
            <div class="text-center img_profil_container">
                <img src="<?= img_url('profil.jpg') ?>" class="img-thumbnail rounded img_profil" alt="">
            </div>
            <div class="text-center button_pages m-auto">
                <button type="button" class="btn btn-primary w-100">Mes coordonnées</button>
            </div>
        </div>
        <div class="col-6 text-center infos_container">

            <form id="container_infos_user">
                <div class="form-group row form_group">
                    <label for="first_name" class="col-sm-2 col-form-label"> Prénom </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $_SESSION['user']['first_name'] ?>">
                    </div>
                </div>
                <div class="form-group row form_group">
                    <label for="last_name" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $_SESSION['user']['last_name'] ?>">
                    </div>
                </div>
                <div class="form-group row form_group">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['user']['email'] ?>">
                    </div>
                </div>
                <div class="form-group row form_group">
                    <label for="phone" class="col-sm-2 col-form-label">Téléphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $_SESSION['user']['phone'] ?>" >
                    </div>
                </div>

                <div class="form-row form_group">
                    <label class="col-sm-2 col-form-label">Adresse</label>
                    <div class="form-group col">
                        <input type="number" class="form-control" id="number" name="number" placeholder="Numéro" value="<?= $_SESSION['user']['number'] ?>">
                    </div>
                    <div class="form-group col">
                        <input type="text" class="form-control" id="type_of_road" name="type_of_road" placeholder="Type de rue" value="<?= $_SESSION['user']['type_of_road'] ?>">
                    </div>
                    <div class="form-group col">
                        <input type="text" class="form-control" id="street" name="street" placeholder="Rue" value="<?= $_SESSION['user']['street'] ?>">
                    </div>
                </div>

                <div class="form-row form_group">
                    <label class="col-sm-2 col-form-label">Ville</label>
                    <div id="id_address_<?= $_SESSION['user']['id_address'] ?>" class="form-group col">
                        <input list="citiesList" class="form-control validateOnDatalist" name="city" id="list" placeholder="Ville" value="<?= $_SESSION['user']['name'] ?> (<?= $_SESSION['user']['zip_code'] ?>)">
                        <datalist id="citiesList">
                            <?php
                            foreach ($cities as $city)
                            {

                                $oneCity = $city['name'] . ' (' . $city['zip_code'] . ')';
                                ?>
                                <option data-id="<?= $city['id'] ?>" data-value="<?= $oneCity?>"><?= $oneCity ?></option>

                                <?php
                            }
                            ?>
                        </datalist>
                        <input type="hidden" id="cityInputHidden" class="hiddenVal" value="<?= $_SESSION['user']['city'] ?>">
                    </div>
                </div>
                <button id="submit_infos_user" type="submit" class="btn btn-primary">Enregister</button>
            </form>

            <form id="form_container_password" class=" mt-2" >
                <div class="form-group row form_group">
                    <div class="form-group col">
                        <input type="password" class="form-control" placeholder="Ancien mot de passe" id="password" name="password" value="">
                    </div>
                </div>
                <div class="form-group row form_group">
                    <div class="form-group col">
                        <input type="password" class="form-control" placeholder="Nouveau mot de passe" id="new_password" name="new_password" value="">
                    </div>
                </div>
                <div class="form-group row form_group">
                    <div class="form-group col">
                        <input type="password" placeholder="Confirmer nouveau mot de passe" class="form-control" id="check_new_password" name="check_new_password" value="">
                    </div>
                </div>
                <button id="submit_password_btn" type="submit" class="btn btn-primary">Enregister</button>
            </form>
        </div>
    </div>
</div>

<p id="here"></p>
