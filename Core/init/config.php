<?php 
/**
 * Clase para leer la configuración.
 *  
 * PHP versión 7.0
 *
 * @package Nimter Framework
 * @author Alexis Mora 
 */

namespace Core\init;

use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Yaml;

class config
{	
	/** 
     * Function generalConfig
     * Carga el arcivo de configuracion y lee el archivo de configuración
     * @return array -  Devuelve un arreglo con las configuraciones
     */
	public function generalConfig() 
	{
		return Yaml::parse(file_get_contents('Core/init/config.yml'));
	}
}
?>