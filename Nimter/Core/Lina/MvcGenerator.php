<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *
 * PHP versión 7.1.3
 *
 * @package Nimter\Core\Lina
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.3.0
 */

namespace Nimter\Core\Lina;

use Nimter\Core\Init\ConfigReader;
use Nimter\Core\Helpers\Files;

/**
 * class MvcGenerator
 *
 * Clase que se encarga de generar y manipular los archivos MVC
 */
class MvcGenerator
{
	/**
     * Function createModel
     *
     * Crea el modelo en la ruta asignada a los modelos desde el archivo de configuración
     *
     * @param string $name - Nombre del Modelo
	 * @return void
     **/
	public static function createModel(string $name)
	{
		//Carga la configuracion del framework
		$config = ConfigReader::config();

		//URL del template de controladores
		$urlTemplate = 'Nimter/Core/lina/resources/model';

		$model = file_get_contents($urlTemplate);

		//Modifica el contenido del template del modelo
		$model = str_replace('[modelName]', $name, $model);
		$model = str_replace('[authorName]', $config['developer']['author'], $model);

		$url = $config['path']['models'] . $name . '.php';

		if (file_exists($url)) {
			print_r("Este archivo ya existe eliminelo o intente con otro nombre.\n");
		} else {
			$view = fopen($url, 'a');
			if (fwrite($view, $model) !== FALSE) {
				print_r("Se ha creado el modelo " . $name . ".php en " . $config['path']['models'] . "\n");
			} else {
				print_r("Ha ocurrido un error al crear el Modelo, tenga en cuenta que se necesitan permisos de escritura para realizar esta operación.\n");
			}
		}
	}

	/**
	 * Function createView
	 *
	 * Crea la vista en la ruta asignada a los Views desde el archivo de configuración
	 *
	 * @param string $name - Nombre de la vista
	 * @return void
	 **/
	public function createView(string $name)
	{
		//Carga la configuracion del framework
		$config = ConfigReader::config();

		//URL del template basico
		$url = 'Nimter/Core/lina/resources/VIEW';

		if (file_exists($url)) {
			$template = file_get_contents($url);

			//Url del directorio de las vistas
			$directory = $config['path']['views'] . ucfirst($name);

			//Comprueba que exista el directorio, si no es así lo crea
			if (!file_exists($directory)) {
				mkdir($directory, 0777, true);
			}

			//Url del archivo
			$url = $config['path']['views'] . ucfirst($name) . '/index.twig';

			if (file_exists($url)) {
				print_r("Este archivo ya existe eliminelo o intente con otro nombre\n");
			} else {
				$view = fopen($url, 'a');
				if (fwrite($view, $template) !== FALSE) {
					print_r("Se ha creado la Vista " . $name . ".twig en " . $config['path']['views'] . "\n");
				} else {
					print_r("Ha ocurrido un error al crear la vista\n");
				}
			}
		} else {
			print_r("El archivo base ha sido movido de su lugar o ha sido borrado.\n");
		}
	}

	/**
	 * Function createController
	 *
	 * Crea el controlador en la ruta asignada a los controladores desde el archivo de configuración
	 *
	 * @param string $name Nombre del controlador
	 * @return void
	 **/
	public function createController(string $name)
	{
		//Carga la configuracion del framework
		$config = ConfigReader::config();

		//Url del controlador a generar
		$url = $config['path']['controllers'] . $name . 'Controller.php';

		//URL del template de controladores
		$urlTemplate = 'Nimter/Core/lina/resources/controller';

		//Obtine el contenido del template de controlador
		$controller = file_get_contents($urlTemplate);

		//Modifica el contenido del template de controlador
		$controller = str_replace('[controllerName]', $name, $controller);
		$controller = str_replace('[directoryName]', ucfirst($name), $controller);
		$controller = str_replace('[controllerPath]', $url, $controller);
		$controller = str_replace('[authorName]', $config['developer']['author'], $controller);

		if (file_exists($url)) {
			print_r("Este archivo ya existe eliminelo o intente con otro nombre\n");
		} else {
			$view = fopen($url, 'a');
			if (fwrite($view, $controller) !== FALSE) {
				print_r("Se ha creado el Controlador " . $name . "Controller.php en " . $config['path']['controllers'] . "\n");
			} else {
				print_r("Ha ocurrido un error al crear el controlador");
			}
		}
	}

	/**
	 * Function deleteMvc
	 *
	 * Función que elimina una serie de archivos MVC especificados
	 *
	 * @param $controller Nombre del los archivos vinculados al controlador
	 * @return void
	 **/
	public static function deleteMvc(string $file)
	{
		//Carga la configuracion del framework
		$config = ConfigReader::config();

		//Busca el modelo y lo elimina
		if (file_exists($config['path']['models'] . $file . ".php")) {
			unlink($config['path']['models'] . $file . ".php");
			$model = "El modelo: " . $config['path']['models'] . $file . ".php";
		}

		//Busca la vista y la elimina
		if (file_exists($config['path']['views'] . ucfirst($file) . "/")) {
			Files::removeFiles($config['path']['views'] . ucfirst($file) . "/");
			$view = "\nLas Vistas en: " . $config['path']['views'] . ucfirst($file) . "/";
		}

		//Busca el Controlador y lo elimina
		if (file_exists($config['path']['controllers'] . $file . "Controller.php")) {
			unlink($config['path']['controllers'] . $file . "Controller.php");
			$controller = "\nEl controlador: " . $config['path']['controllers'] . $file . "Controller.php";
		}
		print_r("Lo siguientes archivos fueron eliminados con exito:" . "\n" . $model . $view . $controller . "\n");
	}
}
