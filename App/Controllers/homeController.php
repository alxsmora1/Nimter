<?php
/**
 *  Controlador home
 *  
 *  @package Controllers
 *  @author 
 **/

namespace App\Controllers;

use Nimter\Core\controllers\controllers as controller;
use Nimter\Core\init\configReader as config;

class homeController
{
    /**
     * Function index
     *
     * Función index para el controlador home
     **/
    public function index()
    {
        //Carga la configuración
        $config = config::config();

        dump($config);

        //Parametros pasados a la vista
        $params = array(
            'controllerName' => 'homeController',
            'controllerPath' => 'App/Controllers/homeController.php',
            'version' => $config['nimter']['version']
        );

        controller::render('Home/index.twig', $params);
    }
}
 