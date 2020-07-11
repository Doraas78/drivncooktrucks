<?php $title = 'Mon Fooodtruck';
include 'localization.php';
?>
<div id="settings" class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="ul_settings" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#my_info" role="tab" aria-controls="my_info" aria-selected="true">Mes infos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="#my_foodtruck" role="tab" aria-controls="my_foodtruck" aria-selected="false">Mon Foodtruck</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#commands" role="tab" aria-controls="commands" aria-selected="false">Les commandes</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    <div class="tab-content mt-3">
                        <!-- FORM INFOS -->

                        <div class="tab-pane active" id="my_info" role="tabpanel">
                            <div class="col">
                                <div class="row p-3">

                                    <div class="col text-center password_section m-3">

                                        <!-- PASSWORD SECTION -->
                                        <form id="form_password_section" class="h-100 d-flex flex-column p-3" novalidate>
                                            <h1>Mot de passe</h1>
                                            <div class="form-row m-3">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe actuel">
                                            </div>
                                            <div class="form-row m-3">
                                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nouveau mot de passe">
                                            </div>
                                            <div class="form-row m-3">
                                                <input type="password" class="form-control" id="check_new_password" name="check_new_password" placeholder="Confirmer nouveau mot de passe">
                                            </div>
                                            <div class="form-row justify-content-center m-3">
                                                <button type="submit" class="btn btn-primary mb-3 btn_save_password">
                                                    <span class="font_btn_sizing">Sauvegarder</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col text-center email_section m-3">

                                        <!-- EMAIL SECTION -->

                                        <form id="form_email_section" class="h-100 d-flex flex-column p-3" novalidate>
                                            <h1>Email</h1>
                                            <div class="form-row">
                                                <div class="form-group w-100">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $_SESSION['user']['email']  ?>" disabled>
                                                </div>
                                                <div class="form-group w-100">
                                                    <input type="email" class="form-control" id="new_email" name="new_email" placeholder="Nouveau email">
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-center">
                                                <button type="submit" class="btn btn-primary mb-3 btn_save_email">
                                                    <span class="font_btn_sizing">Sauvegarder</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="row w-100">
                                        <div class="col infos_section m-3">

                                            <!-- INFOS SECTION -->

                                            <form class="h-100 d-flex flex-column p-3" novalidate>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" id="number" name="number" placeholder="N°" value="<?= $_SESSION['user']['number']  ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" id="type_of_road" name="type_of_road" placeholder="Type de rue" value="<?= $_SESSION['user']['type_of_road']  ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" id="street" name="street" placeholder="Rue" value="">
                                                    </div>
                                                    <div class="form-group col list_city_col">
                                                        <input type="text" id="city" class="form-control choose_city" placeholder="Selectionner votre ville..." name="city" value="<?= $_SESSION['user']['city']  ?>">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Prénom" value="<?= $_SESSION['user']['first_name']  ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nom" value="<?= $_SESSION['user']['last_name']  ?>">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="N° de téléphone" value="<?= $_SESSION['user']['phone']  ?>">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <select id="gender" class="form-control" name="gender">
                                                            <option value="1" >Femme</option>
                                                            <option value="2">Homme</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <input type="date" class="form-control" id="birthday_date" name="birthday_date" placeholder="Date de naissance" value="<?= $_SESSION['user']['birthday_date']  ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="description" rows="3" name="description"><?= $_SESSION['user']['description']  ?></textarea>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="hiring_date">Date d'embauche</label>
                                                    <input type="date" class="form-control" id="hiring_date" name="hiring_date"  value="" disabled>
                                                </div>
                                                <div class="form-row justify-content-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        <span class="font_btn_sizing">Sauvegarder</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="my_foodtruck" role="tabpanel" aria-labelledby="my_foodtruck-tab">
                        </div>

                        <!-- COMMANDS -->

                        <div class="tab-pane" id="commands" role="tabpanel" aria-labelledby="commands-tab">

                        </div>
                    </div>
                </div>
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
                <div class="btn-group container_btn_status" value='1'>
                    <button type="button" class="btn btn-danger status_btn" disabled>
                        En attente
                    </button>
                    <button type="button"  class="btn btn-danger next_status_btn">
                        <i class="fas fa-check"></i>
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