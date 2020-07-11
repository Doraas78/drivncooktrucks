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
</head>
<body>


<?= $content ?>

<script src="<?= js_url('jquery-3.5.0.min')?>" ></script>
<script src="<?= js_url('bootstrap/bootstrap.min')?>"></script> <!-- Framework Frontend  -->
<script src="<?= js_url('jquery_validate/jquery.validate.min')?>"></script> <!-- Validation input lib  -->
<script src="<?= js_url('jquery_validate/additional-methods.min')?>"></script>
<script src="<?= js_url('moment-with-locales.min')?>"></script> <!-- Date lib  -->
<script src="<?= js_url('pagination.min')?>"></script> <!-- Pagination lib  -->
<script src="<?= js_url('handlebars.min')?>"></script> <!-- Templating language  -->
<script src="<?= js_url('main')?>"></script>

</body>
</html>

