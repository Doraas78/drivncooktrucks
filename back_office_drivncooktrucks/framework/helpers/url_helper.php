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

        $protocol=$_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';

        return  $protocol .'://'. $_SERVER['HTTP_HOST'] . '/projet_annuel/back_office_drivncooktrucks/';
    }
}

if ( ! function_exists('redirect')){
    function redirect(string $platform, string $controller, string $action) : void
    {
        header('Location: ' . base_url() . site_url($platform, $controller, $action));
    }
}
