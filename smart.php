<?php
/**
* Generador CLI para Horizon
*    
* PHP versión 7
*
* @package Horizon Framework
* @author Alexis Mora
*  
*/

require_once ('Core/autoload.php');
require_once ('Core/vendor/autoload.php');
use Core\smart\smarter;

$sm = new smarter();
		
#Lectura de parametros desde cli.
$cli = $argv[1];
$cli2 = $argv[2];
$cli3 = $argv[3];

#Metodos validos que acepta el generador de codigo smart.
switch ($cli) 
{
	case '--help':
		$sm->help();
		break;
	
	case '--version':
		$sm->version();
		break;

	case '--license':
		$sm->license();
		break;
	
	default:
		$sm->generar($cli,$cli2,$cli3);
		break;
}
?>