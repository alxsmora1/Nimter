<?php 
/**
*  Clase para conectar a una base de datos MySQL/MariaDB de manera segura.
*  
*  PHP versión 7.0
*
*  @package databases
*  @version 1.1.0
*  
*/

namespace Core\databases;
use mysqli;

class conn2dbmysqli extends mysqli
{
	protected $dbhost;		#String host
	protected $dbuser;		#String user
	protected $dbpwd;		#String pwd
	protected $dbname;		#String name

	#Constructor de la clase que proveé a la misma de la conexión.
	public function __construct()
	{
		$this->conn2dbmysqli();
	}

	#Función protegida para conectar a la base de datos.
	protected function conn2dbmysqli()
	{	
		global $config;

		$this->dbhost = $config['database']['host'];
		$this->dbuser = $config['database']['user'];
		$this->dbpwd = $config['database']['pwd'];		
		$this->dbname = $config['database']['name'];

		parent::__construct("$this->dbhost","$this->dbuser","$this->dbpwd","$this->dbname");
		$this->query("SET NAMES utf8;");
		//Cambia los parametros de las fechas al español
		$this->query("SET lc_time_names = 'es_MX';");		
		if( $this->connect_errno ) {
			//echo "Error al conectar a la base de datos";
		} else {
			//echo "conectado...";
		}
	}

	#Función publica para contar las filas de la consulta.
	public function rows( $a )
	{
		return mysqli_num_rows($a);
	}

	#Función publica para recorrer el resultado de una consulta. 
	public function recorrer( $a )
	{
		return mysqli_fetch_array($a);
	}

	#Función publica liberar la memoria de la consulta.
	public function freem( $a )
	{
		return mysqli_free_result($a);
	}
}
?>