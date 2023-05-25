<?php
include('funciones.php');
    if(isset($_POST['btnEliminar'])) {
        $cve = $_POST['cveArticulo'];
        if (!empty($cve)) {
            eliminarRegistro($cve);
        }else {
            echo"<script>alert('Falta el cve.')</script>";
            echo"<script  language='javascript'>window.location='../'</script>";
        }
    }
    if(isset($_POST['btnActualizar'])) {
        $cveArticulo = $_POST['cveArticulo'];
        $descripcion = $_POST['descripcion'];
        $descuento = $_POST['descuento'];
        $iva = $_POST['iva'];
        $Precio = $_POST['precio'];
        $existencias = $_POST['existencia'];
        if (!empty($cveArticulo) && !empty($descripcion) && !empty($descuento) && !empty($iva) && !empty($Precio) && !empty($existencias)) {
            actualizarRegistro($cveArticulo, $descripcion, $descuento, $iva, $Precio,$existencias);
        }else {
            echo"<script>alert('No debe haber campos vacios.')</script>";
            echo"<script  language='javascript'>window.location='../'</script>";
        }
    }    
    if(isset($_POST['btnAgregar'])) {
        $cveArticulo = $_POST['cveArticulo'];
        $descripcion = $_POST['descripcion'];
        $descuento = $_POST['descuento'];
        $iva = $_POST['iva'];
        $Precio = $_POST['precio'];
        $existencias = $_POST['existencia'];
        if (!empty($cveArticulo) && !empty($descripcion) && !empty($descuento) && !empty($iva) && !empty($Precio) && !empty($existencias)) {            
            agregarRegistro($cveArticulo, $descripcion, $descuento, $iva, $Precio,$existencias);
        } else {
            echo"<script>alert('No debe haber campos vacios.')</script>";
            echo"<script  language='javascript'>window.location='../'</script>";
        }
    }  
    
?>