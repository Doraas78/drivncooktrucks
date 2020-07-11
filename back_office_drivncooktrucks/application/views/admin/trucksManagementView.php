<?php $title = 'Gestion des Food Trucks';
include 'localization.php';
?>


<section id="trucksManagementBackground"></section>
<div class="container-fluid" id="trucksManagement">
    <div class="row align-items-center header_title">
        <div class="col-md-6 offset-md-3">
            <h1 class="title">Gestion du parc de Food Trucks</h1>
        </div>
        <div class="col-md-2 ml-auto ">
            <a href="<?= site_url('admin', 'Home', 'index') ?>">
                <button class="button previous_page"><?= $lang['pagePrecedente'] ?> <img class="flech" src="<?= img_url('flech.png') ?>" alt=""></button>
            </a>
        </div>
    </div>


    <!-- INFOS TABLE -->
    <div id="container_table_trucks" class="table-responsive">

        <!--<table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col" class="info_title">
                    Nom
                </th>
                <th scope="col" class="info_title">
                    Immatriculation
                </th>
                <th scope="col" class="info_title">
                    Emplacement
                </th>
                <th scope="col" class="info_title">
                    Disponibilité
                </th>
            </tr>
            </thead>

            <tbody>
                <tr>
                    <th scope="row" class="info infos_owner">
                    </th>
                    <th scope="row" class="info infos_immatriculation">
                    </th>
                    <th scope="row" class="info infos_location">
                    </th>
                    <th scope="row" class="info infos_availibilty">
                    </th>
                </tr>
            </tbody>
        </table>-->

    </div>

</div>


<!-- TEMPLATE EVENT ROW-->
<script type="text/template" id="template_truck_row">

    <table id="table_all_trucks" class="table table-borderless">
        <thead>
        <tr>
            <th scope="col" class="info_title">
                Nom
            </th>
            <th scope="col" class="info_title">
                Immatriculation
            </th>
            <th scope="col" class="info_title">
                Emplacement
            </th>
            <th scope="col" class="info_title">
                Disponibilité
            </th>
        </tr>
        </thead>
        <tbody>

        {{#each data}}
        <!-- ROW -->

        <tr>
            <th scope="row" class="info infos_owner">
                <a href="<?= site_url('admin', 'Truck', 'truckDetailsView')?>&id={{ this.idTruck }}">{{ this.truckName }}</a>
            </th>
            <th scope="row" class="info infos_immatriculation">
                {{ this.immatriculation }}
            </th>
            <th scope="row" class="info infos_location">
                {{ this.number }}  {{ this.type_of_road }}  {{ this.street }}, {{ this.cityName }} {{ this.zip_code }}
            </th>
            <th scope="row" class="info infos_availibilty">
                    {{#if this.idFranchisee}}
                        <button type="button" class="btn btn-outline-danger">Occupé</button>
                    {{else}}
                        <button type="button" class="btn btn-outline-success">Disponible</button>
                    {{/if}}
            </th>
        </tr>
        {{/each}}
        </tbody>
    </table>

</script>



<div id="here">


</div>