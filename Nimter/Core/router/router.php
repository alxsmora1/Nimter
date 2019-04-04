<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *  
 * PHP versión 7.1.3
 *
 * @package Nimter\Core\router
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.2.0
 */

namespace Nimter\Core\Router;

/**
 * Class router
 * 
 * Clase que se encarga de manejar las URL's
 **/
class Router
{
    private $basepath;
    private $uri;
    private $base_url;
    private $routes;
    private $params;

    /**
     * Function __construct
     * 
     * Carga la los datos completos de la url y sus secciones
     **/
    function __construct($get_params = false)
    {
        $this->get_params = $get_params;
    }

    /**
     * Function getRoutes
     * 
     * Obtiene la ruta completa de la url 
     *
     * @return array - arreglo con la dirección base de la url dividida por slashes
     **/
    public function getRoutes()
    {
        $this->base_url = $this->getCurrentUri();
        $this->routes = array_filter(explode('/', $this->base_url));

        $this->getParams();
        return $this->routes;
    }

    /**
     * Function getCurrentUrl
     * 
     * Obtiene la url actual
     *
     * @return array - arreglo con la dirección url
     **/
    private function getCurrentUri()
    {
        $this->basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';

        $this->uri = substr($_SERVER['REQUEST_URI'], strlen($this->basepath));

        if ($this->get_params) {
            $this->getParams();
        } else {
            if (strstr($this->uri, '?')) $this->uri = substr($this->uri, 0, strpos($this->uri, '?'));
        }

        $this->uri = '/' . trim($this->uri, '/');

        return $this->uri;
    }

    /**
     * Function getParams
     * 
     * Verfica si existe una query string con parametros GET sobre la url
     **/
    private function getParams()
    {
        if (strstr($this->uri, '?')) {
            $params = explode("?", $this->uri);
            $params = $params[1];

            parse_str($params, $this->params);
            $this->routes[0] = $this->params;
            array_pop($this->routes);
        }
    }
}
 