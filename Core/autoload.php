<?php
spl_autoload_register('__autoload');

function __autoload(string $class) 
{
    $class = str_replace('\\', '/', $class);
    
    if (is_readable($class . '.php')) 
    {
        require_once $class . '.php';
    }
}
?>