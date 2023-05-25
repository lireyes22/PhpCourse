<?php
include 'procesos/funciones.php';

#$consulta = "SELECT * FROM Articulos JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo";

$consulta = "SELECT *
		FROM Articulos
		JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo";
    if(isset($_POST['btnBuscar'])){
        $consulta = "SELECT * FROM Articulos JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo WHERE Articulos.cveArticulo LIKE '%". $_POST['cveArticulo']."%' 
        AND Articulos.descripcion LIKE '%". $_POST['descripcion'] . "%'
        AND Articulos.descuento LIKE '%". $_POST['descuento'] . "%'
        AND Articulos.iva LIKE '%". $_POST['iva'] . "%'
        AND Articulos.Precio LIKE '%". $_POST['Precio'] . "%'
        AND Existencias.existencia LIKE '%". $_POST['existencia'] . "%'
        ";
    }
    #echo $consulta;
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
                    <th></th>
                    <th></th>
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
            <?php }//fin del while ?>
            <form method="POST">
                <tbody>
                    <td><input type="text" name="cveArticulo" value=""></td>
                    <td><input type="text" name="descripcion" value=""></td>
                    <td><input type="text" name="descuento" value=""></td>
                    <td><input type="text" name="iva" value=""></td>
                    <td><input type="text" name="Precio" value=""></td>
                    <td><input type="text" name="existencia" value=""></td>
                    <td><input type="submit" name="btnAgregar" value="Agregar" formaction="procesos/btnAction.php"></td>
                    <td><input type="submit" name="btnBuscar" value="Search" formaction="index.php"></td>
                </tbody>
            </form>
        </table>
        <form><input type="submit" name="btnReset" value="Reset" formaction="index.php"></form>
    </div>
</body>

</html>