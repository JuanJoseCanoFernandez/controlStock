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
    <h1>Formularios tienda de moviles</h1>


<a href="#victorModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Nuevo usuario</a>
<div id="victorModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            	<form action="formulario.php" method="post" enctype="multipart/form-data">
					<label><strong>Nombre:</strong></label><br>
					<input type="text" name="nombre"><br><br>

					<label><strong>Contraseña:</strong></label><br>
					<input type="password" name="contraseña"><br><br>

					<label><strong>Interés:</strong></label><br>
					<select name="select">
						<option value="value1">Value 1</option> 
						<option value="value2" selected>Value 2</option>
						<option value="value3">Value 3</option>
					</select><br><br>

					<label><strong>E-Mail:</strong></label><br>
					<input type="text" name="email"><br><br>

					<input type="submit" name="enviar"  class="btn btn-primary" data-dismiss="modal">
            	</form>
            </div>
        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>