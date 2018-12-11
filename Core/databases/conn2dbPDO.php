<?php 
/**
 * Clase para conectar a una base de datos metodo PDO.
 *  
 * PHP versión 7.0
 *
 * @package Nimter Framework
 * @author Alexis Mora
 */

namespace Core\databases;
use PDO;

class conn2dbPDO extends \PDO
{
	protected $params;  //Parametros que recibe la consulta
    protected $stmt;    //Consulta preparada

    /** 
     * Function __contruct
     * Conecta con la base de datos.
     */
    public function __construct() 
    {
        $this->conn2dbPDO();
        $this->params = array();
    }

    /**
     * Function conn2dbPDO
     * Configura la conexión a la base de datos.
     */
	protected function conn2dbPDO() 
	{
		global $config;

        $connector = $config['database']['driver'].':host='.$config['database']['host'].';dbname='.$config['database']['name'];

        $attributes = array(
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_EMULATE_PREPARES => false, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$config['database']['codification']."'"
        );
        
        try 
        {
            parent::__construct( $connector, $config['database']['user'], $config['database']['pwd'],$attributes);
        } 
        catch( PDOException $e ) 
        {
            echo __LINE__.$e->getMessage();
        }
    }

    /** 
     * Function prepareSQL
     * Funcion que genera una consulta preparada a la base de datos
     * @param string $sql
     * @return 
     */
    private function prepareSQL( $sql, $params = "" )
    {
        try {
            $this->stmt = $this->prepare($sql);

            //Agrega los parametros al arreglo de parametros  
            $this->addParams($params);
                
            //Asigna los parametros y el tipo de parametro
            if (!empty($this->params)) 
            {
                foreach ($this->params as $param => $value) 
                {
                    if(is_int($value[1])) 
                    {
                        $type = PDO::PARAM_INT;
                    } 
                    else if( is_bool($value[1]) ) 
                    {
                        $type = PDO::PARAM_BOOL;
                    } 
                    else if( is_null($value[1]) ) 
                    {
                        $type = PDO::PARAM_NULL;
                    } 
                    else 
                    {
                        $type = PDO::PARAM_STR;
                    }
                    $this->stmt->bindParam($value[0], $value[1], $type);
                }
            }
                
                # Ejecuta la consulta SQL 
                $this->stmt->execute();
        }
        catch (PDOException $e) 
        {
            echo __LINE__.$e->getMessage(); //Imprime el error en el ambiente de desarrollo
        }
        
        $this->params = array(); //Reinicia el arreglo
    }

    /** 
     * Function binder
     * Funcion recorre los parametros y los añade al arreglo despues de bindearlos
     * @param string $param
     * @param string $value
     * @return void
     */
    public function binder( $param, $value )
    {
        $this->params[sizeof($this->params)] = [":" . $param , $value];
    }

    /** 
     * Function addParams
     * Funcion que agrega un parametro bindeado a la consulta
     * @param array $params_array
     * @return void 
     */
    private function addParams( $params_array )
    {
        if ( empty($this->params) && is_array($params_array) ) 
        {
            $keys = array_keys($params_array);
            foreach ( $keys as $x => &$key ) 
            {
                $this->binder($key, $params_array[$key]);
            }
        }
    }

    /** 
     * Function query
     * Funcion que genera los resultados de la consulta y completa las funciones de la clase
     * @param string $sql
     * @param array $params
     * @param string $fetchmode
     * @return void 
     */
    public function query( $sql, $params = null, $fetchmode = PDO::FETCH_ASSOC )
    {
        $sql = trim(str_replace("\r", " ", $sql));
        
        $this->prepareSQL($sql, $params);
        
        $rawStmt = explode(" ", preg_replace("/\s+|\t+|\n+/", " ", $sql));
        
        //Determina el tipo de consulta y entrega el resultado adecuado dependiendo de la consulta 
        $cleanStmt = strtolower($rawStmt[0]);
        
        if ( $cleanStmt === 'select' || $cleanStmt === 'show' ) 
        {
            return $this->stmt->fetchAll($fetchmode);
        } 
        elseif ( $cleanStmt === 'insert' || $cleanStmt === 'update' || $cleanStmt === 'delete' ) 
        {
            return $this->stmt->rowCount();
        } 
        else 
        {
            return NULL;
        }
    }

    /**
     * Function lastId
     * Retorna el ultimo ID insertado en una transacción.
     * @return string - El ultimo ID insertado
     */
    public function lastId()
    {
        return $this->lastInsertId();
    }
}
?>
