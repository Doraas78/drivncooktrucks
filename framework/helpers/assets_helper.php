<?php


if(! function_exists('css_url')) {
    function css_url($nom)
    {
        return  'public/css/' . $nom . '.css';
    }
}

if(! function_exists('js_url')) {
    function js_url($nom)
    {
        return 'public/js/' . $nom . '.js';
    }
}

if(! function_exists('php_url_js')) {
    function php_url_js($nom)
    {
        return 'public/js/' . $nom . '.php';
    }
}

if(! function_exists('img_url')) {
    function img_url($nom)
    {
        return 'public/images/' . $nom;
    }
}

if(! function_exists('extras_url')) {
    function extras_url($nom)
    {
        return 'public/extras/' . $nom;
    }
}

if(! function_exists('fontawesome_webfonts_url')) {
    function fontawesome_webfonts_url()
    {
        $directory = PUBLIC_PATH . 'extras/fontawesome/webfonts/';
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        foreach($scanned_directory as $file){
            echo '<link href="public/extras/fontawesome/webfonts/'. $file . '" rel="stylesheet">';
        }
    }
}

