<?php
    require '../funciones.php';
    

    if(eliminarRegistro($_POST['cveArticulo'])){
        header('location: ../tabla.php');
    }


?>
