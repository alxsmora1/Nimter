<?php 
/**
*  Controlador para las pruebas en el Framework
*  
*  PHP versión 7
*
*  @package Controllers
*  @license Closed code
*  @version 1.5.0
*  
*/
use Core\databases\conn2dbmysqli;

$conn = new conn2dbmysqli();

if ( $_POST && $method == 'case' && $param == 1 ) 
{
	$name = $conn->real_escape_string($_POST['name']);
	$email = $conn->real_escape_string($_POST['email']);
	$sql = $conn->query("INSERT INTO usuarios(nombre,email) VALUES('$name','$email');");
	//echo("<script>location.href = '/TMF/test';</script>");
	header('location: /TMF/test');
}

dump($uri);

echo $twig->render('test.twig', array(
	'Title' => 'Pagina de Test',
	'param' => $param,
	));

$conn->close();
?>