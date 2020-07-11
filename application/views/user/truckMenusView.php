<?php $title = 'Commander'; ?>

<div id="order_menu_list" class="container-fluid align-items-center d-flex flex-column p-4">

    <div class="row justify-content-center">
        <div class="col d-flex flex-column align-items-center">
            <h1 id="<?= $truck['id_truck'] ?>" class="title d-inline-block title_truck"><?= $truck['name'] ?></h1>
            <h2 class="title d-inline-block">Choisissez vos menus</h2>
        </div>
    </div>

    <div class="table-responsive menus_table">
        <table class="table table-borderless" id="<?= $truck['id_franchisee'] ?>">
            <tbody>

            <!-- ROW MENUS -->

            </tbody>
        </table>

    </div>

    <button class="btn btn-success btn_save_cart_menus" type="button">Enregistrer dans votre panier</button>
    <a id="btn_go_to_ingredient_page" class="nav-link p-0 mt-3" href="#">
        <button class="btn btn_dark_blue" type="button" >Direction Ingrédient -></button>
    </a>
</div>

<!-- TEMPLATE EVENT ROW-->
<script type="text/template" id="template_menu_row">

    {{#each data}}
    <!-- ROW -->

    {{ this.quantity_menu }}

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
                <a class="nav-link p-0 add_menu id_quantity_menu_{{ this.id_menu }}">
                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-plus"></i></button>
                </a>
                <a class="nav-link p-0 remove_menu id_quantity_menu_{{ this.id_menu }}" >
                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-minus"></i></button>
                </a>
            </div>
            <div class="d-flex flex-row align-self-end w-100">
                <input max="{{ this.quantity_menu }}" min="0" type="number" id="id_quantity_menu_{{ this.id_menu }}" class="quantity_menu_order" disabled="" value="0">
                <p class="font-weight-lighter text-danger d-none messsage_maximum_quantity_achieve ml-3">Vous avez atteint la quantité maximale</p>
            </div>
        </td>
    </tr>

    {{/each}}
</script>

<div id="here"></div>

