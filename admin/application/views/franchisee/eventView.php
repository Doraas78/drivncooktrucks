<?php $title = 'Evenement';
include 'localization.php';

?>


<div class="container-fluid" id="events">

    <!-- HEADER -->
    <div class="row d-flex align-items-center header_title">
        <div class="col-12 text-center">
            <h1 class="title"><?= $lang['actualiteTitre'] ?></h1>
        </div>
    </div>

    <!-- EVENTS INFO -->
    <div class="row d-flex justify-content-around">

        <!-- events -->
        <div id="all_events_container" class="col-5 table-responsive events_container h-100">
            <h1 class="title_event_container">Tous les événement</h1>
                <!-- template_event_row -->
        </div>

        <!-- my events -->
        <div id="my_events_container" class="col-5 table-responsive events_container h-100">
            <h1 class="title_event_container">Mes événements</h1>
            <!-- template_event_row -->
        </div>

        <!-- events to validate -->
        <div id="events_to_validate" class="col-5 table-responsive events_container events_to_validate h-100 mt-5">
            <h1 class="title_event_container">Mes évènements pas encore validés</h1>

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

                    <div class="modal-footer">
                        <button type="submit" id="submit_add_event" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- TEMPLATE EVENT ROW-->
<script type="text/template" id="template_table_all_events">

    <table id="table_all_events" class=" table table-borderless table-hover">
        <thead class="d-none">
            <tr>
                <th scope="col" class="info_title"></th>
                <th scope="col" class="info_title">

                </th>
            </tr>
        </thead>
        <tbody>

            {{#each data}}
            <!-- ROW -->
            <tr data-toggle="modal" id="{{this.id_event}}" data-target="#modal_details_event_{{this.id_event}}">
                <td class="text-justify">
                    <h1>{{this.name}} ({{ this.participation }} participation(s))</h1>
                    <p>
                        {{this.description}}
                    </p>
                    {{ this.currentNumberGuests }}
                </td>
                <td class="text-right">
                    <img style="height: 150px; width: 150px" src="<?= img_url('event_1') ?>" alt="">
                    {{ this.currentNumberGuests }}
                </td>
            </tr>
            {{/each}}

        </tbody>
    </table>

    {{#each data}}
    <!-- MODAL -->
    <div class="modal fade" id="modal_details_event_{{this.id_event}}" tabindex="-1" role="dialog" aria-labelledby="modal_details_event_{{this.id_event}}Label" aria-hidden="true" data-backdrop="static">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{this.eventName}}</h5>
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
                            <div class="col">{{this.truckName}}</div>
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
                                    Nombre d'invités : {{this.number_of_guests}}
                                    <br>
                                    {{this.number}} {{this.street}} {{this.type_of_road}}, {{this.country}}
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
                                <p>{{this.celebrity}}</p>
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
<script type="text/template" id="template_table_my_events_container">

    <table id="table_my_events_container" class=" table table-borderless table-hover">
        <thead class="d-none">
        <tr>
            <th scope="col" class="info_title"></th>
            <th scope="col" class="info_title">

            </th>
        </tr>
        </thead>
        <tbody>

        {{#each data}}
        <!-- ROW -->
        <tr data-toggle="modal" id="{{this.id_event}}" data-target="#modal_details_event_{{this.id_event}}">
            <td class="text-justify">
                <h1>{{this.name}}</h1>
                <p>
                    {{this.description}}
                </p>
            </td>
            <td class="text-right">
                <img style="height: 150px; width: 150px" src="<?= img_url('event_1') ?>" alt="">
            </td>
        </tr>
        {{/each}}

        </tbody>
    </table>

    {{#each data}}
    <!-- MODAL -->
    <div class="modal fade" id="modal_details_event_{{this.id_event}}" tabindex="-1" role="dialog" aria-labelledby="modal_details_event_{{this.id_event}}Label" aria-hidden="true" data-backdrop="static">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{this.eventName}}</h5>
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
                            <div class="col">{{this.truckName}}</div>
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
                                    Nombre d'invités : {{this.number_of_guests}}
                                    <br>
                                    {{this.number}} {{this.street}} {{this.type_of_road}}, {{this.country}}
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
                                <p>{{this.celebrity}}</p>
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
<script type="text/template" id="template_table_events_to_validate">

    <table id="table_events_to_validate" class=" table table-borderless table-hover">
        <thead class="d-none">
        <tr>
            <th scope="col" class="info_title"></th>
            <th scope="col" class="info_title">

            </th>
        </tr>
        </thead>
        <tbody>

        {{#each data}}
        <!-- ROW -->
        <tr data-toggle="modal" id="{{this.id_event}}" data-target="#modal_details_event_{{this.id_event}}">
            <td class="text-justify">
                <h1>{{this.name}}</h1>
                <p>
                    {{this.description}}
                </p>
            </td>
            <td class="text-right">
                <img style="height: 150px; width: 150px" src="<?= img_url('event_1') ?>" alt="">
            </td>
        </tr>
        {{/each}}

        </tbody>
    </table>

    {{#each data}}
    <!-- MODAL -->
    <div class="modal fade" id="modal_details_event_{{this.id_event}}" tabindex="-1" role="dialog" aria-labelledby="modal_details_event_{{this.id_event}}Label" aria-hidden="true" data-backdrop="static">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{this.eventName}}</h5>
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
                            <div class="col">{{this.truckName}}</div>
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
                                    Nombre d'invités : {{this.number_of_guests}}
                                    <br>
                                    {{this.number}} {{this.street}} {{this.type_of_road}}, {{this.country}}
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
                                <p>{{this.celebrity}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{/each}}

</script>

<div id="here"></div>