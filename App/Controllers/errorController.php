<?php
/**
 *  Controlador error
 *
 *  @package Controllers
 *  @author
 **/

namespace App\Controllers;

use Nimter\Controllers\Controllers;

class errorController
{
    /**
     * Function index
     *
     * Función index para el controlador de errores
     **/
    public function error404()
    {
        return controllers::render('Error/404.twig', [
            'controllerName' => 'errorController',
            'controllerPath' => 'App/Controllers/errorController.php'
        ]);
    }
}
