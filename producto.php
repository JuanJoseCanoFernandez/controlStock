<?php
class Producto{

	private $tipo;
	private $marca;
	private $modelo;
	private $precio;
	private $cantidad=0;
	private $idProducto;

	public function __construct($tipo,$marca,$modelo,$precio)
	{
		$this->tipo=$tipo;
		$this->marca=$marca;
		$this->modelo=$modelo;
		$this->precio=$precio;
		
	}
}
?>