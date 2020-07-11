<?php $title = 'Panier'; ?>

<div id="cart" class="container-fluid align-items-center d-flex flex-column p-4">

    <div class="row">
        <h1>Panier</h1>
    </div>

    <div class="row w-100">
        <div class="col-8">
            <?php
            if($existCart){
                $totalPrice = 0;
                $tva = 0;
                foreach ($cart as $keyTruck => $valueTruck) {
                    ?>
                    <div class="table-responsive">
                        <table class="table table_cart_truck" id="<?= $valueTruck['id_franchisee'] ?>">
                            <thead>
                            <tr>
                                <th class="flex-column title_truck_th" scope="col" colspan="5" id="<?= $valueTruck['id_franchisee'] ?>"><?= $valueTruck['name'] ?>
                                    <p class="font-weight-light" ><?= $valueTruck['number'] ?> <?php echo $valueTruck['type_of_road'] ?> <?php echo $valueTruck['street'] ?>, <?php echo $valueTruck['cityName'] ?> <?php echo $valueTruck['zip_code'] ?></p>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($valueTruck['meal'] as $keyMeal => $valueMeal) {

                                foreach ($valueMeal as $key => $meal) {
                                    $totalPrice += (int)$meal['current_quantity_meal'] * $meal['price'];
                                    $tva += (int)$meal['current_quantity_meal'] * $meal['tva'];
                                    ?>

                                    <tr>
                                        <td>Repas</td>
                                        <td class="flex-column"><?= $meal['name']?> <p class="font-weight-light" ><?= $meal['recipe']?></p></td>
                                        <td class="flex-column"><?= $meal['price']?> € <p class="font-weight-light" >Dont <?= $meal['tva']?> € de tva</p></td>
                                        <td>
                                            <div class="container_btn_add_remove_item d-flex flex-row">
                                                <a class="nav-link p-0 add_meal id_quantity_meal_<?= $meal['id_meal']?>">
                                                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-plus"></i></button>
                                                </a>
                                                <a class="nav-link p-0 remove_meal id_quantity_meal_<?= $meal['id_meal']?>" >
                                                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-minus"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row align-self-end w-100">
                                                <input max="<?= $meal['quantity_meal']?>" min="0" type="number" id="id_quantity_meal_<?= $meal['id_meal']?>" class="quantity_meal_order" disabled="" value="<?= (int)$meal['current_quantity_meal']?>">
                                                <p class="font-weight-lighter text-danger d-none messsage_maximum_quantity_achieve ml-3">Vous avez atteint la quantité maximale</p>
                                            </div>
                                        </td>
                                    </tr>

                                <?php }

                            } ?>


                            <?php foreach ($valueTruck['menu'] as $keyMenu => $valueMenu) {

                                foreach ($valueMenu as $key => $menu) {
                                    $totalPrice += (int)$menu['current_quantity_menu'] * $menu['price'];
                                    $tva += (int)$menu['current_quantity_menu'] * $menu['tva'];

                                    ?>

                                    <tr>
                                        <td>Menu</td>
                                        <td class="flex-column"><?= $menu['name']?></td>
                                        <td class="flex-column"><?= $menu['price']?> € <p class="font-weight-light" >Dont <?= $menu['tva']?> € de tva</p></td>
                                        <td>
                                            <div class="container_btn_add_remove_item d-flex flex-row">
                                                <a class="nav-link p-0 add_menu id_quantity_menu_<?= $menu['id_menu']?>">
                                                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-plus"></i></button>
                                                </a>
                                                <a class="nav-link p-0 remove_menu id_quantity_menu_<?= $menu['id_menu']?>" >
                                                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-minus"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row align-self-end w-100">
                                                <input max="<?= $menu['quantity_menu']?>" min="0" type="number" id="id_quantity_menu_<?= $menu['id_menu']?>" class="quantity_menu_order" disabled="" value="<?= (int)$menu['current_quantity_menu']?>">
                                                <p class="font-weight-lighter text-danger d-none messsage_maximum_quantity_achieve ml-3">Vous avez atteint la quantité maximale</p>
                                            </div>
                                        </td>
                                    </tr>

                                <?php }

                            } ?>

                            <?php foreach ($valueTruck['ingredient'] as $keyIngredient => $valueIngredient) {

                                foreach ($valueIngredient as $key => $ingredient) {
                                    $totalPrice += (int)$ingredient['current_quantity_ingredient'] * $ingredient['price'];
                                    $tva += (int)$ingredient['current_quantity_ingredient'] * $ingredient['tva'];

                                    ?>

                                    <tr>
                                        <td>Ingrédient</td>
                                        <td class="flex-column"><?= $ingredient['name']?> <p class="font-weight-light" ><?= $ingredient['description']?></p></td>
                                        <td class="flex-column"><?= $ingredient['price']?> € <p class="font-weight-light" >Dont <?= $ingredient['tva']?> € de tva</p></td>
                                        <td>
                                            <div class="container_btn_add_remove_item d-flex flex-row">
                                                <a class="nav-link p-0 add_ingredient id_quantity_ingredient_<?= $ingredient['id_ingredient']?>">
                                                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-plus"></i></button>
                                                </a>
                                                <a class="nav-link p-0 remove_ingredient id_quantity_ingredient_<?= $ingredient['id_ingredient']?>" >
                                                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-minus"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row align-self-end w-100">
                                                <input max="<?= $ingredient['quantity_ingredient']?>" min="0" type="number" id="id_quantity_ingredient_<?= $ingredient['id_ingredient']?>" class="quantity_ingredient_order" disabled="" value="<?= (int)$ingredient['current_quantity_ingredient']?>">
                                                <p class="font-weight-lighter text-danger d-none messsage_maximum_quantity_achieve ml-3">Vous avez atteint la quantité maximale</p>
                                            </div>
                                        </td>
                                    </tr>

                                <?php }

                            } ?>

                            <?php foreach ($valueTruck['drink'] as $keyDrink => $valueDrink) {

                                foreach ($valueDrink as $key => $drink) {
                                    $totalPrice += (int)$drink['current_quantity_drink'] * $drink['price'];
                                    $tva += (int)$drink['current_quantity_drink'] * $drink['tva'];
                                    ?>

                                    <tr>
                                        <td>Ingrédient</td>
                                        <td class="flex-column"><?= $drink['name']?> <p class="font-weight-light" ><?= $drink['recipe']?></p></td>
                                        <td class="flex-column"><?= $drink['price']?> € <p class="font-weight-light" >Dont <?= $drink['tva']?> € de tva</p></td>
                                        <td>
                                            <div class="container_btn_add_remove_item d-flex flex-row">
                                                <a class="nav-link p-0 add_drink id_quantity_drink_<?= $drink['id_drink']?>">
                                                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-plus"></i></button>
                                                </a>
                                                <a class="nav-link p-0 remove_drink id_quantity_drink_<?= $drink['id_drink']?>" >
                                                    <button class="btn btn_dark_blue" type="button" ><i class="fas fa-minus"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row align-self-end w-100">
                                                <input max="<?= $drink['quantity_drink']?>" min="0" type="number" id="id_quantity_drink_<?= $drink['id_drink']?>" class="quantity_drink_order" disabled="" value="<?= (int)$drink['current_quantity_drink']?>">
                                                <p class="font-weight-lighter text-danger d-none messsage_maximum_quantity_achieve ml-3">Vous avez atteint la quantité maximale</p>
                                            </div>
                                        </td>
                                    </tr>

                                <?php }

                            } ?>

                            </tbody>
                        </table>
                    </div>

                <?php }

            } else { ?>
                <p class="font-italic">Panier non existant</p>
            <?php } ?>

        </div>
        <div class="col text-center">
            <div>
                <h1>Total</h1>
                <?php if (isset($totalPrice)){?>
                    <p id="totalPriceCart"><span id="totalPriceSpan"><?= $totalPrice ?></span>€ dont <span id="totalTvaSpan"><?= $tva ?></span> € de tva</p>
                <?php } ?>
            </div>
            <div class="d-flex flex-row">
                <button type="button" class="btn btn-success w-50" data-toggle="modal" data-target="#payementModal">
                    Payer
                </button>
                <a href="<?= site_url('user', 'Orders', 'deleteCart') ?>" class="w-50">
                    <button type="submit" class="btn btn-danger w-100">Supprimer panier</button>
                </a>
            </div>
            <div>
                <button type="button" class="btn btn-secondary w-100 btn_save_cart">Sauvegarder le panier</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="payementModal" tabindex="-1" role="dialog" aria-labelledby="payementModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Paiement par carte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPayementCard">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="payement_card">Carte bancaire</label>
                            <input type="text" class="form-control" id="payement_card" name="payement_card">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="name_card">Nom du propriétaire de la carte</label>
                            <input type="text" class="form-control" id="name_card" name="name_card">
                        </div>
                    </div>
                    <button id="btn_payement_form" type="submit" class="btn btn-primary">Payer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="here"></div>