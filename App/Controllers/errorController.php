<?php
/**
 *  Controlador error
 *  
 *  @package Controllers
 *  @author 
 **/

namespace App\Controllers;

use Nimter\Core\controllers\controllers;

class errorController
{
    /**
     * Function index
     *
     * Función index para el controlador de errores
     **/
    public function index()
    {
        //Parametros pasados a la vista
        $params = array(
            'controllerName' => 'errorController',
            'controllerPath' => 'App/Controllers/errorController.php',
        );

        echo controllers::render('Error/index.twig', $params);
    }
}
 