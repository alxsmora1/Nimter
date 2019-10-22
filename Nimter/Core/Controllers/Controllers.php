<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *
 * PHP versión 7.1.3
 *
 * @package Nimter\Core\Controllers
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.3.0
 */

namespace Nimter\Core\Controllers;

use Nimter\Core\Controllers\IControllers;
use Nimter\Core\Routing\UrlDispatcher;
use Nimter\Core\Init\ConfigReader;
use Nimter\Core\Helpers\Sessions;

/**
 * Class Controllers
 *
 * Clase que se encarga de manejar los controladores del framework.
 */
class Controllers implements IControllers
{
    /** @var string $_controller Variable que contiene la ruta del controlador y su nombre, home por defecto */
    protected $controller = "home";
    /** @var string $_method Variable que contiene el metodo del controlador, index por defecto */
    protected $method = "index";
    /** @var array $_params Arreglo vacio que guarda los parametros cargados en la ruta del controlador */
    protected $params = [];

    /**
     * Function __construct
     *
     * Función del contrutor que se encarga de toda la logica tras la carga de los controladores
     *
     * @return void
     **/
    public function __construct()
    {
        Sessions::sessionInit();

        //Obtenemos la data de las rutas
        $routing = (new UrlDispatcher())->UrlMatcher();

        //Condición que comprueba que la url del controlador no este vacia.
        //De lo contrario nos reenvía el controlador Home por defecto.
        if (empty($routing['controller'])) {
            $this->error404();
        }

        //Se comprueba que exista el controlador en la ubicación designada los controladores
        if (file_exists($routing['path'] . ".php")) {
            //Nombre del archivo que se va a cargar
            $this->controller = $routing['controller'];
        } else {
            $this->error404();
        }

        //Obtenemos la clase con su espacio de nombres
        $fullClass = $routing['namespace'];

        //Asociamos la instancia a $this->controller
        $this->controller = new $fullClass;

        //Comprobamos que el método exista en la clase a la que se accede
        if (isset($routing['method'])) {
            $this->method = $routing['method'];

            if (false === method_exists($this->controller, $routing['method'])) {
                $this->error404();
            }
        }

        //Asociamos $routing['params'] a $this->params, que serán los parametros pasados al arreglo
        $this->params = $routing['params'] ? array_values($routing['params']) : [];
    }

    /**
     * Function start
     *
     * Función que carga la clase, el metodo y los parametros.
     * Uso para cargar un controlador en base a la respuesta del router.
     *
     * @return void
     **/
    public function execute()
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
		$config = ConfigReader::config();

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
		$config = ConfigReader::config();

        //Control de errores cuando no encuentra el controlador o la pagina de error misma
        if (file_exists($config['path']['controllers'] . "errorController.php")) {
            //Obtenemos la clase con su espacio de nombres del controlador de error
            $fullClass = $config['path']['namespace_controllers'] . 'errorController';

            //Asociamos la instancia al objeto
            $this->controller = new $fullClass;

            call_user_func_array([$this->controller, 'error404'], $this->params);
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
