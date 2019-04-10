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
use Nimter\Core\Router\Router as router;

class homeController
{
    /**
     * Function index
     *
     * Función index para el controlador home
     **/
    public function index()
    {
        //Autenticación
        //router::auth('user_is_logged_in', true);

        //Carga la configuración
        $config = config::config();

        return controller::render('Home/index.twig', [
            'controllerName' => 'homeController',
            'controllerPath' => 'App/Controllers/homeController.php',
            'version' => $config['nimter']['version']
        ]);
    }
}
