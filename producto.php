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
	public function nuevoProducto()
	{
		$instance = Conexion::getInstance();
        $conn = $instance->getConnection();
        $tipo = $_POST["tipo"];
		$marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $precio = $_POST["precio"];
        $instance = "INSERT INTO productos (tipo,marca,modelo,precio,tienda_idTienda) values ('$tipo','$marca','$modelo','$precio',1)";
        $result = $conn->prepare($instance);
        $result->execute();
        $datos=$result->fetchAll();
	}

	public function listarProducto()
	{
		$instance = Conexion::getInstance();
        $conn = $instance->getConnection();
		$instance = "SELECT idProductos,tipo,marca,modelo from productos";
        $result = $conn->prepare($instance);
        $result->execute();
        $datos=$result->fetchAll();
		foreach ($datos as $row) {
            print "<option value='".$row['idProductos']."'>".$row['tipo'].' '.$row['marca'].' '.$row['modelo']."</option>";
        }
	}

	public function cambioStock()
	{
		$instance = Conexion::getInstance();
        $conn = $instance->getConnection();
        $stock = $_POST["stock"];
        $interes = $_POST["interes"];
        $instance = "UPDATE productos SET stock = '$stock' where idProductos='$interes'";
        $result = $conn->prepare($instance);
        $result->execute();
        $datos=$result->fetchAll();
	}

	public function comprobarStock()
	{
		$instance = Conexion::getInstance();
        $conn = $instance->getConnection(); 
        $instance = "SELECT stock from productos where idProductos=(select interes from usuarios where nusuario='gato')";
        $result = $conn->prepare($instance);
        $result->execute();
        $datos=$result->fetchAll();
        foreach ($datos as $row) {
            print $row['stock'].'<br>';
        }

        if (@$row['stock'] > 0 ) {
        	$articulo = new Articulo(new \SplObjectStorage());
    		$articulo->attach(new Notify());
    		$articulo->siStock();
        }
        else{
        	$articulo = new Articulo(new \SplObjectStorage());
    		$articulo->attach(new Notify());
    		$articulo->noStock();
        }
	}
}
?>