<?php
/**
*  Clase para caragar las clases/modulos del Core del Framework
*  
*  PHP versión 7.0
*
*  @package Nimter
*  @version 1.2.0
*  
*/

spl_autoload_register(function ($modules) 
{
    $modules = str_replace('\\', '/', $modules);

    if ( is_readable($modules . '.php') ) 
    {
        require_once $modules . '.php';
    }
});
?>