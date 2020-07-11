

<!doctype html>

<html lang="en">
<head>

    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= img_url('icon.png')?>">
    <link href="<?= css_url('bootstrap/bootstrap.min')?>" rel="stylesheet">
    <link href="<?= extras_url('fontawesome/css/all.css')?>" rel="stylesheet">
    <link href="<?= css_url('dataTables.bootstrap4.min')?>" rel="stylesheet">
    <link href="<?= css_url('main')?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">

</head>

<body>

<?= $content ?>

<script src="<?= js_url('bootstrap/bootstrap.min')?>"></script>
<script src="<?= js_url('jquery_validate/jquery.validate.min')?>"></script>
<script src="<?= js_url('jquery_validate/additional-methods.min')?>"></script>
<script src="<?= js_url('moment-with-locales.min')?>"></script>
<script src="<?= js_url('handlebars.min')?>"></script>

<script src="<?= js_url('jquery-3.5.0.min')?>" ></script>
<script src="<?= js_url('jquery.dataTables.min')?>"></script>
<script src="<?= js_url('dataTables.bootstrap4.min')?>"></script>
<script src="<?= js_url('main')?>"></script>
<script src="<?= js_url('temp')?>"></script>


</body>
</html>
