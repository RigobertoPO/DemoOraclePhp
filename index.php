﻿<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Conectar PHP y Oracle Database</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function eliminar_id(id){
            if(confirm('¿Realmente quieres eliminar?')){
                window.location.href='eliminarBanco.php?idEliminar='+id;
            }
        }
        function editar_id(id){
            if(confirm('¿Realmente quieres editar?')){
                window.location.href='editarBanco.php?idEditar='+id;
            }
        }      
    </script>
  </head>
  <body>
    <div class="container">

      <h1>Conectar PHP y Oracle Database</h1>
      <div  class="row">
          <a href="nuevo.php" class="btn btn-primary">Nuevo</a>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php include("consulta.php"); ?>
        </div> 
      </div> 
    </div>    
  </body>
</html>