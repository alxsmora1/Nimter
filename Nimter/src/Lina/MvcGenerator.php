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
		//URL del template de controladores
		$urlTemplate = 'Nimter/Core/Lina/resources/MODEL';

		$model = file_get_contents($urlTemplate);

		//Modifica el contenido del template del modelo
		$model = str_replace('[modelName]', $name, $model);
		$model = str_replace('[authorName]', getenv('AUTHOR_NAME'), $model);

		$url = getenv('DEFAULT_MODELS') . $name . '.php';

		if (file_exists($url)) {
			print_r("Este archivo ya existe eliminelo o intente con otro nombre.\n");
		} else {
			$view = fopen($url, 'a');
			if (fwrite($view, $model) !== FALSE) {
				print_r("Se ha creado el modelo " . $name . ".php en " . getenv('DEFAULT_MODELS') . "\n");
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
		//URL del template basico
		$url = 'Nimter/Core/lina/resources/VIEW';

		if (file_exists($url)) {
			$template = file_get_contents($url);

			//Url del directorio de las vistas
			$directory = getenv('DEFAULT_VIEWS') . ucfirst($name);

			//Comprueba que exista el directorio, si no es así lo crea
			if (!file_exists($directory)) {
				mkdir($directory, 0777, true);
			}

			//Url del archivo
			$url = getenv('DEFAULT_VIEWS') . ucfirst($name) . '/index.twig';

			if (file_exists($url)) {
				print_r("Este archivo ya existe eliminelo o intente con otro nombre\n");
			} else {
				$view = fopen($url, 'a');
				if (fwrite($view, $template) !== FALSE) {
					print_r("Se ha creado la Vista " . $name . ".twig en " . getenv('DEFAULT_VIEWS') . "\n");
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
		//Url del controlador a generar
		$url = getenv('DEFAULT_CONTROLLERS') . $name . 'Controller.php';

		//URL del template de controladores
		$urlTemplate = 'Nimter/Core/lina/resources/CONTROLLER';

		//Obtine el contenido del template de controlador
		$controller = file_get_contents($urlTemplate);

		//Modifica el contenido del template de controlador
		$controller = str_replace('[controllerName]', $name, $controller);
		$controller = str_replace('[directoryName]', ucfirst($name), $controller);
		$controller = str_replace('[controllerPath]', $url, $controller);
		$controller = str_replace('[authorName]', getenv('AUTHOR_NAME'), $controller);

		if (file_exists($url)) {
			print_r("Este archivo ya existe eliminelo o intente con otro nombre\n");
		} else {
			$view = fopen($url, 'a');
			if (fwrite($view, $controller) !== FALSE) {
				print_r("Se ha creado el Controlador " . $name . "Controller.php en " . getenv('DEFAULT_CONTROLLERS') . "\n");
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
		//Busca el modelo y lo elimina
		if (file_exists(getenv('DEFAULT_MODELS') . $file . ".php")) {
			unlink(getenv('DEFAULT_MODELS') . $file . ".php");
			$model = "El modelo: " . getenv('DEFAULT_MODELS') . $file . ".php";
		}

		//Busca la vista y la elimina
		if (file_exists(getenv('DEFAULT_VIEWS') . ucfirst($file) . "/")) {
			Files::removeFiles(getenv('DEFAULT_VIEWS') . ucfirst($file) . "/");
			$view = "\nLas Vistas en: " . getenv('DEFAULT_VIEWS') . ucfirst($file) . "/";
		}

		//Busca el Controlador y lo elimina
		if (file_exists(getenv('DEFAULT_CONTROLLERS') . $file . "Controller.php")) {
			unlink(getenv('DEFAULT_CONTROLLERS') . $file . "Controller.php");
			$controller = "\nEl controlador: " . getenv('DEFAULT_CONTROLLERS') . $file . "Controller.php";
		}
		print_r("Lo siguientes archivos fueron eliminados con exito:" . "\n" . $model . $view . $controller . "\n");
	}
}
