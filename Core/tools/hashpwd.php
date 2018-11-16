<?php  
/**
 *  Clase para encriptar cadenas de texto.
 *  
 *  PHP versión 7.0
 *
 * @package Nimter Framework
 * @author Alexis Mora
 *  
 */

namespace Core\tools;

class hashpwd
{
	/** 
     * Function cipher
     * Cifra una cadena de texto
     * @param string $text
     * @return string -  Devuelve una cadena cifrada
     */
	public function cipher($text)
	{
		global $config;

		$sk = $config['security']['secret_key'];
		$siv = $config['security']['secret_iv'];
		$sm = $config['security']['method'];

	    $key = hash('sha256', $sk);
	    $iv = substr(hash('sha256', $siv), 0, 16);
	    $hash = openssl_encrypt($text, $sm, $key, 0, $iv);
	    $hash = base64_encode($hash);

	    return $hash;
	}

	/** 
     * Function decrypt
     * Descifra una cadena cifrada
     * @param string $hash
     * @return string -  Devuelve una cadena de texto
     */
	public function decrypt($hash)
	{
		global $config;

		$sk = $config['security']['secret_key'];
		$siv = $config['security']['secret_iv'];
		$sm = $config['security']['method'];

	    $key = hash('sha256', $sk);
	    $iv = substr(hash('sha256', $siv), 0, 16);
	    $text = openssl_decrypt(base64_decode($hash), $sm, $key, 0, $iv);

	    return $text;
	}	
}
?>