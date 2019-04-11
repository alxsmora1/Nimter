<?php
/**
 *  Controlador error
 *  
 *  @package Controllers
 *  @author 
 **/

namespace App\Controllers;

use Nimter\Core\Controllers\Controllers;

class errorController
{
    /**
     * Function index
     *
     * Función index para el controlador de errores
     **/
    public function index()
    {
        return controllers::render('Error/index.twig', [
            'controllerName' => 'errorController',
            'controllerPath' => 'App/Controllers/errorController.php'
        ]);
    }
}
