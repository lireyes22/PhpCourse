<?php
include 'procesos/funciones.php';

$consulta = "SELECT *
    FROM Articulos
    JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo";
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
    <div>
        <table>
            <thead>
                <tr>
                    <th>Clave del Articulo</th>
                    <th>Descripcion</th>
                    <th>Descuento</th>
                    <th>Iva</th>
                    <th>Precio</th>
                    <th>Existencia</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <!-- INICIO DE PHP -->
            <?php
            $query = consultaRet($consulta);
            while ($consulta = mysqli_fetch_array($query)) {
            ?>
                <!-- FIN DE PHP -->
                <form method="POST">
                    <input type="hidden" name="cveArticulo" value="<?php echo $consulta['cveArticulo']; ?>">
                    <tbody>
                        <td><input type="text" name="cveArticulo" value="<?php echo $consulta['cveArticulo']; ?>" readonly></td>
                        <td><input type="text" name="descripcion" value="<?php echo $consulta['descripcion']; ?>" readonly></td>
                        <td><input type="text" name="descuento" value="<?php echo $consulta['descuento']; ?>" readonly></td>
                        <td><input type="text" name="iva" value="<?php echo $consulta['iva']; ?>" readonly></td>
                        <td><input type="text" name="Precio" value="<?php echo $consulta['Precio']; ?>" readonly></td>
                        <td><input type="text" name="existencia" value="<?php echo $consulta['existencia']; ?>" readonly></td>
                        <td><input type="submit" name="btnEliminar" value="Eliminar" formaction="procesos/btnAction.php"></td>
                        <td><input type="submit" name="btnEditar" value="Editar" formaction="formulario.php"></td>
                    </tbody>
                </form>
            <?php } //fin del while 
            ?>
        </table>
    </div>
</body>

</html>