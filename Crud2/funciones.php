<?php
    function conn(){
        $host = 'mapachitos.cisuktad1m53.us-east-2.rds.amazonaws.com';
        $user = 'admin';
        $password = 'mapachitos123';
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
    function eliminarRegistro($id) {
        $conection = conn();
        return mysqli_query($conection, "DELETE FROM Articulos WHERE cveArticulo = '$id'");
    }
    function insertarRegistro($cveArticulo,$descripcion,$descuento,$iva,$precio) {
        $conection = conn();
        return mysqli_query($conection, "INSERT INTO Articulos (cveArticulo, descripcion, descuento, iva, Precio) VALUES ('$cveArticulo', '$descripcion', $descuento, $iva, $precio)");
    }
    function actualizarRegistro($cveArticulo,$descripcion,$descuento,$iva,$precio) {
        $conection = conn();
        return mysqli_query($conection, "UPDATE Articulos SET descripcion='$descripcion', descuento='$descuento', iva='$iva', Precio='$precio' WHERE cveArticulo='$cveArticulo'");
    }
?>