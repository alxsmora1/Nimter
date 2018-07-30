<?php
/**
*  Controlador home
*  
*  PHP versión 7.0
*
*  @package Controllers
*  @author 
*           
*/

use App\Models\home;

$home = new home();

echo $twig->render('home.twig', array(
	'Titulo' => $home->bienvenida(),
	));
 ?>