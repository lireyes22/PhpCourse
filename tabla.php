<?php
include 'funciones.php';
session_start();
if (empty($_SESSION['active'])) {
    header('location: index.php');
}

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
                <option value="option1">option1</option>
                <option value="option2">option2</option>
                <option value="option3">option3</option>
            </select>
            <button type="submit">Enviar</button>
            </form>
        <?php
            $titlesTb = showTitlesTable();
            while ($titleTb = mysqli_fetch_assoc($titlesTb)) {
              echo $titleTb["table_name"] . "<br>";
            }         
        ?>
    </div> <br> <br> <br>
    <div>
        <table>
            <thead>
                <tr>
                    <?php
                    $titles = showTitles('usuarios');
                    while ($title = mysqli_fetch_assoc($titles)) {
                        echo '<th>' . $title['COLUMN_NAME'] . '</th>';
                    }
                    echo '<th>Eliminar</th>';
                    echo '<th>Editar</th>';
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data = showTable('usuarios');
                    while ($row = mysqli_fetch_assoc($data)) {
                        echo '<tr>';
                        foreach ($row as $value) {
                            echo '<td>'.$value.'</td>';
                        }
                        echo '<td><a href="">Eliminar</a></td>';
                        echo '<td><a href="">Editar</a></td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div> <br>
    <div><a href="procesos/LogOut.php">Salir</a></div>
</body>
</html>