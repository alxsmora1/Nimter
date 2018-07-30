<?php
/**
*  Clase para caragar las clases/modulos del Core del Framework
*  
*  PHP versión 7.0
*
*  @package Core
*  @version 1.1.0
*  
*/

spl_autoload_register('__autoload');

function __autoload(string $modules) 
{
    $modules = str_replace('\\', '/', $modules);
    
    if ( is_readable($modules . '.php') ) 
    {
        require_once $modules . '.php';
    }
}
?>