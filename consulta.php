<?php
// Conecta al servicio XE (esto es, una base de datos) en el servidor "localhost"
    $conn = oci_pconnect('gerente', 'unach2023', 'localhost/xepdb1', 'AL32UTF8');
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
        echo "</tr>\n";
        }
       echo "</table>\n";
?>