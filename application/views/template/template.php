<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= img_url('icon.png')?>">
    <link href="<?= css_url('bootstrap/bootstrap.min')?>" rel="stylesheet">
    <link href="<?= extras_url('fontawesome/css/all.css')?>" rel="stylesheet">
    <link href="<?= css_url('pagination')?>" rel="stylesheet">
    <link href="<?= css_url('main')?>" rel="stylesheet">
    <link href="<?= css_url('dataTables.jqueryui.min')?>" rel="stylesheet"/>
    <link href="<?= css_url('jquery.dataTables.min')?>" rel="stylesheet"/>
    <link href="<?= css_url('datatables.min')?>" rel="stylesheet"/>

</head>
<body onload="init();">
<?php include ('localization.php');
include('header.php') ?>

<?= $content ?>

<?php include 'footer.php' ?>


<script src="<?= js_url('jquery-3.5.0.min')?>" ></script>
<script src="<?= js_url('bootstrap/bootstrap.min')?>"></script> <!-- Framework Frontend  -->
<script src="<?= js_url('jquery_validate/jquery.validate.min')?>"></script> <!-- Validation input lib  -->
<script src="<?= js_url('jquery_validate/additional-methods.min')?>"></script>
<script src="<?= js_url('moment-with-locales.min')?>"></script> <!-- Date lib  -->
<script src="<?= js_url('pagination.min')?>"></script> <!-- Pagination lib  -->
<script src="<?= js_url('handlebars.min')?>"></script> <!-- Templating language  -->
<script src="<?= js_url('jquery.dataTables.min')?>" ></script>
<script src="<?= js_url('dataTables.jqueryui.min')?>" ></script>
<script src="<?= js_url('datatables.min')?>" defer></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="<?= js_url('main')?>"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGaVhboAPSsHH4mpsHvsUnEAKcKOWZggw"></script>
<script>
    var map;
    //ESGIs
    var center = new google.maps.LatLng(48.849517822265625, 2.388321876525879);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    function init() {
        var mapOptions = {
            zoom: 13,
            center: center,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        $.post(
            url('home', 'Foodtrucks', 'getFoodTrucksFullJson'),
            {
            },
            "json"
        ).fail(function (result, status) {
            console.log(result);
            console.log(status)
        }).done(function (result, status) {
            result=JSON.parse(result);
            console.log(result);
            var i;
            for(i=0; i<result.length; i++){
                var content =   '<div class="infoWindow"><strong>'  + result[i].name + '</strong>'
                    + '<br/>'   +'<i>'  + result[i].type_of_road + result[i].street + '<br>'
                    + '<br/>'     + result[i].cityName + '</div>';
                var marker = new google.maps.Marker({
                    position:
                        {
                            lat: result[i].gps_latitude, lng: result[i].gps_longitude
                        },
                    icon: {
                        url: 'https://img.icons8.com/cotton/64/000000/ice-cream-truck.png'
                    },
                    map: map
                });
                marker.addListener('click', function() {
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                });
            }
        });
    }
</script>
</body>
</html>


