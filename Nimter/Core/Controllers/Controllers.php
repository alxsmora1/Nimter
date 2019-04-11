<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *  
 * PHP versión 7.1.3
 *
 * @package Nimter\Core\controllers
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.2.0
 */

namespace Nimter\Core\Controllers;

use Nimter\Core\Router\Router;
use Nimter\Core\Init\ConfigReader AS config;
use Nimter\Core\Helpers\Sessions as session;

/**
 * Class Controllers
 * 
 * Clase que se encarga de manejar los controladores del framework.
 */
class Controllers
{
    /** @var string $_controller Variable que contiene la ruta del controlador y su nombre, home por defecto */
    protected $controller = "home";
    /** @var string $_method Variable que contiene el metodo del controlador, index por defecto */
    protected $method = "index";
    /** @var array $_params Arreglo vacio que guarda los parametros cargados en la ruta del controlador */
    protected $params = [];

    /**
     * Function controllersx
     *
     * Función del contrutor que se encarga de toda la logica tras la carga de los controladores
     *
     * @return void
     **/
    public function __construct()
    {
        session::sessionInit();

        //Carga la configuracion del framework
		$config = config::config();

        //Obtenemos la url
        $url = (new router)->getRoutes();

        //Condición que comprueba que la url del controlador no este vacia.
        //De lo contrario nos reenvia el controaldor Home por defecto.
        if (empty($url[1])) {
            $url[1] = 'home';
        }

        //Se comprueba que exista el controlador en la ubicación designada los controladores
        if (file_exists($config['path']['controllers'] . $url[1] . "Controller.php")) {
            //Nombre del archivo que se va a cargar
            $this->controller = $url[1] . "Controller";

            unset($url[1]);
        } else {
            $this->error404();
        }

        //Obtenemos la clase con su espacio de nombres
        $fullClass = $config['path']['namespace_controllers'] . $this->controller;

        //Asociamos la instancia a $this->controller
        $this->controller = new $fullClass;

        //Comprobamos que el método exista en la clase a la que se accede
        if (isset($url[2])) {
            $this->method = $url[2];

            if (method_exists($this->controller, $url[2])) {
                unset($url[2]);
            } else {
                $this->error404();
            }
        }

        //Asociamos el resto de segmentos a $this->params, que serán los parametros pasados al arreglo
        $this->params = $url ? array_values($url) : [];
    }

    /**
     * Function start
     *
     * Función que carga la clase, el metodo y los parametros. 
     * Uso para cargar un controlador en base a la respuesta del router.
     *
     * @return void
     **/
    public function start()
    {
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Function render
     *
     * Función que carga las configuraciones de Twig, recibe los datos para renderizar la vista y sus parametros.
     *
     * @param string $view
     * @param array $params
     * @return array - Arreglo con el renderizado de la vista por Twig.
     **/
    public static function render(string $view, array $params = array())
    {
        //Carga la configuracion del framework
		$config = config::config();

        if (!file_exists($config['twig']['cache'])) {
            mkdir($config['twig']['cache'], 0777, true);
        }

        //Configuración para el motor de platillas Twig
        $loader = new \Twig_Loader_Filesystem($config['path']['views']);
        $twig = new \Twig_Environment($loader, array(
            'cache' => $config['twig']['cache'],
            'auto_reload' => $config['twig']['reload'],
        ));

        //Global Variables
        $twig->addGlobal('Framework', 'Nimter');

        return $twig->display($view, $params);
    }

    /**
     * Function error404
     *
     * Función para manejar los errores de archivo no encontrado
     *
     **/
    public function error404()
    {
        //Carga la configuracion del framework
		$config = config::config();

        //Control de errores cuando no encuentra el controlador o la pagina de error misma
        if (file_exists($config['path']['controllers'] . "errorController.php")) {
            //Obtenemos la clase con su espacio de nombres del controlador de error
            $fullClass = $config['path']['namespace_controllers'] . 'errorController';

            //Asociamos la instancia al objeto
            $this->controller = new $fullClass;

            call_user_func_array([$this->controller, 'index'], $this->params);
            exit;
        } else {
            echo "
            <center>
            <h1>Error 404</h1>
            <hr>
            <h3>El controlador que busca no existe o no se ha encontrado en la ruta especificada: <code>" . $config['path']['controllers'] . "</code></h3>
            <p>Verifique que los archivos no hayan sido movidos de lugar o que cuente con ellos, incluido el controlador de error 404.</p>
            </center>
            ";
            exit;
        }
    }
}
