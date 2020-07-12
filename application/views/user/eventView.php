<?php $title = 'Evenements'; ?>

<div class="container-fluid" id="event">

    <!-- HEADER -->
    <div class="row d-flex align-items-center header_title">
        <div class="col-md-4 offset-md-4">
            <h1 class="title">Actualités</h1>
        </div>
    </div>

    <!-- EVENTS INFO -->
    <div class="row d-flex justify-content-around">
        <!-- event -->
        <div id="all_event_container" class="col-5 table-responsive event_container h-100">
            <h1>Tous les événements</h1>

                <!-- template_event_row -->
        </div>
    </div>
</div>

<script type="text/template" id="template_table_event">

    <table id="table_event" class="table table-borderless table-hover table_event_css">
        <thead class="d-none">
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        {{#each data}}
        <!-- ROW -->
        <tr data-toggle="modal" id="{{this.id_event}}" data-target="#modal_details_event_{{this.id_event}}">
            <td class="text-justify">
                <h1>{{this.truckName}}</h1>
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
    <div class="modal fade" id="modal_details_event_{{this.id_event}}" tabindex="-1" role="dialog" aria-labelledby="modal_details_event1" aria-hidden="true" data-backdrop="static">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{this.truckName}}</h5>
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
                            <div class="col">{{this.eventName}}</div>
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
                                    {{ this.number }} {{ this.type_of_road }} {{ this.street }} {{ this.street }} {{ this.cityName }}
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
                                <p>Invité spécial : {{#if this.celebrity}} {{this.celebrity}} {{else}} Aucune {{/if}}
                                </p>
                            </div>
                        </div>
                    </div>

                        <span onclick="addCustomerEvent()" class="text-info">S'inscrire</span>

                </div>
            </div>
        </div>
    </div>

    {{/each}}

</script>

<div id="here"></div>
