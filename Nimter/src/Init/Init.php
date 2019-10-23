<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *
 * PHP versión 7.1.3
 *
 * @package Nimter\Core\Init
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.3.0
 */

use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Nimter\Core\Controllers\Controllers;

//Versión Minima de PHP
if (version_compare(phpversion(), '7.1.3', '<')) {
    throw new \RuntimeException('La versión actual de PHP es ' . phpversion() . ' y la versión minima requerida es la 7.1.3');
}

//Carga los modulos y paquetes del framework
require_once 'Nimter/autoload.php';
require_once 'Nimter/vendor/autoload.php';

//Carga la configuracion del framework
$dotenv = \Dotenv\Dotenv::create(__ROOT__);
$dotenv->load();

//Se estable el modo debug si ha sido definido previamente
if (getenv('APP_DEBUG') === true) {
    //Manejador de errores Symfony/Debug
    ErrorHandler::register();
    ExceptionHandler::register();
    Debug::enable();
}

//Configuración de la región y zona horaria
date_default_timezone_set(getenv('APP_TIMEZONE'));
setlocale(LC_TIME, getenv('APP_LANGUAGE'));

//Manejo de los controladores
(new Controllers())->execute();
