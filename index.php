<?php 
/**
*  Index 
*    
*  PHP versión 7.0
*
*  @package TMF/
*  @version 1.0.3
*  
*/

require_once ('Core/autoload.php');
require_once ('Core/vendor/autoload.php');
require_once ('Core/init/init.php');

require $ctl->routeController($controller);
?>