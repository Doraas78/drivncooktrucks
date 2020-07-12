<?php $title = 'Tableau de bord'; ?>

<div id="dashboard" class="p-4 container-fluid">

    <div class="row">
        <div class="col">
            <h1>Bienvenue <?= $_SESSION['customer']['first_name'] . ' ' . $_SESSION['customer']['last_name']; ?></h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="tab-pane" id="commands" role="tabpanel" aria-labelledby="commands-tab">



            </div>
        </div>
    </div>
</div>


<!-- TEMPLATE EVENT ROW-->
<script type="text/template" id="template_table_all_commands">

    <table id="table_commands" class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Client</th>
            <th scope="col">Commande</th>
            <th scope="col">Prix</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>

        {{#each data}}

        <tr>
            <th>{{this.name}}<p class="font-weight-light">{{this.email_customer}}</p></th>
            <td data-toggle="modal" id="content_command_{{this.id_order}}" data-target="#modal_detail_command_{{this.id}}" class="command_food" >{{this.number}}<p class="font-weight-light">Boissons, Repas, Menu</p></td>
            <td>{{this.price}} €<p class="font-weight-light">Dont {{this.tva}} € tva</p></td>
            <td>{{this.date}}</td>
            <td>
                <div class="btn-group container_btn_status">

                    <button type="button" class="btn btn-danger status_btn" disabled>
                        En attente
                    </button>
                </div>
            </td>
        </tr>

        {{/each}}

        </tbody>
    </table>

    {{#each data}}
    <!-- MODAL -->
    <div class="modal fade" id="modal_detail_command_{{this.id}}" tabindex="-1" role="dialog" aria-labelledby="{{this.id_order}}1" aria-hidden="true" data-backdrop="static">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Réservation n°{{this.number}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
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

<div id="here"></div>