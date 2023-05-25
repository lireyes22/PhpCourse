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
    function consultaRet($consulta) {
        $conection = conn();
        $query = mysqli_query($conection, $consulta);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function eliminarRegistro($cveArticulo) {
        $conection = conn();
        $sql2 = "DELETE FROM Existencias WHERE cveArticulo = '$cveArticulo'";
        $query2 = mysqli_query($conection, $sql2);
        if (!$query2) {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conection);
        } else {
            $sql = "DELETE FROM Articulos WHERE cveArticulo = '$cveArticulo'";
            $query = mysqli_query($conection, $sql);
            if (!$query) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conection);
            } else {
                echo"<script>alert('Se ah eliminado el articulo.')</script>";
                echo"<script  language='javascript'>window.location='../'</script>";  
            }
        }
    }
    function actualizarRegistro($cveArticulo,$descripcion,$descuento,$iva,$precio,$existencias) {
        $conection = conn();
        $sql = "UPDATE Articulos SET descripcion='$descripcion', descuento='$descuento', iva='$iva', Precio='$precio' WHERE cveArticulo='$cveArticulo'";
        echo $sql.'<br>';
        if(mysqli_query($conection, $sql)){
            $sql2 = "UPDATE Existencias SET existencia=$existencias WHERE cveArticulo='$cveArticulo'";
            
            if(mysqli_query($conection, $sql2)){
                echo"<script>alert('Se ah actualizado el articulo.')</script>";
                echo"<script  language='javascript'>window.location='../'</script>";
                
            }
        }
        echo 'error';
    }
    function agregarRegistro($cveArticulo,$descripcion,$descuento,$iva,$precio,$existencias) {
        $conection = conn();
        $sql = "INSERT INTO Articulos (cveArticulo, descripcion, descuento, iva, Precio) VALUES('$cveArticulo', '$descripcion', '$descuento', '$iva', '$precio')";
        echo $sql.'<br>';
        if(mysqli_query($conection, $sql)){
            $sql2 = "INSERT INTO Existencias (cveArticulo, existencia) VALUES ('$cveArticulo', $existencias)";
            echo $sql2.'<br>';
            if(mysqli_query($conection, $sql2)){
                echo"<script>alert('Se ah agregado el articulo.')</script>";
                echo"<script  language='javascript'>window.location='../'</script>";
                
            } 
        }
    }
?>