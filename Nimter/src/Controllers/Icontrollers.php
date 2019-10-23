<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *
 * PHP versión 7.1.3
 *
 * @package Nimter\Controllers
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.3.0
 */

namespace Nimter\Controllers;

/**
 * Class IControllers
 *
 * Interfaz de la clase Controlllers
 */
interface IControllers
{
    public function __construct();
    public function execute();
    public static function render(string $view, array $params = array());
    public function error404();
}
