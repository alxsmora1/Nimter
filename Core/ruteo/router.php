<?php 
/**
*  Clase para el ruteo.
*  
*  PHP versión 7.0
*
*  @package routeo
*  @version 1.1.0
*  
*/
namespace Core\ruteo;

class router
{
    public $uri;
    public $controller;
    public $method;
    public $param;
    
    public function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }

    //Setters
    public function setUri()
    {
        $this->uri = explode('/', $_SERVER['REQUEST_URI']);
    }

    public function setController()
    {
        $this->controller = $this->uri[2] === '' ? 'home' : $this->uri[2];
    }

    public function setMethod()
    {
        $this->method = !empty($this->uri[3]) ? $this->uri[3] : 'case';
    }

    public function setParam()
    {
        $this->param = !empty($this->uri[4]) ? $this->uri[4] : '';
    }

    //Getters
    public function getUri()
    {
        return $this->uri;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParam()
    {
        return $this->param;
    }
}
?>