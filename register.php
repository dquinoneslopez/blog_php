<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    session_start();
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    // Validaciones

    $errores = [];

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {

       $nombre_validado = true;

    } else {

        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido.";

    }

    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {

        $apellidos_validado = true;

     } else {

         $apellidos_validado = false;
         $errores['apellidos'] = "Los apellidos no son válidos.";

     }

     if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $email_validado = true;

     } else {

         $email_validado = false;
         $errores['email'] = "El email no es válido.";

     }

     if (!empty($password)) {

        $password_validado = true;

     } else {

         $password_validado = false;
         $errores['password'] = "El password está vacío.";
         
     }

     $guardar_usuario = false;

     if (count($errores) === 0) { // Insertar usuario en la BD
        
        $guardar_usuario = true;
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        
        $query = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE())";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            
            $_SESSION['registrado'] = "Registro completado con éxito";

        } else {

            $_SESSION['errores']['general'] = "Error al realizar el registro.";

        }
        

     } else {

        $_SESSION['errores'] = $errores;

    }
    
}

header("Location:index.php");