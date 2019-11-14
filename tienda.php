<?php
class Tienda{

	private $nombre;
	private $productos=array();
	private $usuarios=array();
	private $emailTienda;

	public function __construct($nombre,$email)
	{
		$this->nombre=$nombre;
		$this->emailTienda=$email;
	}
}
?>