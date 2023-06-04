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
    $consulta = "SELECT Articulos.cveArticulo, Articulos.descripcion, Existencias.existencia FROM Articulos JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo ORDER BY Articulos.cveArticulo";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Clave del Articulo</th>
                <th>Descripcion</th>
                <th>Existencia</th>
            </tr>
        </thead>
        <!-- INICIO DE PHP -->
        <?php
        $query = consultaRet($consulta);
        while ($consulta = mysqli_fetch_array($query)) {
        ?>
            <!-- FIN DE PHP -->
            <form method="POST">
                <tbody>
                    <td><input type="text" name="cveArticulo" value="<?php echo $consulta['cveArticulo']; ?>" class="text-input" readonly></td>
                    <td><input type="text" name="descripcion" value="<?php echo $consulta['descripcion']; ?>" class="text-input"></td>
                    <td><input type="number" min ="0" name="existencia" value="<?php echo $consulta['existencia']; ?>" class="text-input"></td>
                </tbody>
            </form>
        <?php } //fin del while 
        ?>
    </table>
    <form><button formaction="capinv.html">regresar</button></form>
</body>
</html>