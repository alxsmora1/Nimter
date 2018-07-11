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

class controller
{
	private $view;
	public function __construct()
	{
		echo __CLASS__ . ' instanciada';
	}

	public function exec()
	{
		echo "<br>Ejemplo metodo exec()";
	}

	public function id($param)
	{
		echo "<br>Ejemplo metodo id() con parametro ".$param;
	}
}

?>