<?php
    require '../funciones.php';
    
    $cveArticulo = $_POST['cveArticulo'];
    $descripcion = $_POST['descripcion'];
    $descuento = $_POST['descuento'];
    $iva = $_POST['iva'];
    $Precio = $_POST['Precio'];

    if(insertarRegistro($cveArticulo, $descripcion, $descuento, $iva, $Precio)){
        header('location: ../tabla.php');
    }
?>
