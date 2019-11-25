<?php
class Usuario{
	
	private $nombre;
	private $interes;
	private $emailUsuario;

	public function __construct($nombre,$interes,$email)
	{
		$this->nombre=$nombre;
		$this->interes=$interes;
		$this->emailUsuario=$email;
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
}
?>