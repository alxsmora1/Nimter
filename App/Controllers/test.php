<?php 
/**
*  Controlador para las pruebas en el Framework
*  
*  PHP versión 7
*
*  @package Controllers
*  @license Closed code
*  
*/

use Core\databases\conn2dbmysqli;

$conn = new conn2dbmysqli();

$sql0 = $conn->query("SELECT usr.nombre AS nombre, usr.email AS email, usr.username AS username FROM usuarios AS usr;");

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

if ( $_POST && $method == 'case' && $param == 1 ) 
{
	$name = $conn->real_escape_string($_POST['name']);
	$email = $conn->real_escape_string($_POST['email']);
	$username = $conn->real_escape_string($_POST['username']);
	
	$sql = $conn->query("INSERT INTO usuarios(nombre,email,username) VALUES('$name','$email','$username');");
	header('location: /TMF/test');
}

//Renderizado de la plantilla (Twig).
echo $twig->render('test.twig', array(
	'Title' => 'Pagina de Test',
	'param' => $param,
	'Table_Header' => 'Tabla de Datos de los Usuarios',
	'usuarios' => $usuarios,
	));

//Cierre de la conexión a base de datos.
$conn->close();
?>