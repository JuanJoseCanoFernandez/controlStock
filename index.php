<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Tienda moviles</title>
    <?php
        include 'conexion.php';
        include 'observador.php';
        include 'producto.php';
        include 'usuario.php';
    ?>
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
                <a href="#nuevoUsuario" role="button" class="btn btn-large btn-primary align-items-start" data-toggle="modal" data-target="#nuevoUsuario">Nuevo usuario</a>
            </div>
     

            <div class="col">
                <a href="#nuevoProducto" role="button" class="btn btn-large btn-success align-items-start" data-toggle="modal" data-target="#nuevoProducto">Nuevo producto</a>
            </div>


            <div class="col">
                <a href="#cambioStock" role="button" class="btn btn-large btn-danger align-items-start" data-toggle="modal" data-target="#cambioStock">Cambio stock</a>
            </div>
        </div>
    </div>


    <!-- POP UP USUARIO ( class="modal fade")-->
    <div id="nuevoUsuario" class="modal fade">
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
                            Producto::listarProducto();
                        ?>
                        </select><br><br>

                        <label><strong>E-Mail:</strong></label><br>
                        <input type="text" name="email"><br><br>

                        <input type="submit" name="enviarUsuario"  class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["enviarUsuario"])) {
        Usuario::nuevoUsuario();
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

                        <input type="submit" name="enviarProducto"  class="btn btn-success">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["enviarProducto"])) {
        Producto::nuevoProducto();
    }
    ?>

    <!-- POP UP CAMBIO STOCK -->
    <div id="cambioStock" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white">Cambio STOCK</h4>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <label><strong>Producto:</strong></label><br>
                        <select name="interes">
                        <?php
                            Producto::listarProducto();
                        ?>
                        </select><br><br>

                        <label><strong>Nuevo stock:</strong></label><br>
                        <input type="number" name="stock"><br><br>

                        <input type="submit" name="enviarStock"  class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['enviarStock'])) {
        Producto::cambioStock();
        Producto::comprobarStock();
    }

    
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>