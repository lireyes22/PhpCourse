<?php
    include('procesos/funciones.php');

    if(!isset($_POST['btnAdd'])) {
        if(empty($_POST['cveArticulo'])){
            echo"<script  language='javascript'>window.location='index.php'</script>";  
        }
        $cve = $_POST['cveArticulo'];
        $sql = "SELECT *
        FROM Articulos
        JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo WHERE Articulos.cveArticulo = '$cve'";
        $consulta = mysqli_fetch_array(consultaRet($sql));
        $flag = true;
    } else {
        $flag = false;
    }
    
    
    

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
        <form method="POST"><fieldset>
            <Legend>Articulo</Legend>
            <table>
                <tr>
                    <td class="widerow">Cve del Articulo:</td>
                    <td><input type="text" name="cveArticulo" value="<?php echo $flag ? $consulta['cveArticulo'] : ''; ?>" <?php echo $flag ? 'readonly' : ''?>></td>
                </tr>
                <tr>
                    <td class="widerow">Descripcion:</td>
                    <td><input type="text" name="descripcion" value="<?php echo $flag ? $consulta['descripcion'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td class="widerow">Descuento:</td>
                    <td><input type="number" min ="0" name="descuento" value="<?php echo $flag ? $consulta['descuento'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td class="widerow">Iva:</td>
                    <td><input type="number" min ="0" name="iva" value="<?php echo $flag ? $consulta['iva'] : ''; ?>"></td></tr>
                <tr>
                    <td class="widerow">Precio:</td>
                    <td><input type="number" min ="0" name="precio" value="<?php echo $flag ? $consulta['precio'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td class="widerow">Existencia:</td>
                    <td><input type="number" min ="0" name="existencia" value="<?php echo $flag ? $consulta['existencia'] : ''; ?>"></td>
                </tr>            
            </table>
            <button formaction="index.php"><img src="img/izquierda.png"></button>
            <?php if (!isset($_POST['btnVisualizar'])) { if ($flag) {?>
                <button type="submit" name="btnEliminar" value="Eliminar" formaction="procesos/btnAction.php">
                    <img src="img/basura.png" alt="Icono"></button>
                <button type="submit" value="Actualizar" name="btnActualizar" formaction="procesos/btnAction.php">
                    <img src="img/actualizar.png" alt="Icono"></button>
            <?php } else {?>
                <button type="submit" name="btnAgregar" formaction="procesos/btnAction.php" class="submit-button">
                        <img src="img/add.png" alt="Icono"></button>
            <?php }} ?>
        </fieldset></form>
    </div>
</body>

</html>
