<?php
/**
 * Clase para caragar las clases/modulos del Core del Framework
 *
 * PHP versión 7.1.3
 *
 * @package Nimter
 * @version 1.3.0
 * @author Alexis Mora
 *
 **/

spl_autoload_register(function ($modules) {
    $modules = str_replace('\\', '/', $modules);

    if (is_readable($modules . '.php')) {
        require_once $modules . '.php';
    }
});