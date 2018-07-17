<?php  

/**
*  Clase para encriptar cadenas de texto.
*  
*  PHP versión 7.0
*
*  @package security
*  @version 1.1.0
*  
*/

namespace Core\security;

class hashpwd
{
	protected $sk;		#String SEC["SECRET_KEY"]
	protected $siv;		#String SEC["SECRET_IV"]
	protected $sm;		#String SEC["METHOD"]

	#Función publica para encriptar datos.
	public function encrypt($string)
	{
		global $config;

		$this->sk = $config['security']['secret_key'];
		$this->siv = $config['security']['secret_iv'];
		$this->sm = $config['security']['method'];

	    $output = FALSE;
	    $key = hash('sha256', $this->sk);
	    $iv = substr(hash('sha256', $this->siv), 0, 16);

	    $output = openssl_encrypt($string, $this->sm, $key, 0, $iv);
	    $output = base64_encode($output);

	    return $output;
	}

	#Función Protegida para desencriptar datos.
	protected function decrypt($string)
	{
	    $key = hash('sha256', $this->sk);
	    $iv = substr(hash('sha256', $this->siv), 0, 16);

	    $output = openssl_decrypt(base64_decode($string), $this->sm, $key, 0, $iv);
	    return $output;
	}	
}
?>