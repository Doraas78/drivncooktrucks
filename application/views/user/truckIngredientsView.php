<?php $title = 'Commander'; ?>

<div id="order_ingredient_list" class="container-fluid align-items-center d-flex flex-column p-4">

    <div class="row justify-content-center">
        <div class="col d-flex flex-column align-items-center">
            <h1 id="<?= $truck['id_truck'] ?>" class="title d-inline-block title_truck"><?= $truck['name'] ?></h1>
            <h2 class="title d-inline-block">Choisissez vos ingredients</h2>
        </div>
    </div>

    <div class="table-responsive ingredients_table">
        <table class="table table-borderless" id="<?= $truck['id_franchisee'] ?>">
            <tbody>

            <!-- ROW INGREDIENTS -->

            </tbody>
        </table>

    </div>

    <button class="btn btn-success btn_save_cart_ingredients" type="button">Enregistrer dans votre panier</button>
    <a id="btn_go_to_drink_page" class="nav-link p-0 mt-3" href="#">
        <button class="btn btn_dark_blue" type="button">Direction Boissons -></button>
    </a>
</div>

<!-- TEMPLATE EVENT ROW-->
<script type="text/template" id="template_ingredient_row">

    {{#each data}}
    <!-- ROW -->

    {{ this.quantity_ingredient }}

    <tr id="{{ this.id_truck }}" class="id_franchisee_{{id_franchisee}}" >
    <td class="text-justify align-middle">
            <h1 class="text-capitalize title">{{ this.name }}</h1>
        </td>
        <td class="align-middle">
            <p>{{ this.recipe }}</p>
        </td>
        <td class="align-middle">
            <p class="font-weight-bold" > {{ this.price }}  € <span class="font-weight-lighter"> dont {{ this.tva}}€ de tva </span></p>
        </td>
        <td class="align-middle p-0 d-flex flex-row">
            <div class="container_btn_add_remove_item d-flex flex-row">
                <a class="nav-link p-0 add_ingredient id_quantity_ingredient_{{ this.id_ingredient }}">
                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-plus"></i></button>
                </a>
                <a class="nav-link p-0 remove_ingredient id_quantity_ingredient_{{ this.id_ingredient }}" >
                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-minus"></i></button>
                </a>
            </div>
            <div class="d-flex flex-row align-self-end w-100">
                <input max="{{ this.quantity_ingredient }}" min="0" type="number" id="id_quantity_ingredient_{{ this.id_ingredient }}" class="quantity_ingredient_order" disabled="" value="0">
                <p class="font-weight-lighter text-danger d-none messsage_maximum_quantity_achieve ml-3">Vous avez atteint la quantité maximale</p>
            </div>
        </td>
    </tr>

    {{/each}}
</script>

<div id="here"></div>

