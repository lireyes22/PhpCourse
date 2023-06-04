<?php
    function conn(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'Ventas';
        $conection = @mysqli_connect($host, $user, $password, $db);

        if(!$conection){
            echo 'Error de conexion';
            return null;
        }
        mysqli_set_charset($conection, "utf8");
        return $conection;
    }    
    echo $cveArticulo.','.$existencias;
    $cveArticulo = $_GET['Clave'];
    $existencias = $_GET['Cantidad'];
    try {
        $conection = conn();
        $sql2 = "UPDATE Existencias SET existencia=$existencias WHERE cveArticulo='$cveArticulo'";
        if(mysqli_query($conection, $sql2)){
            echo"<script>alert('Se ah actualizado el articulo.')</script>";
            echo"<script  language='javascript'>window.location='capinv.html'</script>";
            
        }
    } catch (\Throwable $th) {
        echo"<script>alert('No se ha podido actualizar el articulo, verifica que exista.')</script>";
        echo"<script  language='javascript'>window.location='../'</script>";
    }
?>