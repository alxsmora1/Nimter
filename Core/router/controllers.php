<?php 
/**
 *  Clase para controlar los errores en los controladores
 *  
 *  PHP versión 7.0
 *
 * @package Horizon Framework
 * @author Alexis Mora
 *  
 */

namespace Core\router;

class controllers
{
	/** 
     * Function routeController
     * Busca el archivo con el controlador requerido por la url, de no hallarlo redirige al home
     * @param string $text
     * @return string -  Devuelve una cadena con la ruta del controlador.
     */
	public function routeController($controller)
	{
		global $config;

		//URL del controlador
		$urlController = $config['path']['controllers'] . "{$controller}Controller.php";

		//Verifica si existe el controlador, de lo contrario redirige al home
		if ( file_exists($urlController) ) 
		{
			$pathController = $urlController;
		} 
		else 
		{
			$pathController = "404.shtml";
		}
		
		return $pathController;
	}
}