<?php

function mostrarError($errores, $campo) {

    $alerta = "";

    if (isset($errores[$campo]) && !empty($campo)) {
        
        $alerta = "<div class='alerta alerta-error'>". $errores[$campo] ."</div>";

    }

    return $alerta;

}

function borrarErrores() {

    if (isset($_SESSION['errores'])) {

        unset($_SESSION['errores']);

    }

    if (isset($_SESSION['errores_entrada'])) {

        unset($_SESSION['errores_entrada']);

    }

    if (isset($_SESSION['errores_categoria'])) {

        unset($_SESSION['errores_categoria']);

    }

    if (isset($_SESSION['registrado'])) {
        
        unset($_SESSION['registrado']);

    }  
    
    if (isset($_SESSION['actualizado'])) {
        
        unset($_SESSION['actualizado']);

    }

}

function getCategoria($conexion, $id) {

    $query = "SELECT * FROM categorias WHERE id = '$id';";
    $categoria = mysqli_query($conexion, $query);

    $result = [];
    if($categoria && mysqli_num_rows($categoria) >= 1){

        $result = mysqli_fetch_assoc($categoria);

    }

    return $result;

}

function getCategorias($conexion) {

    $query = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $query);

    $result = [];
    if($categorias && mysqli_num_rows($categorias) >= 1){

        $result = $categorias;

    }

    return $result;

}

function getEntrada($conexion, $id) {

    $query = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS 'usuario' 
              FROM entradas e 
              INNER JOIN categorias c ON c.id = e.categoria_id 
              INNER JOIN usuarios u ON e.usuario_id = u.id 
              WHERE e.id = $id";

    $entrada = mysqli_query($conexion, $query);

    $result = [];

    if($entrada && mysqli_num_rows($entrada) >= 1) {

        $result = mysqli_fetch_assoc($entrada);

    }

    return $result;

}

function getEntradas($conexion, $limit = null, $categoria = null, $busqueda = null) {

    $query = "SELECT e.*, c.nombre AS 'categoria' 
              FROM entradas e 
              INNER JOIN categorias c ON e.categoria_id = c.id";

    if(!empty($categoria)){

        $query .= " WHERE e.categoria_id = $categoria";

    }

    if (!empty($busqueda)) {
        
        $query .= " WHERE e.titulo LIKE '%$busqueda%'";

    }

    $query .= " ORDER BY e.id DESC";

    if($limit) {

        $query .= " LIMIT 4";

    }

    $entradas = mysqli_query($conexion, $query);

    $result = [];
    if($entradas && mysqli_num_rows($entradas) >= 1){

        $result = $entradas;

    }

    return $result;

}