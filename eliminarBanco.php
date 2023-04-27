<?php
 try {
    $id=$_GET['idEliminar'];
    $conn = oci_pconnect('gerente', 'unach2023', 'localhost/xepdb1', 'AL32UTF8');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
 
    $sql = 'DELETE FROM Bancos where ID=:id';
    $consulta= oci_parse($conn, $sql);
    oci_bind_by_name($consulta, ':id', $id);
    
    oci_execute($consulta);
    if ($consulta) {
        oci_close($conn);
        header('Location: index.php');
    }
    else{
        $m = oci_error($consulta);
        trigger_error('No se pudo ejecutar: '. $m['message'], E_USER_ERROR);
    }
} catch (Exception $e) {
           
 }   
 
 
?>