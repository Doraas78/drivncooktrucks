<?php $title = 'Tableau de bord';
include 'localization.php';

?>

<section id="dashboardBackground"></section>
<div class="container-fluid" id="dashboard">

    <div class="row align-items-center header_title">
        <div class="col-md-10 offset-1 title">
            <h1><?= $lang['titre'] ?> <span>admin</span></h1>
        </div>
        <div class="col-md-1 ml-auto">
            <a href=" <?= site_url('auth', 'Auth', 'logout') ?> " class=""><i class="fas fa-sign-out-alt fa-3x logout"></i></a>
            <br>
        </div>

    </div>
    <div class="row mt-2 mb-5">
        <div class="col title1">
            <h2>
                <?= $lang['sousTitre'] ?>
            </h2>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <a href="<?= site_url('admin', 'Home', 'myFoodtruck') ?>">
                <button class="button button1"><?= $lang['foodtruck'] ?></button>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?= site_url('admin', 'Home', 'profil') ?>">
                <button class="button button2"><?= $lang['compte'] ?></button>
            </a>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <a href="<?= site_url('admin', 'Home', 'franchisee') ?>">
                <button class="button button3"><?= $lang['gestionFranchisés'] ?></button>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#">
                <button class="button button4"><?= $lang['gestionEntrepot'] ?></button>
            </a>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <a href="<?= site_url('admin', 'Home', 'truck') ?>">
                <button class="button button5"><?= $lang['gestionParc'] ?></button>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?= site_url('admin', 'Home', 'purchase') ?>">
                <button class="button button6"><?= $lang['gestionAchats'] ?></button>
            </a>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col">
            <a href="<?= site_url('admin', 'Home', 'event') ?>">
                <button class="button button7"><?= $lang['actu'] ?></button>
            </a>
        </div>
    </div>

    <div class="row justify-content-center news_container mt-5">
        <div class="col-3">
            <img class="limit" src="<?= img_url('délimiteur.png') ?>" alt="image">
        </div>
        <div class="col-6">
            <h2 class="title1">
                <?= $lang['titreActu'] ?>
            </h2>
        </div>
        <div class="col-3">
            <img class="limit" src="<?= img_url('délimiteur.png') ?>" alt="image">
        </div>
    </div>

    <!-- EVENTS LIST -->
    <div class="row d-flex justify-content-around">
        <div class="col-9 d-flex justify-content-center all_events_col">
            <div class="table-responsive all_events_container">
                <table class="table table-borderless">
                <tbody>
                <?php
                if(sizeof($news) < 2)
                    $max = sizeof($news);
                else
                    $max = 2;

                for($i = 0; $i < $max; $i++)
                    {
                        $new = $news[$i];
                        ?>
                        <tr>
                            <td class="text-justify">
                                <h1><?= $new[3] ?></h1>
                                <p><?= $new['description'] ?>
                                </p>
                            </td>
                            <td>
                                <img  src="<?= img_url('event_1.jpg') ?>" alt="">
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

</div>
