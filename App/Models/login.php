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

namespace App\Models;

use Core\databases\conn2dbmysqli;
use Core\security\hashpwd;

class login
{
	protected $user;		#String user
	protected $txtpwd;		#String pwd sin cifrar 
	protected $hashpwd;		#String pwd cifrada
	
	#Función publica para acceder a la cuenta de usuario.
	public function ilogin()
	{
		try 
		{
			if ( !empty($_POST['username']) and !empty($_POST['pwd']) ) 
			{
				$conn = new conn2dbmysqli();
				$hash = new hashpwd();
				$this->user = $conn->real_escape_string($_POST['username']);
				$this->hashpwd = $hash->encrypt($_POST['pwd']);

				$sql = $conn->query("SELECT usr.id_usuario, usr.nombre
FROM usuarios AS usr
WHERE usr.username='$this->user' AND usr.password='$this->hashpwd' AND usr.estatus=1;");
				
				if ( $conn->rows($sql) > 0 ) 
				{
					$user = $conn->recorrer($sql);
					$_SESSION['idu'] = $user['id_usuario'];
					$_SESSION['nombre'] = $user['nombre'];

					if ( $_POST['session'] == true ) { ini_set('session.cookie_lifetime', time() + (60*60*24*2)); }
					echo 1;
				} 
				else 
				{
					throw new Exception(2);
				}
				$conn->freem($sql);
				$conn->close();
			} 
			else 
			{
				throw new Exception('ERROR: Datos vacios.');
			}
		} 
		catch (Exception $e) 
		{
			echo $e->getMessage();
		}
	}
}
?>