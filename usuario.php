<?php
class Usuario{
	
	private $nombre;
	private $contraseña;
	private $interes;
	private $emailUsuario;

	public function __construct($nombre,$contraseña,$interes,$email)
	{
		$this->nombre=$nombre;
		$this->contraseña=$contraseña;
		$this->interes=$interes;
		$this->emailUsuario=$email;
	}
}
?>