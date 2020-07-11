<?php $title = 'Tableau de bord'; ?>

<div id="dashboard" class="p-4 container-fluid">

    <div class="row">
        <div class="col">
            <h1>Bienvenue <?= $_SESSION['customer']['first_name'] . ' ' . $_SESSION['customer']['last_name']; ?></h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-8">
            <h1>Mes commandes</h1>
            <div class="table-responsive my_orders_section">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <td class="text-justify">
                            <h1>Dégustation gratuite</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                ...
                            </p>

                        </td>
                        <td>
                            <img src="<?= img_url('event_1.jpg') ?>" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-justify">
                            <h1>Nouveau Foodtruck</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                ...
                            </p>

                        </td>
                        <td>
                            <img src="<?= img_url('event_2.jpg') ?>" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-4">
            <h1>Mes notifications</h1>
            <div class="table-responsive my_notications_section h-100 w-100">
            </div>
        </div>
    </div>
</div>
