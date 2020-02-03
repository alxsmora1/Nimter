<?php
/**
 *  Controlador home
 *
 *  @package Controllers
 *  @author
 **/

namespace App\Controllers;

use Nimter\Controllers\Controllers;
use Nimter\Router\Router;

class HomeController
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

        return Controllers::render('Home/index.twig', [
            'controllerName' => 'homeController',
            'controllerPath' => 'App/Controllers/homeController.php',
            'version' => getenv('APP_VERSION')
        ]);
    }
}
