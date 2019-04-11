<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *  
 * PHP versión 7.1.3
 *
 * @package Nimter\Core\router
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.2.0
 */

use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Nimter\Core\Init\ConfigReader as config;
use Nimter\Core\Controllers\Controllers;

//Versión Minima de PHP
if (version_compare(phpversion(), '7.1.3', '<')) {
    throw new \RuntimeException('La versión actual de PHP es ' . phpversion() . ' y la versión minima requerida es la 7.1.3');
}

//Carga los modulos y paquetes del framework
require_once __PATH__ . 'Nimter/autoload.php';
require_once __PATH__ . 'Nimter/vendor/autoload.php';

//Carga la configuracion del framework
$config = config::config();

//Se estable el modo debug ha sido definido previamente
if ($config['general']['debug'] === true) {
    //Manejador de errores Symfony/DebuPg
    ErrorHandler::register();
    ExceptionHandler::register();
    Debug::enable();
}

//Configuración de la region y zona horaria
date_default_timezone_set($config['general']['timezone']);
setlocale(LC_TIME, $config['general']['language']);

//Manejo de los controladores
(new Controllers)->start();
