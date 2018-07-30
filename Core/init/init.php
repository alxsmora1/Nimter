<?php 
/**
 * Inicializador del Framework
 *    
 * PHP versión 7.0
 *
 * @package Horizon Framework
 * @author Alexis Mora
 *  
 */

use Core\init\config;
use Core\ruteo\router;
use Core\ruteo\controllers;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\Debug;

//Versión Minima de PHP
if (version_compare(phpversion(), '7.0', '<')) 
{
  throw new \RuntimeException('La versión actual de PHP es ' . phpversion() . ' y la versión minima requerida es la 7.0');
}

//Inicia las sesiones del navegador
session_start();

//Obtiene la configuaración del framework
$config = (new Config)->generalConfig();
global $config;

if ( $config['general']['debug'] == TRUE ) 
{
	//Manejador de errores Symfony/Debug
	ErrorHandler::register();
	ExceptionHandler::register();
	Debug::enable();
}


//Configuración para el motor de platillas Twig
$loader = new Twig_Loader_Filesystem($config['path']['views']);
$twig = new Twig_Environment($loader, array(
    'cache' => $config['twig']['compiler'],
    'auto_reload' => $config['twig']['reload'],
));

//Router del framework
$router = new router();
$method = $router->getMethod();
$param = $router->getParam();
$controller = $router->getController();

//Configuración de la region y zona horaria
date_default_timezone_set($config['general']['timezone']);
setlocale(LC_TIME, $config['general']['language']);

//Manejo de los controladores
require (new controllers)->routeController($controller);
?>