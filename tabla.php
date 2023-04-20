<?php ?>
<?php 
    include 'funciones.php';
    
    $consulta = "SELECT * FROM articulos";
    if(isset($_POST['Buscar'])){
        $consulta = "SELECT * FROM articulos WHERE cveArticulo LIKE '%". $_POST['cveArticulo']."%' 
        AND descripcion LIKE '%". $_POST['descripcion'] . "%'
        AND descuento LIKE '%". $_POST['descuento'] . "%'
        AND iva LIKE '%". $_POST['iva'] . "%'
        AND Precio LIKE '%". $_POST['Precio'] . "%'";
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/styleCRUD.css">
    <title>Document</title>
    <script src="ruta/al/archivo.js"></script>
</head>

<body style="margin: 0;">
    <div>
        <table>
            <thead>
                <tr>
                    <th>Clave del Articulo</th>
                    <th>Descripcion</th>
                    <th>Descuento</th>
                    <th>Iva</th>
                    <th>Precio</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <!-- INICIO DE PHP -->
            <?php 
                $query = consultaRet($consulta);
                while($consulta = mysqli_fetch_array($query)){
                    
                
            ?>
            <!-- FIN DE PHP -->
            <form method="POST">
            <tbody>
                <td><?php echo $consulta['cveArticulo']; ?></td>
                <td> <input type="text" class="inp-tb" name="descripcion" value="<?php echo $consulta['descripcion']; ?>"></td>
                <td> <input type="text" class="inp-tb" name="descuento" value="<?php echo $consulta['descuento']; ?>"></td>
                <td> <input type="text" class="inp-tb" name="iva" value="<?php echo $consulta['iva']; ?>"></td>
                <td> <input type="text" class="inp-tb" name="Precio" value="<?php echo $consulta['Precio']; ?>"></td>
                <td>
                    <input type="hidden" name="cveArticulo" value="<?php echo $consulta['cveArticulo']; ?>">
                    <input type="submit" formaction="procesos/btnActualizar.php" class="btn btn-actualizar" value="Actualizar">
                </td>
                <td><form method="POST">
                    <input type="hidden" name="cveArticulo" value="<?php echo $consulta['cveArticulo']; ?>">
                    <input type="submit" formaction="procesos/btnEliminar.php" class="btn btn-eliminar" value="Eliminar">
                </td>
            </tbody>
            </form>
            <?php }//fin del while ?>
            
            <form method="POST">
                <tbody>
                    <td><input type="text" name="cveArticulo"></td>
                    <td><input type="text" name="descripcion"></td>
                    <td><input type="text" name="descuento"></td>
                    <td><input type="text" name="iva"></td>
                    <td><input type="text" name="Precio"></td>
                    <td><input type="submit" class="btn btn-agregar" value="Agregar" formaction="procesos/btnAgregar.php"></td>
                    <td><input type="submit" class="btn btn-agregar" value="Buscar" name="Buscar" formaction="tabla.php"></td>
                </tbody>
            </form>
        </table>
    </div>
</body>

</html>