<?php
/**
 *  Controlador home
 *  
 *  @package Controllers
 *  @author Alexis Mora
 *           
 **/

namespace App\Controllers;

use Nimter\Core\controllers\controllers AS controller;
use Nimter\Core\init\configReader AS config;

class homeController
{
    /**
     * Function index
     *
     * Función index para el controlador home
     **/
    public function index()
    {	
        $con = config::config(); 
        //Parametros pasados a la vista
        $params = array(
            'controllerName' => 'homeController',
            'controllerPath' => 'App/Controllers/homeController.php',
            'version' => $con['nimter']['version']    
        );

        controller::render('Home/index.twig', $params);
    }
}
?>