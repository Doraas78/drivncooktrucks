<?php $title = 'Franchisee';
include 'localization.php';
?>

<div class="container-fluid" id="franchiseeDetails">
    <!-- HEADER -->
    <div class="row d-flex align-items-center header_title">
        <div class="col-md-4 offset-md-4">
            <h1 class="title">Franchisee</h1>
        </div>
        <div class="col-md-2 ml-auto ">
            <a href="<?= site_url('admin', 'Home', 'franchisee') ?>"> <button class="previous_page"><?= $lang['pagePrecedente'] ?> <img class="flech" src="<?= img_url('flech.png') ?>" alt=""></button></a>
        </div>
    </div>


    <!-- INFOS -->
    <div class="row" id="pdf">
        <div class="col text-center franchisee_truck_info p-3">
            <h1><?= $franchisee['name'] ?></h1><p class="font-weight-light font">Camion</p>
            <h3>Addresse du camion</h3>
            <form id="formTruckFranchisee" class="id_truck_<?= $franchisee['id_truck'] ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="number" name="number" placeholder="Numéro" value="<?= $franchisee['number'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="type_of_road" name="type_of_road" placeholder="Type de rue" value="<?= $franchisee['type_of_road'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="street" name="street" placeholder="Rue" value="<?= $franchisee['street'] ?>">
                    </div>
                    <div id="id_address_<?= $franchisee['id_address'] ?>" class="form-group col-md-6">
                        <input list="citiesList" class="form-control validateOnDatalist" name="city" id="list" placeholder="Ville" value="<?= $franchisee['nameCity'] ?> (<?= $franchisee['zip_code'] ?>)">
                        <datalist id="citiesList">
                            <?php
                                foreach ($cities as $city)
                                {

                                    $oneCity = $city['name'] . ' (' . $city['zip_code'] . ')';
                                    ?>
                                    <option data-id="<?= $city['id'] ?>" data-value="<?= $oneCity?>"><?= $oneCity ?></option>

                                <?php }

                            ?>
                        </datalist>
                        <input type="hidden" id="cityInputHidden" class="hiddenVal" value="<?= $franchisee['city'] ?>">
                    </div>
                </div>
                <button id="btnFormTruckFranchisee" type="submit" class="btn btn-success">Enregistrer</button>
            </form>
        </div>
        <div class="col text-center">
            <h1>Informations</h1>
            <div>
                <p>Date de prise de contrat : <?= $franchisee['dateCreationFranchisee'] ?> </p>
            </div>
        </div>
    </div>

    <!-- DOWNLOAD SALES-->
    <div class="row mt-5">
        <div class="col w-100 justify-content-center text-center">
            <h1>Son chiffres d'affaire</h1>
            <button onclick="generatePDF()">
                <i class="fa fa-download icon_download" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <!-- DELETE BUTTON -->
    <div class="row fixed-bottom m-5">
        <div class="col justify-content-end align-items-end">
            <a href="<?= site_url('admin', 'Franchisee','deleteFranchisee') ?>&id=<?= $franchisee['idFranchisee']?>">
                <button type="button" class="btn btn-danger">Supprimer le franchisee</button>
            </a>
        </div>
    </div>
</div>
