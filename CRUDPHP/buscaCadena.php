<?php
include 'procesos/funciones.php';

#$consulta = "SELECT * FROM Articulos JOIN Existencias ON Articulos.cveArticulo = Existencias.cveArticulo";

$consulta = "SELECT * FROM Articulos WHERE Articulos.descripcion LIKE '" . $_POST['Nombre'] . "%' ORDER BY Articulos.descripcion ASC";
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
                </tr>
            </thead>
            <!-- INICIO DE PHP -->
            <?php
            $query = consultaRet($consulta);
            $bn=true;
            while ($consulta = mysqli_fetch_array($query)) {
                $bn=false;
            ?>
                
                <!-- FIN DE PHP -->
                <form method="POST">
                    <tbody>
                        <td><input type="text" name="cveArticulo" value="<?php echo $consulta['cveArticulo']; ?>" readonly></td>
                        <td><input type="text" name="descripcion" value="<?php echo $consulta['descripcion']; ?>" readonly></td>
                    </tbody>
                </form>
            <?php } //fin del while 
            if($bn){ echo"<script>alert('No hay datos')</script>";}
            ?>
        </table> <br>
        <button><a href="buscarArt.html" style="text-decoration:none">Realizar otra busqueda</a></button>
    </div>
</body>
</html>