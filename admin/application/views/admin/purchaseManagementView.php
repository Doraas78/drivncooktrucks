<?php $title = 'Historique des achats';
include 'localization.php';
?>

<section id="purchaseManagementBackground"></section>
<div class="container-fluid" id="purchaseManagement">
    <div class="row d-flex align-items-center header_title">
        <div class="col-md-4 offset-md-4">
            <h1 class="title">Historique des achats</h1>
        </div>
        <div class="col-md-2 ml-auto">
            <a href="<?= site_url('admin', 'Home', 'index') ?>"> <button class="button previous_page"><?= $lang['pagePrecedente'] ?>> <img class="flech" src="<?= img_url('flech.png') ?>" alt=""></button></a>
        </div>
    </div>

    <!-- SEARCH BAR   -->
    <div class="row">
        <div class="col d-flex justify-content-center">
            <input type="search" class="site_search" aria-label="Search through back-office">
            <input type="image" class="search_button" alt="" src="<?= img_url('search.png') ?>">
        </div>
    </div>

    <!-- INFOS TABLE -->
    <div class="table-responsive d-flex justify-content-center mt-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="info_title">
                    Nom
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
                    Date
                    <div>
                        <i class="fas fa-sort-up"></i>
                        <i class="fas fa-sort-down"></i>
                    </div>
                </th>
                <th scope="col" class="info_title">
                    Entrepôt
                    <div>
                        <i class="fas fa-sort-up"></i>
                        <i class="fas fa-sort-down"></i>
                    </div>
                </th>
                <th scope="col" class="info_title">
                    Auteur
                    <div>
                        <i class="fas fa-sort-up"></i>
                        <i class="fas fa-sort-down"></i>
                    </div>
                </th>
                <th scope="col" class="info_title">
                    Montant HT
                    <div>
                        <i class="fas fa-sort-up"></i>
                        <i class="fas fa-sort-down"></i>
                    </div>
                </th>
                <th scope="col" class="info_title">
                    TVA
                    <div>
                        <i class="fas fa-sort-up"></i>
                        <i class="fas fa-sort-down"></i>
                    </div>
                </th>
                <th scope="col" class="info_title">
                    Récapitulatif
                    <div>
                        <i class="fas fa-sort-up"></i>
                        <i class="fas fa-sort-down"></i>
                    </div>
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
                <th scope="row" class="info">
                    Edition
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
                <th scope="row" class="info">
                    Edition
                </th>
                <th scope="row" class="info">
                    Edition
                </th>
                <th scope="row" class="info">
                    Edition
                </th>
                <th scope="row" class="info">
                    Edition
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

</div>

