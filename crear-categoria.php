<?php 
    require_once 'includes/redireccion.php';
    require_once 'includes/header.php';    
    require_once 'includes/lateral.php';
?>

<!-- Contenido -->
<div id="principal">
    <h1>Crear Categorías</h1>

    <p>
        Añade nuevas categorías para que los usuarios puedan usarlas al crear sus entradas.
    </p>
    <br>
    <form action="guardar-categoria.php" method="post">
        <label for="nombre">Nombre de la categoría</label>
        <input type="text" name="nombre">
        <?php echo isset($_SESSION['errores_categoria']) ? mostrarError($_SESSION['errores_categoria'],'nombre') : ''; ?>

        <input type="submit" value="Guardar">
    </form>

    <?php borrarErrores(); ?> 
    
</div>
<!-- /Contenido --> 

<?php require_once 'includes/footer.php'; ?>