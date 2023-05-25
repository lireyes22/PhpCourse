<?php
include 'procesos/funciones.php';

#$consulta = "SELECT * FROM Articulos JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo";

$consulta = "SELECT *
		FROM Articulos
		JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo";
if (isset($_POST['btnBuscar'])) {
    $consulta = "SELECT * FROM Articulos JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo WHERE Articulos.cveArticulo LIKE '%" . $_POST['cveArticulo'] . "%' 
        AND Articulos.descripcion LIKE '%" . $_POST['descripcion'] . "%'
        AND Articulos.descuento LIKE '%" . $_POST['descuento'] . "%'
        AND Articulos.iva LIKE '%" . $_POST['iva'] . "%'
        AND Articulos.precio LIKE '%" . $_POST['precio'] . "%'
        AND Existencias.existencia LIKE '%" . $_POST['existencia'] . "%'
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
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>

<body>
    <div class="divxd">
        <table>
            <thead>
                <tr>
                    <th>Clave del Articulo</th>
                    <th>Descripcion</th>
                    <th>Descuento</th>
                    <th>Iva</th>
                    <th>precio</th>
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
                    <input type="hidden" name="cveArticulo" value="<?php echo $consulta['cveArticulo']; ?>">
                    <tbody>
                        <td><input type="text" name="cveArticulo" value="<?php echo $consulta['cveArticulo']; ?>" class="text-input" readonly></td>
                        <td><input type="text" name="descripcion" value="<?php echo $consulta['descripcion']; ?>" class="text-input" readonly></td>
                        <td><input type="text" name="descuento" value="<?php echo $consulta['descuento']; ?>" class="text-input" readonly></td>
                        <td><input type="text" name="iva" value="<?php echo $consulta['iva']; ?>" class="text-input" readonly></td>
                        <td><input type="text" name="precio" value="<?php echo $consulta['precio']; ?>" class="text-input" readonly></td>
                        <td><input type="text" name="existencia" value="<?php echo $consulta['existencia']; ?>" class="text-input" readonly></td>
                        <td><button type="submit" name="btnEliminar" value="Eliminar" formaction="procesos/btnAction.php">
                            <img src="img/basura.png" alt="Icono"></button></td>
                        <td><button type="submit" name="btnEditar" formaction="formulario.php">
                            <img src="img/editar.png" alt="Icono"></button></td>
                        <td><button type="submit" name="btnVisualizar" formaction="formularioV.php">
                            <img src="img/ojo.png" alt="Icono"></button></td>
                    </tbody>
                </form>
            <?php } //fin del while 
            ?>
            <form method="POST">
                <tbody>
                    <td><input type="text" name="cveArticulo" value="" class="text-input"></td>
                    <td><input type="text" name="descripcion" value="" class="text-input"></td>
                    <td><input type="text" name="descuento" value="" class="text-input"></td>
                    <td><input type="text" name="iva" value="" class="text-input"></td>
                    <td><input type="text" name="precio" value="" class="text-input"></td>
                    <td><input type="text" name="existencia" value="" class="text-input"></td>
                    <td><button type="submit" name="btnAgregar" formaction="procesos/btnAction.php" class="submit-button">
                        <img src="img/agregar-archivo.png" alt="Icono"></button></td>
                    <td><button type="submit" name="btnBuscar" formaction="index.php" class="submit-button">
                        <img src="img/buscar.png" alt="Icono"></button></td>
                    <td><button type="submit" formaction="index.php" class="submit-button">
                        <img src="img/cargando.png" alt="Icono"></button></td>
                </tbody>
            </form>
        </table>
    </div>
    <form></form>
</body>

</html>