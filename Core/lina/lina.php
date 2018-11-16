<?php 
/**
 * LINA, automatización de la linea de comandos / generador de archivos
 * 
 * PHP versión 7.0
 *
 * @package Nimter Framework
 * @author Alexis Mora
 *  
 */

namespace Core\lina;

use Core\init\config;

class lina
{
	/** 
     * Function getRows
     * Lee argumentos pasados por consola para generar archivos 
     * @param string $cli
     * @param string $cli2
     * @param string $cli3
     */	
	public function generar($cli, $cli2, $cli3)
	{
		//Division los argumentos pasados a través del cli.
		$read = explode(':',$cli);
		if ( $read[0] != 'app' )
		{
			print_r("No se reconoce el comando ".$cli."\n");
			print_r("El comando debe ser: app:mvc nombre\n");
			print_r("Para ver la ayuda use el comando: app.php --Help");
		}
		else
		{
			//Toma de desiciones en el parametro uno.
			if (strlen($cli2) > 1 ) 
			{
				if ( strlen($read[1]) == 1 || strlen($read[1]) == 2 || strlen($read[1]) == 3 ) 
				{	
					//Modelo
					if ( strpos($read[1], 'm') !== false ) 
					{
						$this->createModel($cli2);
					}

					//Vista
					if ( strpos($read[1], 'v') !== false ) 
					{
						$this->createView($cli2);
					}

					//Controlador
					if ( strpos($read[1], 'c') !== false ) 
					{
						$this->create_controller($cli2);
					}
				}
			}
			else
			{
				print_r("Para usar este comando primero debe asignar un nombre ej. smart:mvc Hola_mundo\n");
				print_r("Para ver la ayuda use el comando: smart.php --Help");
			}
		}
	}

	/** 
     * Function createModel
     * Crea el modelo en la ruta asignada a los modelos desde el archivo de configuración 
     * @param string $cli2
     */	
	public function createModel($cli2)
	{
		$config = (new config)->generalConfig();

		$model = 
"<?php 

/**
 *  Clase ".$cli2."
 *  
 *  PHP versión 7
 *
 *  @package models
 *  @author ".$config['developer']['author']."
 *  
 */

namespace App\Models;

class ".$cli2."
{
	
	function __construct()
	{
		# code here...
	}
	
	public function ".$cli2."_func()
	{
		# code here...
	}
}
?>";
		$url = $config['path']['models'].$cli2.'.php';
		if ( file_exists($url) ) 
		{
			print_r("Este archivo ya existe eliminelo o intente con otro nombre.\n");
		}
		else
		{
			$view = fopen($url, 'a');
			if (fwrite($view, $model) ==  TRUE) 
			{
				print_r("Se ha creado el modelo ".$cli2.".php en ".$config['path']['models']."\n");
			}
			else
			{
				print_r("Ha ocurrido un error al crear el archivo, tenga en cuenta que se necesitan permisos de escritura para realizar esta operación.\n");
			}
		}
	}

	/** 
     * Function createView
     * Crea la vista en la ruta asignada a los Views desde el archivo de configuración 
     * @param string $cli2
     */	
	public function createView($cli2)
	{
		$config = (new config)->generalConfig();

		if (file_exists('Core/lina/resources/TEMPLATE.twig')) 
		{
			$template = file_get_contents('Core/lina/resources/TEMPLATE.twig');
			$url = $config['path']['views'].$cli2.'.twig';
			if ( file_exists($url) ) 
			{
				print_r("Este archivo ya existe eliminelo antes o intente con otro nombre\n");
			}
			else
			{
				$view = fopen($url, 'a');
				if (fwrite($view, $template) ==  TRUE) 
				{
					print_r("Se ha creado la vista ".$cli2.".twig en ".$config['path']['views']."\n");
				}
				else
				{
					print_r("Ha ocurrido un error al crear la vista\n");
				}
			}
		}
		else
		{
			print_r("El archivo base ha sido movido de su lugar o borrado");
		}
	}

	/** 
     * Function createModel
     * Crea el controlador en la ruta asignada a los controladores desde el archivo de configuración 
     * @param string $cli2
     */	
	public function create_controller($cli2)
	{
		$config = (new config)->generalConfig();

		$controller = '
<?php
/**
*  Controlador '.$cli2.'
*  
*  PHP versión 7.0
*
*  @package Controllers
*  @author '.$config['developer']['author'].'
*           
*/

echo $twig->render(\''.$cli2.'.twig\', array(
	\'Title\' => \'Controlador '.$cli2.'\',
	));
?>';
		$url = $config['path']['controllers'].$cli2.'Controller.php';
		if ( file_exists($url) ) 
		{
			print_r("Este archivo ya existe eliminelo antes o intente con otro nombre\n");
		}
		else
		{
			$view = fopen($url, 'a');
			if (fwrite($view, $controller) ==  TRUE) 
			{
				print_r("Se ha creado el controlador ".$cli2."Controller.php en ".$config['path']['controllers']."\n");
			}
			else
			{
				print_r("Ha ocurrido un error al crear el controlador\n");
			}
		}
	}

	/** 
     * Function help
     * Provee la ayuda del generador de codigo
     */
	public function help()
	{
		print_r("MVC Para generar un Modelo Vista Controlador debe de usar el siguiente comando: app:mvc Nombre_archivo. Tambien puede crear solo un tipo de archivo ej. app:m Nombre_archivo.\n");
		print_r("--version Provee la versión del framework.\n");
		print_r("--license Provee la licencia del framework.\n");
	}

	/** 
     * Function version
     * Provee la versión del Framework     
     */
	public function version()
	{
		print_r("Nimter 2018 Versión 1.0");
	}

	/** 
     * Function license
     * provee la licencia del Framework
     */
	public function license()
	{	
		print_r("MIT\nCopyright Alexis Mora 2017 - 2018\nPara más información revise el archivo LICENSE en la raiz del Framework.\n");
	}
}
?>