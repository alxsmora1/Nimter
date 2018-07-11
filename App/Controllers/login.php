<?php 
/**
*  Controlador para el login.
*  
*  PHP versión 7
*
*  @package Controllers
*  @license Closed code
*  @version 1.5.0
*  
*/

echo $twig->render('login.twig', array(
	'Title' => 'Pagina de Test',
	'param' => $param,
	'controller' => $controller,
	));

$conn->close();
?>