<?php
require_once 'producto.php';

class Tablet extends Producto{

	public function __construct($tipo,$marca,$modelo,$precio,$idProducto)
	{
		parent::__construct($tipo);
		parent::__construct($marca);
		parent::__construct($modelo);
		parent::__construct($precio);
		parent::__construct($idProducto);
	}
}
?>