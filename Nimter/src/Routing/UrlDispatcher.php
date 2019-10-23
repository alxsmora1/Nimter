<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *
 * PHP versión 7.1.3
 *
 * @package Nimter\Routing
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.3.0
 */

namespace Nimter\Routing;

use Nimter\Routing\Router;
use Symfony\Component\Yaml\Yaml;

/**
 * Class  UrlDispatcher
 *
 * Clase que se encarga de manejar las urls del framework y parte del routing
 **/
class UrlDispatcher
{
    /**
     * Function UrlMatcher
     *
     * Función verificar la coincidencia de las urls
     *
     * @return array - $routing
     **/
    public function urlMatcher()
    {
        //Obtiene la configuración de las rutas
        $config = Yaml::parse(file_get_contents('urls.yaml'));

        //Obtiene la url actual
        $url = (new Router())->getUrl();
        $uri = (new Router())->getRoutes();

        $routing = '';

        foreach ($config as $x) {
            $params = array();

            $routes = array_filter(explode('/', $x['path']));
            $method = array_filter(explode('::', $x['controller']));

            $controllerPath = array_shift($method);

            $controllerx = array_filter(explode('/', $controllerPath));

            $namespace = str_replace('/',"\\",$controllerPath);

            $controller = array_pop($controllerx);

            $method = array_pop($method);

            $c = 1;
            foreach ($routes as &$value) {
                if(false === strpos($value,'{')) {
                    $c++;
                } else {
                    preg_match("/^(.*\{)(.*)(\})/",$routes[$c],$valueKey);

                    $keyName = $valueKey[2];
                    $value = $uri[$c] ?? null;

                    if(null === $value) {
                        unset($routes[$c]);
                    } else {
                        $params[$keyName] = $value;
                        $routes[$c] = $value;
                    }

                    $c++;
                }
            }

            $url2 = implode('/',$routes);

            $path = '/' . $url2;

            if ($path === $url) {
                $routing = array(
                    'path' => $controllerPath,
                    'namespace' => $namespace,
                    'controller' => $controller,
                    'method' => $method,
                    'params' => $params,
                );
            }
        }

        return $routing;
    }
}