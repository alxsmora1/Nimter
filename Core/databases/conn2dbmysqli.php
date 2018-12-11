<?php 
/**
 * Clase para conectar a una base de datos metodo mysqli.
 *  
 * PHP versión 7.0
 *
 * @package Nimter Framework
 * @author Alexis Mora
 */

namespace Core\databases;
use mysqli;

class conn2dbmysqli extends mysqli
{
	
	/** 
     * Function __contruct
     * Conecta con la base de datos.
     */
	public function __construct()
	{
		$this->conn2dbmysqli();
	}

	/**
     * Function conn2dbPDO
     * Configura la conexión a la base de datos.
     */
	protected function conn2dbmysqli()
	{	
		global $config;
		
		try 
		{
			parent::__construct($config['database']['host'],$config['database']['user'],$config['database']['pwd'],$config['database']['name']);

			//Configura la codificación
			$this->query("SET NAMES ".$config['database']['codification'].";");

			//Configura la región y zona horaria
			$this->query("SET lc_time_names = '".$config['database']['timezone']."';");
		} 
		catch ( mysqli_sql_exception $e) 
		{
			echo __LINE__.$e->errorMessage();
		}		
	}

	/** 
     * Function getRows
     * Corre una función que cuenta los registros encontrados
     * @param string $sql
     * @return int|string -  Devuelve el numero de registros
     */
	public function getRows( $sql )
	{
		return mysqli_num_rows($sql);
	}

	/** 
     * Function getData
     * Corre una función de tipo SELECT
     * @param string $sql
     * @return array - Devuelve los datos del SELECT
     */
	public function getData( $sql )
	{
		return mysqli_fetch_array($sql);
	}

    /** 
     * Function freeQuery
     * Libera la memoria de una consulta
     * @param string $sql
     * @return boolean 
     */
	public function freeQuery( $sql )
	{
		return mysqli_free_result($sql);
	}
}
?>