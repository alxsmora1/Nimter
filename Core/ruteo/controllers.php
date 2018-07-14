<?php 
/**
*  Clase para el ruteo.
*  
*  PHP versión 7.0
*
*  @package router
*  @version 1.1.0
*  
*/
namespace Core\ruteo;

class controllers
{
	public function routeController($controller)
	{
		global $config;

		//URL del controlador
		$urlController = $config['path']['controllers'] . "{$controller}.php";

		//Verifica si existe el controlador, de lo contrario se envia al home
		if ( file_exists($urlController) ) 
		{
			$controllerX = $urlController;
		} 
		else 
		{
			$controllerX = $config['path']['controllers'] . "home.php";;
		}
		
		return $controllerX;
	}
}