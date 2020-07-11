<?php $title = 'mon Foodtruck';
include 'localization.php';
?>
<section id="myFoodTruckBackground"></section>
<div class="container-fluid" id="myFoodTruck">
    <!-- HEADER -->
    <div class="row d-flex align-items-center header_title">
        <div class="col-md-4 offset-md-4">
            <h1 class="title">Mon Foodtruck</h1>
        </div>
        <div class="col-md-2 ml-auto ">
            <a href="<?= site_url('admin', 'Home', 'index') ?>"> <button class="previous_page"><?= $lang['pagePrecedente'] ?> <img class="flech" src="<?= img_url('flech.png') ?>" alt=""></button></a>
        </div>
    </div>

    <!-- PAGES NAVIGATION -->
    <div class="row">
        <div class="col d-flex justify-content-center">
            <button type="button" class="button">Ingrédients</button>
        </div>
        <div class="col d-flex justify-content-center">
            <button type="button" class="button">Plats / Boissons</button>
        </div>
        <div class="col d-flex justify-content-center">
            <button type="button" class="button">Cartes</button>
        </div>
    </div>

    <!-- SEARCH FACTORY -->
    <div class="row mx-auto search_factory mt-5 d-flex justify-content-center align-items-center">
        <div class="col d-flex justify-content-center">
            <button type="button" class="button">Filtre</button>
        </div>
        <div class="col d-flex justify-content-center">
            <button type="button" class="button">Filtre</button>

        </div>
        <div class="col d-flex justify-content-center">
            <button type="button" class="button">Filtre</button>
        </div>
        <div class="col d-flex justify-content-center">
            <button type="button" class="button">Filtre</button>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="table-responsive d-flex justify-content-center mt-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="info_title">
                    Produit
                    <div>
                        <i class="fas fa-sort-up"></i>
                        <i class="fas fa-sort-down"></i>
                    </div>
                </th>
                <th scope="col" class="info_title">
                    Type
                    <div>
                        <i class="fas fa-sort-up"></i>
                        <i class="fas fa-sort-down"></i>
                    </div>
                </th>
                <th scope="col" class="info_title">
                    Quantité
                    <div>
                        <i class="fas fa-sort-up"></i>
                        <i class="fas fa-sort-down"></i>
                    </div>
                </th>
                <th scope="col" class="info_title">
                </th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th scope="row" class="info">
                    nom / prenom
                </th>
                <th scope="row" class="info">
                    foodtruck
                </th>
                <th scope="row" class="info">
                    date
                </th>
                <th scope="row" class="info">
                    Chiffres de vente
                </th>
            </tr>
            <tr>
                <th scope="row" class="info">
                    nom / prenom
                </th>
                <th scope="row" class="info">
                    foodtruck
                </th>
                <th scope="row" class="info">
                    date
                </th>
                <th scope="row" class="info">
                    Chiffres de vente
                </th>

            </tr>
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="row justify-content-end fixed-bottom">
        <div class="col-md-1 col-sm-2 navigation_pages_block">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- BUTTONS SUPP -->
    <div class="row ">
        <div class="col">
            <button class="btn-lg button_warehouse" type="button">Contacter l'entrepôt</button>
        </div>
        <div class="col">
            <button class="btn-lg button_add_action" type="button">Ajouter</button>
        </div>
    </div>

</div>