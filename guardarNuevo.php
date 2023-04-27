<?php
    $id=$_POST['idInput'];
    $nombre=$_POST['nombreInput'];
    include 'conexion.php';
    $conn = oci_pconnect($usuarioBD,$passwordBD,$hostBD, 'AL32UTF8');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
 
    $sql = 'INSERT INTO Bancos (ID,NOMBRE) VALUES(:id,:nombre)';
    $consulta= oci_parse($conn, $sql);
    oci_bind_by_name($consulta, ':id', $id);
    oci_bind_by_name($consulta, ':nombre', $nombre);
    oci_execute($consulta);
    if ($consulta) {
        oci_close($conn);
        header('Location: index.php');
    }
    else{
        $m = oci_error($consulta);
        trigger_error('No se pudo ejecutar: '. $m['message'], E_USER_ERROR);
    }
?>