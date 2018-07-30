<?php 
/**
 * Clase para el ruteo.
 *  
 * PHP versión 7.0
 *
 * @package Horizon Framework
 * @author Alexis Mora
 *  
 */

namespace Core\ruteo;

class router
{
    public $uri;
    public $controller;
    public $method;
    public $param;
    
    /** 
     * Function __construct
     * Carga todos los metodos con los datos de la uri
     */
    public function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }

    /** 
     * Function setUri
     * Obtiene los parametros de la uri y los divide en segmentos
     */
    public function setUri()
    {
        $this->uri = explode('/', $_SERVER['REQUEST_URI']);
    }

    /** 
     * Function setController
     * Obtiene el nombre del controlador
     */
    public function setController()
    {
        $this->controller = $this->uri[2] === '' ? 'home' : $this->uri[2];
    }

    /** 
     * Function setMethod
     * Obtiene el nombre del metodo
     */
    public function setMethod()
    {
        $this->method = !empty($this->uri[3]) ? $this->uri[3] : 'case';
    }

    /** 
     * Function setParam
     * Obtiene el parametro del metodo
     */
    public function setParam()
    {
        $this->param = !empty($this->uri[4]) ? $this->uri[4] : '';
    }

    /** 
     * Function getUri
     * Retorna la uri actual
     * @return array - Devuelve la uri completa como un arreglo 
     */
    public function getUri()
    {
        return $this->uri;
    }

    /** 
     * Function getController
     * Retorna el nombre del controlador en la uri
     * @return string - Devuelve el nombre del controlador 
     */
    public function getController()
    {
        return $this->controller;
    }

    /** 
     * Function getMethod
     * Retorna el nombre del metodo en la uri
     * @return string|null - Devuelve el nombre del metodo si esta declarado
     */
    public function getMethod()
    {
        return $this->method;
    }

    /** 
     * Function getParam
     * Retorna el parametro del metodo
     * @return string|null - Devuelve el parametro del metodo si esta declarado
     */
    public function getParam()
    {
        return $this->param;
    }
}
?>