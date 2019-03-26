<?php
/**
 * Clase para mantener las sesiones del navegador
 *  
 * PHP versión 7.1.3
 *
 * @package Nimter Framework
 * @author Alexis Mora
 * @version 1.2.0
 * 
 **/

namespace Nimter\Core\helpers;

class sessions
{
   /**
    * Function session_init
    *
    * Función estatica que inicializa la sesión
    *
    * @return void
    **/
   public static function session_init()
   {
      if ( session_id() == '' ) 
      {
         global $config;

         //Nombre de la session
         session_name($config['session']['name']);

         //Establece la duracion de las cookies e inicializa las sesiones del navegador
         session_set_cookie_params($config['session']['lifetime']);
         ini_set('session.gc_maxlifetime', $config['session']['lifetime']);
         session_start(['cookie_lifetime' => $config['session']['lifetime'], ]);
      }
   }

   /**
    * Function set
    *
    * Función que crea una variable de sesión
    *
    * @param string $name - Nombre de la variable de sesión
    * @param $value - Valor de la variable de sesión
    * @return void
    **/
   public static function set( string $name, $value )
   {
      $_SESSION[$name] = $value;
   }

   /**
    * Function get
    *
    * Función que obtiene la varaiables de sesión
    *
    * @param string $name - Nombre de la variable de sesión
    * @return void
    **/
   public static function get( string $name )
   {
      if ( isset($_SESSION[$name]) )
      {
         return $_SESSION[$name];
      }
      else
      {
         return null;
      }
   }

   /**
    * Function delete
    *
    * Función que eleimina una varaible de sesión
    *
    * @param string $name - Nombre de la variable de sesión
    * @return void
    **/
   public static function delete( string $name )
   {
      if ( isset( $_SESSION[$name]) )
      {
         unset($_SESSION[$name]);
      }
   }

   /**
    * Function destroy
    *
    * Función que elimina el arreglo de sesión y destruye la sesión
    *
    * @return type
    **/
   public static function destroy()
   {
      session_destroy();
      unset($_SESSION);
   }
}
?>