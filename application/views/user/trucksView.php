<?php $title = 'Commander'; ?>

<div id="order_truck_list" class="container-fluid p-4">

    <div class="row justify-content-center">
        <div class="col d-flex justify-content-center">
            <h1 class="title">Liste des camions</h1>
        </div>
    </div>

    <div class="table-responsive trucks_table">
        <table class="table table-borderless" id="trucks_table">
            <tbody>

                <!-- ROW TRUCKS -->

            </tbody>
        </table>

    </div>

</div>

<!-- TEMPLATE EVENT ROW-->
<script type="text/template" id="template_truck_row">

    {{#each data}}
    <!-- ROW -->

    <tr class="row_truck">
        <td class="text-justify align-middle">
            <img src="<?= img_url('icon.png') ?>"/>
        </td>
        <td class="align-middle">
            <h1 class="text-capitalize title">{{ this.name }}</h1>
            <p class="font-weight-bolder">{{ this.number }} {{ this.type_of_road }} {{ this.cityName }} {{ this.zip_code }}, {{ this.departmentName }} </p>
        </td>
        <td class="align-middle table_cell_button_order p-0">
            <a class="nav-link h-100 w-100 p-0" href="<?= site_url('user', 'Orders', 'truckMealsView') ?>&id={{ this.id_truck }}">
                <button class="btn btn_inherit h-100 w-100 display-4" type="button"><?php echo _('Commander');?> -></button>
            </a>
        </td>
    </tr>

    {{/each}}
</script>

<div id="here"></div>