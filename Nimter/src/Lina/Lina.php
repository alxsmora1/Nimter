<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *
 * PHP versión 7.1.3
 *
 * @package Nimter\Lina
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.3.0
 */

namespace Nimter\Lina;

use Nimter\Lina\Utilities as util;
use Nimter\Lina\MvcGenerator as mvc;

/**
 * Class lina
 *
 * Generador de archivos por consola LINA
 */
class Lina
{
    /**
     * Function __construct
     *
     * Función del contructor usada para leer la consola de comandos
     **/
    public function __construct(array $cli)
    {
        //Metodos validos que acepta el generador de codigo LINA
        switch ($cli[1]) {
            case '--help':
                util::help();
                break;

            case '--version':
                util::version();
                break;

            case '--license':
                util::license();
                break;

            case '--clearCache':
                util::clearCache();
                break;

            case '--webserver':
                util::webserver();
                break;

            case '--deletemvc':
                mvc::deleteMvc($cli[2]);
                break;

            case 'app:m':
            case 'app:v':
            case 'app:c':
            case 'app:mv':
            case 'app:mc':
            case 'app:vc':
            case 'app:mvc':
                $this->generar($cli[1], $cli[2]);
                break;

            default:
                util::help();
                break;
        }
    }

    /**
     * Function generar
     *
     * Función que lee argumentos pasados por consola para generar archivos
     *
     * @param string $cli  Comandos de LINA
     * @param string $cli2 Nombre del archivo
     *
     * @return void
     **/
    public function generar(string $cli, string $cli2)
    {
        //Division los argumentos pasados a través del cli
        $read = explode(':', $cli);

        if ('app' != $read[0]) {
            print_r('No se reconoce el comando ' . $cli . "\n");
            print_r("El comando debe ser: app:mvc nombre\n");
            print_r('Para ver la ayuda use el comando: app.php --Help');
        } else {
            //Toma de desiciones en el parametro uno
            if (strlen($cli2) > 1) {
                if (1 === strlen($read[1]) || 2 === strlen($read[1]) || 3 === strlen($read[1])) {
                    //Modelo
                    if (false !== strpos($read[1], 'm')) {
                        mvc::createModel($cli2);
                    }

                    //Vista
                    if (false !== strpos($read[1], 'v')) {
                        mvc::createView($cli2);
                    }

                    //Controlador
                    if (false !== strpos($read[1], 'c')) {
                        mvc::createController($cli2);
                    }
                }
            } else {
                print_r("Para usar este comando primero debe asignar un nombre ej. app:mvc Hola_mundo\n");
                print_r('Para ver la ayuda use el comando: cli --Help');
            }
        }
    }
}
