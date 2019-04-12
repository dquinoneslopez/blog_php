<?php 
    require_once 'includes/redireccion.php';
    require_once 'includes/header.php';    
    require_once 'includes/lateral.php';
?>

<!-- Contenido -->
<div id="principal">
    <h1>Mis Datos</h1>

    <?php if(isset($_SESSION['actualizado'])): ?>

        <div class="alerta alerta-exito">
            <?=$_SESSION['actualizado']?>
        </div>

        <?php elseif(isset($_SESSION['errores']['general'])): ?>

        <div class="alerta alerta-error">
            <?=$_SESSION['errores']['general']?>
        </div>

        <?php endif; ?>

        <form action="actualizar-usuario.php" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre'] ?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : ''; ?>

            <label for="apellidos">Apellidos: </label>
            <input type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellidos'] ?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidos') : ''; ?>

            <label for="email">Email: </label>
            <input type="email" name="email" value="<?= $_SESSION['usuario']['email'] ?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') : ''; ?>

            <input type="submit" value="Actualizar">

        </form>
    
    <?= borrarErrores(); ?>
    
</div>
<!-- /Contenido --> 

<?php require_once 'includes/footer.php'; ?>