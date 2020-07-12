<?php $title = 'Gestion des franchisés';
include 'localization.php';
?>


<section id="franchiseesManagementBackground"></section>
<div class="container-fluid" id="franchiseesManagement">

    <!-- HEADER -->
    <div class="row d-flex align-items-center header_title">
        <div class="col-md-4 offset-md-4">
            <h1 class="title">Gestion des franchisés</h1>
        </div>
        <div class="col-md-2 ml-auto ">
            <a href="<?= site_url('admin', 'Home', 'index') ?>">
                <button class="button previous_page"><?= $lang['pagePrecedente'] ?> <img class="flech" src="<?= img_url('flech.png') ?>" alt=""></button>
            </a>
        </div>
    </div>


    <!-- INFOS TABLE -->
    <div class="table-responsive mt-5">
        <table id="table_franchisee" class="table table-borderless">
            <thead>
            <tr>
                <th scope="col" class="info_title">#</th>
                <th scope="col" class="info_title">
                    Foodtruck (nom, type, n°)
                </th>
                <th scope="col" class="info_title">
                    Date d'arrivée
                </th>
                <th scope="col" class="info_title">
                    Chiffres de vente
                </th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- TEMPLATE EVENT ROW-->
<script type="text/template" id="template_franchisee_row">

    {{#each data}}
    <!-- ROW -->

    <tr id="{{ this.id }}">
        <th scope="row">{{inc @key}}</th>
        <th scope="row" class="info infos_foodtruck">
            <a href="<?= site_url('admin', 'Franchisee', 'franchiseeDetailsView')?>&id={{ this.id }}">{{ this.name }}</a>
        </th>
        <th scope="row" class="info infos_date">
            {{ this.creation_date }}
        </th>
        <th scope="row" class="info infos_number">
            Télécharger
        </th>
    </tr>

    {{/each}}
</script>


<div id="here"></div>