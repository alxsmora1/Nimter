<?php
/**
 * Este archivo forma parte del Framework Nimter.
 *
 * Para más información acerca de los derechos de autor y la licencia, ver el archivo LICENSE.
 *
 * PHP versión 7.1.3
 *
 * @package Nimter\Helpers
 * @author Alexis Mora <alexis.mora1v@gmail.com>
 * @version 1.3.0
 */

namespace Nimter\Helpers;

/**
 * class Files
 *
 * Clase para manejar archivos y directorios
 */
class Files
{
	/**
	 * Function removeFiles
	 *
	 * Función que elimina los archivos de una carpeta.
	 *
	 * @param string $dir directorio del cual se eliminará todo su contenido
	 * @return void
	 **/
	public static function removeFiles(string $dir)
	{
		$files = scandir($dir);
		array_shift($files);    // remove '.' from array
		array_shift($files);    // remove '..' from array

		foreach ($files as $file) {
			$file = $dir . '/' . $file;
			if (is_dir($file)) {
				self::removeFiles($file);
				rmdir($file);
			} else {
				unlink($file);
			}
		}
		rmdir($dir);
	}

	/**
	 * Function uploadImages
	 *
	 * Función que sirve para subir imagenes el servidor
	 *
	 * @param string $dir Directorio donde se guardará la imagen
	 * @param string $inputName Nombre del input del cual proviene la imagen
	 * @param string $name Nombre que tendra la imagen
	 * @param float $sizeLimit Limite de peso de las imagenes en kb
	 * @return void
	 **/
	public static function uploadImages(string $dir, string $inputName, string $name, float $sizeLimit = 5000)
	{
		try {
			//Control de errores para la identificación
			if ($_FILES[$inputName]['name'] != '') {

				$fileSize = $_FILES[$inputName]['size'] / 1024;

				if ($sizeLimit > 0) {
					if ($fileSize > $sizeLimit) {
						throw new \Exception(2); //El Archivo supera el limite de peso
						exit;
					}
				}

				$tmp = explode('.', $_FILES[$inputName]['name']);

				$ext = end($tmp);

				$extensiones = array('jpg', 'png', 'gif', 'jpeg', 'JPG', 'PNG', 'GIF', 'JPEG');

				if (!in_array($ext, $extensiones)) {
					throw new \Exception(2); //El tipo de archivo no esta permitido
					exit;
				}

				$url = $dir . $name . '.' . $ext;

				move_uploaded_file($_FILES[$inputName]['tmp_name'], $url);
				echo 1;
			} else {
				throw new \Exception(2); //El campo esta vacio
			}
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}
}
