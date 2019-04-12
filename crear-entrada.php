<?php 
    require_once 'includes/redireccion.php';
    require_once 'includes/header.php';    
    require_once 'includes/lateral.php';
?>

<!-- Contenido -->
<div id="principal">
    <h1>Crear Entradas</h1>

    <p>
        Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutar de nuestro contenido.
    </p>
    <br>
    <form action="guardar-entrada.php" method="post">
        <label for="titulo">Título</label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'],'titulo') : ''; ?>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" cols="95" rows="10"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'],'descripcion') : ''; ?>

        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php
                $categorias = getCategorias($db);
                if (!empty($categorias)):
                    while ($categoria = mysqli_fetch_assoc($categorias)): 
            ?>

                        <option value="<?= $categoria['id']; ?>">
                            <?= $categoria['nombre']; ?> 
                        </option>

            <?php 
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'],'categoria') : ''; ?>

        <input type="submit" value="Guardar">
    </form>
    
    <?= borrarErrores(); ?>
    
</div>
<!-- /Contenido --> 

<?php require_once 'includes/footer.php'; ?>