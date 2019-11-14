<?php
abstract class Producto{

	protected $tipo;
	protected $marca;
	protected $modelo;
	protected $precio;
	protected $cantidad=0;
	protected $idProducto;

	public function __construct($tipo,$marca,$modelo,$precio,$idProducto)
	{
		$this->tipo=$tipo;
		$this->marca=$marca;
		$this->modelo=$modelo;
		$this->precio=$precio;
		$this->idProducto=$idProducto;
	}
}
?>