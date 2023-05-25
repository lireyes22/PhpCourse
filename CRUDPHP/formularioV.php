<?php
    include('procesos/funciones.php');
    
    if(empty($_POST['cveArticulo'])){
        echo"<script  language='javascript'>window.location='index.php'</script>";  
    }

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
    
    <div>
        <form> <button formaction="index.php"><img src="img/izquierda.png"></button> </form>
        <label>Articulo</label>
        <form method="POST">
            <table>
                <tr>
                    <td><label>Cve del Articulo:</label></td>
                    <td><?php echo $consulta['cveArticulo']; ?></td>
                </tr>
                <tr>
                    <td><label>Descripcion:</label></td>
                    <td><?php echo $consulta['descripcion']; ?></td>
                </tr>
                <tr>
                    <td><label>Descuento:</label></td>
                    <td><?php echo $consulta['descuento']; ?></td>
                </tr>
                <tr>
                    <td><label>Iva:</label></td>
                    <td><?php echo $consulta['iva']; ?></td></tr>
                <tr>
                    <td><label>Precio:</label></td>
                    <td><?php echo $consulta['precio']; ?></td>
                </tr>
                <tr>
                    <td><label>Existencia:</label></td>
                    <td><?php echo $consulta['existencia']; ?></td>
                </tr>            
            </table>
        </form>
    </div>
</body>

</html>
