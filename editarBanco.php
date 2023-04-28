<?php
    $idBanco=$_GET['idEditar'];
    if(isset($_GET['idEditar'])){
        include 'conexion.php';
        $conn = oci_pconnect($usuarioBD,$passwordBD,$hostBD, 'AL32UTF8');
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    
        $sql = 'SELECT * FROM Bancos where ID=:id';
        $consulta= oci_parse($conn, $sql);
        oci_bind_by_name($consulta, ':id', $idBanco);
        
        oci_execute($consulta);
        while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) {
            $nombre=$row['NOMBRE'];
            }
    }
    else{
        header("Location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Editar Banco</h1>
        <div  class="row">
            <div class="col-md-12">
                <form action="modificarBanco.php" method="post">
                        <div class="mb-3">
                            <label for="idLabel" class="form-label">ID</label>
                            <input type="number" class="form-control" name="idInput" placeholder="Id" value="<?php echo $idBanco?>" readonly="true">
                        </div>
                        <div class="mb-3">
                            <label for="nombreLabel" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombreInput" placeholder="nombre del banco" value="<?php echo $nombre ?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        <hr>
        <div  class="row">
           <div class="col-md-12">
                <a href="index.php" class="btn btn-danger">Regresar</a>
            </div>
        </div>
    </div>
</body>


</html>