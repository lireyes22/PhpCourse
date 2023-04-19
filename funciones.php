<?php
    include 'conexion.php';
    
    function comprobarLogin($user, $password) {
        global $conection;
        $query = mysqli_query($conection, "CALL LoginDts('$user', '$password');");
        $data = mysqli_fetch_array($query);

        return $data;
    }
    function showTable($tabla) {
        global $conection;
        $query = mysqli_query($conection, "CALL `ShowTables`('$tabla');");
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    
    function showTitles($title) {
        global $conection;
        $query = mysqli_query($conection, "CALL `TitlesTable`('$title');");
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    
?>