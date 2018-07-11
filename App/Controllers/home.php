<?php
/**
*  Controlador para el modulo de Home
*  
*  PHP versión 7.1
*
*  @package controllers
*  @license Closed code
*           
*/

use Core\databases\conn2dbmysqli;

$conn = new conn2dbmysqli();

$sql0 = $conn->query("SELECT usr.nombre AS nombre, usr.email AS email, usr.username AS username
FROM usuarios AS usr;");
if ( $conn->rows($sql0) > 0 ) 
{
	while ( $x = $conn->recorrer($sql0) ) 
	{
		$usuarios[] = array(
			'nombre' => $x['nombre'], 
			'email' => $x['email'], 
			'username' => $x['username'] 
		);
	}
}

echo $twig->render('home.twig', array(
	'Title' => 'Horizon PHP Framework', 
	'Table_Header' => 'Tabla de Datos de los Usuarios',
	'usuarios' => $usuarios,
	));
 ?>