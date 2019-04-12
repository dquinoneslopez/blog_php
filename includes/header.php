<?php
    require_once 'conexion.php';
    require_once 'helpers.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog de Videojuegos</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Cabecera -->
    <header id="header">
        <div id="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>
        <!-- Menú -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php 
                    $categorias = getCategorias($db); 

                    if(!empty($categorias)):
                        while($categoria = mysqli_fetch_assoc($categorias)):
                ?>

                            <li>
                                <a href="categoria.php?id=<?=$categoria['id']?>"><?= $categoria['nombre']; ?></a>
                            </li>

                <?php 
                        endwhile;
                    endif 
                ?>
                <li>
                    <a href="">Sobre mi</a>
                </li>
                <li>
                    <a href="">Contacto</a>
                </li>
            </ul>
        </nav>
        <!-- /Menú -->
    </header>
    <!-- /Cabecera -->

    <!-- Container -->
    <div id="container">