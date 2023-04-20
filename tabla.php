<?php
include 'funciones.php';
session_start();
if (empty($_SESSION['active'])) {
    header('location: index.php');
}
    $opcionSeleccionada = 'mensajes';
    $nombreCampoID='idMensaje';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/styleTb.css">
    <title>Document</title>
</head>

<body>
    <div>
        <form method="post">
            <label for="optionTb">Selecciona una opción:</label>
            <select id="optionTb" name="optionTb">
                <?php
                $titlesTb = showTitlesTable();
                while ($titleTb = mysqli_fetch_assoc($titlesTb)) {
                    echo '<option value="' . $titleTb["table_name"] . '">' . $titleTb["table_name"] . '</option>';
                }
                ?>
            </select>
            <button type="submit">CRUD</button>
        </form>
    </div> <br> <br> <br>
    <div>
        <table>
            <thead>
                <tr>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $opcionSeleccionada = $_POST['optionTb'];
                    }
                    $titles = showTitles($opcionSeleccionada);
                    $i = true;
                    while ($title = mysqli_fetch_assoc($titles)) {
                        echo '<th>' . $title['COLUMN_NAME'] . '</th>';
                        if($i){$nombreCampoID=$title['COLUMN_NAME'];$i=false;}
                    }
                    $i = true;
                    echo '<th>Eliminar</th>';
                    echo '<th>Editar</th>';
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = showTable($opcionSeleccionada);
                while ($row = mysqli_fetch_row($data)) {
                    echo '<tr>';
                    foreach ($row as $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    echo '<td><a href="procesos/Eliminar.php?id='.$row[0].'&tabla='.$opcionSeleccionada.'&campo='.$nombreCampoID.'">Eliminar</a></td>';
                    echo '<td><a href="procesos/Editar.php?id='.$row[0].'&tabla='.$opcionSeleccionada.'&campo='.$nombreCampoID.'">Actualizar</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div> <br>
    <div>

    </div>
    <div>
        <a href="procesos/LogOut.php">Salir</a><br>
        <?php echo $opcionSeleccionada; ?>
    </div>
</body>

</html>
