<?php 
/**
*  Clase para leer la configuración.
*  
*  PHP versión 7.0
*
*  @package router
*  @version 1.1.0
*  
*/

namespace Core\init;

use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Yaml;

final class config
{	
	final public function readConfig() : array {
		return Yaml::parse(file_get_contents('Core/init/config.yml'));
	}
}
?>