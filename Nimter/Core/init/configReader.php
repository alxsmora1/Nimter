<?php
/**
 * Lee la configuración del framework
 *    
 * PHP versión 7.1.3
 *
 * @package Nimter Framework
 * @author Alexis Mora
 * @version 1.2.0
 * 
 **/

namespace Nimter\Core\init;

use Symfony\Component\Yaml\Yaml;

class configReader
{
    /**
     * Function config
     *
     * Función que lee la configuración
     *
     * @return array $config - configuración del framework
     **/
    public static function config()
    {
        //Obtenemos la configuración de Nimter
        $config = Yaml::parse(file_get_contents('Nimter\Core\init\Nimter.yml'));
        return $config;
    }
}
?>