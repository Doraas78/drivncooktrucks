<?php

/**
 * @param string $platform
 * @param string $controller
 * @param string $action
 * @return string
 */

if ( ! function_exists('site_url')){
    function site_url(string $platform, string $controller, string $action) : string
    {
        return 'index.php?p=' . $platform . '&c=' . $controller . '&a=' . $action ;
    }
}

if ( ! function_exists('full_url')){
    function full_url(string $platform, string $controller, string $action) : string
    {
        return  $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . '?p=' . $platform . '&c=' . $controller . '&a=' . $action ;
    }
}

if ( ! function_exists('base_url')){
    function base_url() : string
    {
        return  $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . '/projet_annuel/client_side_drivncooktrucks/';
    }
}


if ( ! function_exists('redirect')){
    function redirect(string $platform, string $controller, string $action)
    {
        header('Location: ' . full_url($platform, $controller, $action));
    }
}