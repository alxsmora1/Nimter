<?php 
/**
 * Class conn2db
 * 
 * Clase para conectarse a base de datos através de PDO
 *  
 * PHP versión 7.1.3
 *
 * @package Nimter Framework
 * @author Alexis Mora
 * @version 1.2.0
 * 
 **/

namespace Nimter\Core\helpers;

use \PDO;

class conn2db
{
    # @var, Driver de la base de datos
    protected $driver;
    # @var, Host de la base de datos
    protected $host;
    # @var, Puerto de conexión de la base de datos
    protected $DBport;
    # @var, Nombre de la base de datos
    protected $DBname;
    # @var, Nombre de usuario de la base de datos
    protected $DBuser;
    # @var, Contraseña de la base de datos
    protected $DBpwd;
    # @var, Codificación de la base de datos
    protected $DBCodification;
    # @object, Objeto PDO
    protected $pdo;
    # @array, Parametros para la consulta
    protected $params;
    # @bool, Estado de la conexión
    protected $connection = false;

    /**
     * Function __constructor
     *
     * Función que carga la conexión a la base de datos
     **/
    public function __construct()
    {
        global $config;

        $this->driver   = $config['database']['driver'];
        $this->host     = $config['database']['host'];
        $this->DBport   = $config['database']['port'];
        $this->DBname   = $config['database']['name'];
        $this->DBuser   = $config['database']['user'];
        $this->DBpwd    = $config['database']['pwd'];
        $this->DBCodification    = $config['database']['codification'];
        $this->params   = array();
        $this->connection();
    }

    /**
     * Function connection
     * 
     * Configura la conexión a la base de datos.
     **/
	protected function connection() 
	{
		try 
        {
            $connector = $this->driver.'::host='.$this->host.';dbname='.$this->DBname;

            $attributes = array(
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false, 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$this->DBCodification."'"
            );
        
            $this->pdo = new PDO( $connector,$this->DBuser,$this->DBpwd,$attributes );

            $this->connection = true;
        } 
        catch( PDOException $e ) 
        {
            echo __LINE__.$e->getMessage();
        }
    }

    /** 
     * Function prepareSQL
     * 
     * Funcion que genera una consulta preparada a la base de datos
     * 
     * @param string $sql
     * @param array $params
     * @return void
     **/
    private function prepareSQL( $sql, $params = "" )
    {
        try {
            if ( $this->connection == true ) 
            {
                $this->connection();
            }
            
            $this->stmt = $this->pdo->prepare($sql);

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
        catch ( PDOException $e ) 
        {
            echo __LINE__.$e->getMessage();
        }
        
        $this->params = array(); //Reinicia el arreglo
    }

    /** 
     * Function binder
     * 
     * Funcion recorre los parametros y los añade al arreglo despues de bindearlos
     * 
     * @param string $param
     * @param string $value
     * @return void
     **/
    public function binder( $param, $value )
    {
        $this->params[sizeof($this->params)] = [":" . $param , $value];
    }

    /** 
     * Function addParams
     * Funcion que agrega un parametro bindeado a la consulta
     * @param array $params_array
     * @return void 
     **/
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
     * 
     * Funcion que genera los resultados de la consulta y completa las funciones de la clase
     * 
     * @param string $sql
     * @param array $params
     * @param string $fetchmode
     * @return void 
     **/
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
     * 
     * Retorna el ultimo ID insertado en una transacción.
     * 
     * @return string - El ultimo ID insertado
     **/
    public function lastId()
    {
        return $this->lastInsertId();
    }

    /**
     * Function close
     * 
     * Cierra la conexión con el servidor de base de datos
     **/
    public function close()
    {
        $this->pdo = null;
    }
}
?>
