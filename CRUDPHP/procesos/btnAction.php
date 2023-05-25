<?php
include('funciones.php');
    if(isset($_POST['btnEliminar'])) {
        $cve = $_POST['cveArticulo'];
        eliminarRegistro($cve);
    }
    if(isset($_POST['btnActualizar'])) {
        $cveArticulo = $_POST['cveArticulo'];
        $descripcion = $_POST['descripcion'];
        $descuento = $_POST['descuento'];
        $iva = $_POST['iva'];
        $Precio = $_POST['Precio'];
        $existencias = $_POST['existencia'];
        
        actualizarRegistro($cveArticulo, $descripcion, $descuento, $iva, $Precio,$existencias);
    }    


?>