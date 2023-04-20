<?php
    include '../funciones.php';
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];
    $columnaId = $_GET['campo'];
    if(eliminarRegistro($id, $tabla,$columnaId)){
        header("Location: ../tabla.php");
    }
?>