<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *  
 * PHP versión 7.1.3
 *
 * @package Nimter\Core\router
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.2.0
 */

namespace Nimter\Core\Init;

use Symfony\Component\Yaml\Yaml;

/**
 * Class configReader
 * 
 * Clase para leer la configuración del framework en YAML
 */
class ConfigReader
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
        $config = Yaml::parse(file_get_contents('Nimter/Core/init/Nimter.yml'));
        return $config;
    }
}
