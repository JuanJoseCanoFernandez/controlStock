<?php
// Singleton to connect db.
class Conexion {
	// Hold the class instance.
	private static $instance = null;
	private $conn;
	private $host = 'localhost';
	private $user = 'adminTienda';
	private $pass = 'adminTienda';
	private $name = 'bdtienda';
	  
	// The db connection is established in the private constructor.
	private function __construct()
	{
		$this->conn = new PDO("mysql:host={$this->host};
		dbname={$this->name}", $this->user,$this->pass,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	}
	  
	public static function getInstance()
	{
	    if(!self::$instance)
	    {
	    	self::$instance = new Conexion();
	    }
	    return self::$instance;
	}
	  
	public function getConnection()
	{
	    return $this->conn;
	}

	public function nuevoUsuario()
	{
		$instance = Conexion::getInstance();
        $conn = $instance->getConnection();
        $nombre = $_POST["nombre"];
        $interes = $_POST["interes"];
        $email = $_POST["email"];
        $instance = "INSERT INTO usuarios (nusuario,email,interes) values ('$nombre','$email','$interes')";
        $result = $conn->prepare($instance);
        $result->execute();
        $datos=$result->fetchAll();
	}

	public function nuevoProducto()
	{
		$instance = Conexion::getInstance();
        $conn = $instance->getConnection();
		$marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $precio = $_POST["precio"];
        $tipo = $_POST["tipo"];
        $instance = "INSERT INTO productos (tipo,marca,modelo,precio) values ('$tipo','$marca','$modelo','$precio')";
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

	public function comprobarStock()
	{
		$instance = Conexion::getInstance();
        $conn = $instance->getConnection(); 
        $instance = "SELECT stock from productos where idProductos=(select interes from usuarios where nusuario='prueba')";
        $result = $conn->prepare($instance);
        $result->execute();
        $datos=$result->fetchAll();
        foreach ($datos as $row) {
            print $row['stock'].'<br>';
        }

        if ($row['stock'] <= 0 ) {
        	echo "No enviar";
        }
        else{
        	echo "Enviar correo";
        }
	}
}
?>