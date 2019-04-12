<!-- Sidebar -->
<aside id="sidebar">

    <div id="buscador" class="block-aside">
        <h3>Buscar</h3>

        <?php if(isset($_SESSION['error_login'])): ?>

            <div class="alerta alerta-error">
                <h3>
                    <?= $_SESSION['error_login']; ?>
                </h3>
            </div>

        <?php endif; ?>

        <form action="buscar.php" method="post">
            <input type="text" name="busqueda">

            <input type="submit" value="Buscar">
        </form>
    </div>

    <?php if(isset($_SESSION['usuario'])): ?>

        <div id="usuario-logeado" class="block-aside">
            <h3>
                <?= "Bienvenido, <br>" . $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?>
            </h3>
            <a href="crear-entrada.php" class="boton boton-verde">Crear entrada</a>
            <a href="crear-categoria.php" class="boton boton">Crear categoría</a>
            <a href="mis-datos.php" class="boton boton-naranja">Mis datos</a>
            <a href="logout.php" class="boton boton-rojo">Cerrar sesión</a>
        </div>

    <?php endif; ?>

    <?php if(!isset($_SESSION['usuario'])): ?>

        <div id="login" class="block-aside">
            <h3>Indentifícate</h3>

            <?php if(isset($_SESSION['error_login'])): ?>

                <div class="alerta alerta-error">
                    <h3>
                        <?= $_SESSION['error_login']; ?>
                    </h3>
                </div>

            <?php endif; ?>

            <form action="login.php" method="post">
                <label for="email">Email: </label>
                <input type="email" name="email">

                <label for="password">Password: </label>
                <input type="password" name="password">

                <input type="submit" value="Entrar">
            </form>
        </div>

        <div id="register" class="block-aside">

            <h3>Regístrate</h3>

            <?php if(isset($_SESSION['registrado'])): ?>

                <div class="alerta alerta-exito">
                    <?=$_SESSION['registrado']?>
                </div>

            <?php elseif(isset($_SESSION['errores']['general'])): ?>

            <div class="alerta alerta-error">
                <?=$_SESSION['errores']['general']?>
            </div>

            <?php endif; ?>

            <form action="register.php" method="post">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : ''; ?>

                <label for="apellidos">Apellidos: </label>
                <input type="text" name="apellidos">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidos') : ''; ?>

                <label for="email">Email: </label>
                <input type="email" name="email">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') : ''; ?>

                <label for="password">Password: </label>
                <input type="password" name="password">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'password') : ''; ?>

                <input type="submit" value="Registrarse">

            </form>

            <?php borrarErrores(); ?> 

        </div>

    <?php endif; ?>

</aside>
<!-- /Sidebar -->