<?php $title= "Nos Foodtrucks" ;
include  'localization.php'?>
<div id="foodtrucks">
    <div class="jumbotron jumbotron-fluid p-1 background" style="height: 400px">
        <div class="row">

            <div class="col d-flex flex-column justify-content-center" id="rightSide">
                <p class=" display-4 w-40 align-self-center" id="slogan2">
                    <?php echo $lang['Liste de nos Foodtrucks'];?>
                </p>
                <p class=" font-weight-bold" style="font-family: Comfortaa-Bold; " > <?php echo $lang['En exclusivité, notre MAP à FoodTrucks !'];?></p>
            </div>
        </div>



        <div class="container-fluid px-0" id="containerFoodtruck" >
            <div class="row no-gutters" align="center">

                <div  class="map-responsive no-gutters" id="map" ></div>

            </div>
        </div>
    </div>