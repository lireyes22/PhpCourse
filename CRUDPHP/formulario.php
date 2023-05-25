<?php
    include('procesos/funciones.php');
    $cve = $_POST['cveArticulo'];
    $sql = "SELECT *
    FROM Articulos
    JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo WHERE Articulos.cveArticulo = '$cve'";

    $consulta = mysqli_fetch_array(consultaRet($sql));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>

<body>
    <a href="index.php">Regresar</a>
    <div>
        <label>Articulo</label>
        <form method="POST">
            <table>
                <tr>
                    <td><label>Cve del Articulo:</label></td>
                    <td><input type="text" name="cveArticulo" value="<?php echo $consulta['cveArticulo']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label>Descripcion:</label></td>
                    <td><input type="text" name="descripcion" value="<?php echo $consulta['descripcion']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Descuento:</label></td>
                    <td><input type="text" name="descuento" value="<?php echo $consulta['descuento']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Iva:</label></td>
                    <td><input type="text" name="iva" value="<?php echo $consulta['iva']; ?>"></td></tr>
                <tr>
                    <td><label>Precio:</label></td>
                    <td><input type="text" name="Precio" value="<?php echo $consulta['Precio']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Existencia:</label></td>
                    <td><input type="text" name="existencia" value="<?php echo $consulta['existencia']; ?>"></td>
                </tr>            
            </table>
            <button type="submit" name="btnEliminar" value="Eliminar" formaction="procesos/btnAction.php" class="text-input">
                <img src="img/basura.png" alt="Icono"></button>
            <button type="submit" value="Actualizar" name="btnActualizar" formaction="procesos/btnAction.php" class="text-input">
                <img src="img/actualizar.png" alt="Icono"></button>
        </form>
    </div>
</body>

</html>
