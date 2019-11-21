<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Tienda moviles</title>
    <?php include 'conexion.php'; ?>
  </head>
  <body>
    <?php
        $instance = Conexion::getInstance();
        $conn = $instance->getConnection();
        //var_dump($conn);

    ?>
    <h1>Formularios STOCK de tienda de moviles</h1>
    <br><br><br>
    <div class="container no-gutters">
        <div class="row align-items-end">
            <div class="col">
                <a href="#nuevoUsuario" role="button" class="btn btn-large btn-primary align-items-start" data-toggle="modal">Nuevo usuario</a>
            </div>
     

            <div class="col">
                <a href="#nuevoProducto" role="button" class="btn btn-large btn-success align-items-start" data-toggle="modal">Nuevo producto</a>
            </div>
            <div class="col"></div> 
        </div>
    </div>


    <!-- POP UP USUARIO ( class="modal fade")-->
    <div id="nuevoUsuario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Nuevo USUARIO</h4>
                </div>
                <div class="modal-body">
                	<form action="index.php" method="post" enctype="multipart/form-data">
    					<label><strong>Nombre:</strong></label><br>
    					<input type="text" name="nombre"><br><br>

    					<label><strong>Interés:</strong></label><br>
    					<select name="interes">
                        <?php
                            $instance->listarProducto();
                        ?>
    					</select><br><br>

    					<label><strong>E-Mail:</strong></label><br>
    					<input type="text" name="email"><br><br>

    					<input type="submit" name="enviarUsuario"  class="btn btn-primary" data-dismiss="modal">
                	</form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["enviarUsuario"])) {
        $nombre = $_POST["nombre"];
        $interes = $_POST["interes"];
        $email = $_POST["email"];
 
        $nuevoUsuario = "INSERT INTO usuarios (nusuario,email,interes) values ('$nombre','$email','$interes')";
        $result = $conn->query($nuevoUsuario);
    }
    ?>

    <!-- POP UP PRODUCTO -->
    <div id="nuevoProducto" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Nuevo PRODUCTO</h4>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <label><strong>Marca:</strong></label><br>
                        <input type="text" name="marca"><br><br>

                        <label><strong>Modelo:</strong></label><br>
                        <input type="text" name="modelo"><br><br>

                         <label><strong>Precio:</strong></label><br>
                        <input type="number" name="precio"><br><br>

                        <label><strong>Tipo:</strong></label><br>
                        <select name="tipo">
                            <option value="movil">Móvil</option> 
                            <option value="ordenador" selected>Ordenador</option>
                            <option value="tablet">Tablet</option>
                        </select><br><br>

                        <input type="submit" name="enviarProducto"  class="btn btn-success" data-dismiss="modal">
                    </form>

                </div>
            </div>
        </div>
    </div>


    <?php
    /*$listarProducto = "SELECT idProductos,tipo,marca,modelo from productos";
    foreach ($conn->query($listarProducto) as $row) {
        print $row['idProductos'].' '.$row['tipo'].' '.$row['marca'].' '.$row['modelo'].'<br>';
    }
    */
    if (isset($_POST["enviarProducto"])) {
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $precio = $_POST["precio"];
        $tipo = $_POST["tipo"];
 
        $nuevoProducto = "INSERT INTO productos (tipo,marca,modelo,precio) values ('$tipo','$marca','$modelo','$precio')";
        $result = $conn->query($nuevoProducto);
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>