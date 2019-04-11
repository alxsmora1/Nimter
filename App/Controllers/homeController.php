<?php
/**
 *  Controlador home
 *  
 *  @package Controllers
 *  @author 
 **/

namespace App\Controllers;

use Nimter\Core\Controllers\Controllers as controller;
use Nimter\Core\Init\ConfigReader as config;
use Nimter\Core\Router\Router;

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
        //Router::auth(['user_is_logged_in' => true]);

        //Carga la configuración
        $config = config::config();

        return controller::render('Home/index.twig', [
            'controllerName' => 'homeController',
            'controllerPath' => 'App/Controllers/homeController.php',
            'version' => $config['nimter']['version']
        ]);
    }
}
