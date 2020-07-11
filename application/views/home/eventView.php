<?php $title = 'Actualités'; ?>

<section id="eventsBackground"></section>
<div class="container-fluid" id="events">

    <!-- HEADER -->
    <div class="row d-flex align-items-center header_title">
        <div class="col-md-4 offset-md-4">
            <h1 class="title">Actualités</h1>
        </div>
        <div class="col-md-2 ml-auto ">
            <a href="<?= site_url('admin', 'Home', 'home') ?>"> <button class="previous_page">Retour <img class="flech" src="<?= img_url('flech.png') ?>" alt=""></button></a>
        </div>
    </div>

    <!-- EVENTS INFO -->
    <div class="row d-flex justify-content-around">
        <!-- events -->
        <div class="col-5 table-responsive events_container all_events_container h-100">
            <h1>Tous les événement</h1>
            <table class="table table-borderless table-hover">
                <tbody>

                <!-- template_event_row -->

                </tbody>
            </table>
            <div id="pagination_container_all_events"></div>
        </div>
        <!-- my events -->
        <div class="col-5 table-responsive events_container my_events_container h-100">
            <h1>Mes événements</h1>

            <div id="pagination_container_my_events"></div>
        </div>
        <!-- events to validate -->
        <div class="col-5 table-responsive events_container events_to_validate h-100 mt-5">
            <h1>Evénement à valider</h1>
            <table class="table table-borderless table-hover">
                <tbody>
                </tbody>
            </table>
            <div id="pagination_container_events_to_validate"></div>
        </div>
    </div>

    <!-- BUTTONS -->
    <div class="row d-flex align-items-center footer_events">
        <div class="col">
            <button class="btn btn-primary" data-toggle="modal" id="add_event_button" data-target="#modal_add_event">Ajouter un évenement</button>
        </div>
    </div>
</div>

<!-- MODAL ADD EVENT -->
<div class="modal fade" id="modal_add_event" tabindex="-1" role="dialog" aria-labelledby="modal_add_event1" aria-hidden="true" data-backdrop="static">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un évenement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Veuillez indiquer la date et l'heure</p>
                <form id="form_add_event" novalidate>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Date de début</label>
                        <div class="col">
                            <input type="datetime-local" class="form-control" name="begin_date" id="begin_date" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Date de fin</label>
                        <div class="col">
                            <input type="datetime-local" class="form-control" name="end_date" id="end_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Titre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location" class="col-sm-2 col-form-label">Lieu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="number_of_guests" class="col-sm-2 col-form-label">Nombre d'invité</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="number_of_guests" name="number_of_guests">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="celebrity" class="col-sm-2 col-form-label">Invité spécial</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="celebrity" name="celebrity">
                        </div>
                    </div>

                    <div class="form-group row d-flex justify-content-center" id="description_container">
                        <label for="description">Description de l'évènement</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>

                    <div class="form-group row d-flex justify-content-center" id="picture_container">
                        <label for="picture" id="label_picture">Choisir une photo</label>
                        <input type="file" class="form-control-file" id="picture" style="display: none" name="picture">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit_add_event" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/template" id="template_table_event">

    <table class="table table-borderless table-hover">
        <tbody>

        {{#each data}}
        <!-- ROW -->
        <tr data-toggle="modal" id="{{this.id_event}}" data-target="modal_details_event_{{this.id_event}}">
            <td class="text-justify">
                <h1>{{this.name}}HERE</h1>
                <p>
                    {{this.description}}
                </p>
            </td>
            <td class="text-right">
                <img style="height: 150px; width: 150px" src="<?= img_url('event_1') ?>" alt="">
                some text
            </td>
        </tr>

        {{/each}}


        </tbody>
    </table>


    {{#each data}}

    <!-- MODAL -->
    <div class="modal fade" id="modal_details_event_{{this.id_event}}" tabindex="-1" role="dialog" aria-labelledby="modal_details_event1" aria-hidden="true" data-backdrop="static">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{this.name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col"><img style="height: 150px; width: 150px" src="<?= img_url('event_1') ?>" alt=""></div>
                        </div>
                        <div class="row">
                            <div class="col">titre</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>
                                    {{this.begin_date}} {{this.end_date}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>
                                    location + nombre invités
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>
                                    {{this.description}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>invité spécial</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{/each}}

</script>

<!-- TEMPLATE EVENT ROW-->
<script type="text/template" id="template_event_row">

    {{#each data}}
    <!-- ROW -->
    <tr data-toggle="modal" id="{{this.id_event}}" data-target="modal_details_event_{{this.id_event}}">
        <td class="text-justify">
            <h1>{{this.name}}HERE</h1>
            <p>
                {{this.description}}
            </p>
        </td>
        <td class="text-right">
            <img style="height: 150px; width: 150px" src="<?= img_url('event_1') ?>" alt="">
        </td>
    </tr>

    <!-- MODAL -->
    <div class="modal fade" id="modal_details_event_{{this.id_event}}" tabindex="-1" role="dialog" aria-labelledby="modal_details_event1" aria-hidden="true" data-backdrop="static">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{this.name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col"><img style="height: 150px; width: 150px" src="<?= img_url('event_1') ?>" alt=""></div>
                        </div>
                        <div class="row">
                            <div class="col">titre</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>
                                    {{this.begin_date}} {{this.end_date}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>
                                    location + nombre invités
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>
                                    {{this.description}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>invité spécial</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{/each}}
</script>

<button class="btn btn-primary mb-5" data-toggle="modal" id="button_details_event" data-target="#modal_details_event">Détails</button>
<div id="here"></div>
<button id="button_here">click here</button>

<!--
<form id="test" onsubmit="test(); return false;">
    <input type="text" id="name_test" name="name_test">
    <input type="datetime-local" id="date_test" name="date_test">
    <input type="password" id="pass_test" name="pass_test">
    <input type="number" id="num_test" name="num_test">
    <button type="submit">TEST</button>
</form>

<div id="test">
</div>
-->

<!-- TEMP -->

<!--
  <tr>
                    <td class="text-justify">
                        <h1>Dégustation gratuite</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            ...
                        </p>

                    </td>
                    <td>
                        <img style="height: 150px; width: 150px" src="<?/*= img_url('event_1') */?>" alt="">
                    </td>
                </tr>
 -->