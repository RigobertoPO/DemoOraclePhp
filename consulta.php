<?php
// Conecta al servicio XE (esto es, una base de datos) en el servidor "localhost
    include 'conexion.php';
    //$conn = oci_pconnect('gerente', 'unach2023', 'localhost/xepdb1', 'AL32UTF8');
    $conn = oci_pconnect($usuarioBD,$passwordBD,$hostBD, 'AL32UTF8');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
 
    $consulta = oci_parse($conn, 'SELECT * FROM Bancos ORDER BY Id ASC');
    oci_execute($consulta);
 
        echo "<table class='table table-striped'>\n";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Detalles</th>";
        echo "</tr>";
        echo "</thead>";
    while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>\n";
        echo "<th>".$row['ID']."</th>";
        echo "<th>".$row['NOMBRE']."</th>";
        echo'<td>
        <a href="javascript:eliminar_id('. $row['ID'].')">Eliminar</a>
        <a href="javascript:editar_id('. $row['ID'] .')">Modificar</a>
        </td>';
        echo "</tr>\n";
        }
       echo "</table>\n";
?>