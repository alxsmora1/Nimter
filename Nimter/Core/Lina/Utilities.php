<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *  
 * PHP versión 7.1.3
 *
 * @package Nimter\Core\lina
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.2.0
 */

namespace Nimter\Core\Lina;

use Nimter\Core\Init\ConfigReader as config;
use Nimter\Core\Helpers\Files as file;

/**
 * class Utilities
 * 
 * Clase que se encarga de manejar las utilidades de LINA
 */
class Utilities
{
	/**
	 * Function clearCache
	 *
	 * Función que borra la cache de Twig
	 *
	 * @return void
	 **/
	public function clearCache()
	{
		//Carga la configuracion del framework
		$config = config::config();

		file::removeFiles($config['twig']['cache'] . "/");

		print_r("El cache de Twig fue borrado con exito.");
	}

	/**
	 * Function webserver
	 *
	 * Función que provee de un servidor local de desarrollo a través de PHP
	 *
	 * @return void
	 **/
	public function webserver()
	{
		print_r("El servidor web se esta ejecutando en http://127.0.0.1:8080\n");
		print_r("Para detener su ejecución presione CTRL + C\n");
		exec('php -S 127.0.0.1:8080');
	}

	/**
	 * Function help
	 *
	 * Función que provee la ayuda del generador de codigo
	 *
	 * @return void
	 **/
	public function help()
	{
		print_r("MVC Para generar un Modelo Vista Controlador debe de usar el siguiente comando: app:mvc Nombre_archivo. Tambien puede crear solo un tipo de archivo ej. app:m Nombre_archivo.\n");
		print_r("--version Provee la versión del framework.\n");
		print_r("--license Provee la licencia del framework.\n");
	}

	/**
	 * Function version
	 *
	 * Función que provee la versión del Framework    
	 *
	 * @return void
	 **/
	public function version()
	{
		print_r("\033[0;32mNimter 2019 Versión 1.2.0\nLINA 2019 Versión 1.2.0\033[0m");
	}

	/**
	 * Function license
	 *
	 * Función que provee licencia del Framework
	 *
	 * @return void
	 **/
	public function license()
	{
		print_r("MIT\nCopyright Alexis Mora 2018 - 2019\nPara más información revise el archivo LICENSE en la raiz del Framework.\n");
	}
}
