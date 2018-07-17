<?php
/**
*  Controlador para el modulo de Home
*  
*  PHP versión 7.0
*
*  @package controllers
*  @version 1.1.0
*           
*/

use App\Models\home;

$home = new home();
$home->bienvenida();

echo $twig->render('home.twig', array(
	'Title' => 'Horizon PHP Framework',
	));
 ?>