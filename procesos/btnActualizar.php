<?php
    require '../funciones.php';

    $cveArticulo = $_POST['cveArticulo'];
    $descripcion = $_POST['descripcion'];
    $descuento = $_POST['descuento'];
    $iva = $_POST['iva'];
    $precio = $_POST['Precio'];

    if(actualizarRegistro($cveArticulo, $descripcion, $descuento, $iva, $precio)){
        header('location: .. /tabla.php');
    }


?>