<?php 
/**
 * Clase para conectar a una base de datos metodo PDO.
 *  
 * PHP versión 7.0
 *
 * @package Horizon Framework
 * @author Alexis Mora
 */

namespace Core\databases;
use PDO;

class conn2dbPDO extends \PDO
{

	/** 
     * Function __contruct
     * Conecta con la base de datos.
     */
    public function __construct() 
    {
        $this->conn2dbPDO();
    }

    /**
     * Function conn2dbPDO
     * Configura la conexión a la base de datos.
     */
	protected function conn2dbPDO() 
	{
		global $config;

        $connector = $config['database']['driver'].':host='.$config['database']['host'].';dbname='.$config['database']['name'];
        
        try 
        {
            parent::__construct( $connector, $config['database']['user'], $config['database']['pwd']);

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch( PDOException $e ) 
        {
            echo __LINE__.$e->getMessage();
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
		$stmt = $this->prepare( $sql );
        $stmt->execute();
        $num = $stmt->rowCount();
        $stmt->closeCursor();
	   
        return $num;
	}

    /** 
     * Function getData
     * Corre una función de tipo SELECT
     * @param string $sql
     * @return array - Devuelve los datos del SELECT
     */
    public function getData( $sql ) 
    {
        $stmt = $this->prepare( $sql );
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $data;
    }
}
?>
