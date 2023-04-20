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
        $query = mysqli_query($conection, "CALL `ShowTitlesColumns`('$title');");
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function showTitlesTable() {
        global $conection;
        $query = mysqli_query($conection, "CALL `ShowTitleTables`();");
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function eliminarRegistro($id, $tabla,$columnaId) {
        global $conection;
        return mysqli_query($conection, "CALL `eliminarRegistro`($id, '$tabla', '$columnaId')");
    }
?>