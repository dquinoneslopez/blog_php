<?php

if(isset($_POST)){

    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    $errores = [];

    if (empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)) {

        $errores['nombre'] = "El nombre no es válido.";

    }

    if(count($errores) == 0) {

        $query = "INSERT INTO categorias VALUES(null,'$nombre');";
        $guardar = mysqli_query($db,$query);
        header("Location: index.php");

    } else {

        $_SESSION['errores_categoria'] = $errores;
        header("Location: crear-categoria.php");

    }

}

