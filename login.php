<?php

require_once 'includes/conexion.php';

if( isset($_POST) ){

    if (isset($_SESSION['error_login'])) {

        unset($_SESSION['error_login']);

    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1;";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        
        $usuario = mysqli_fetch_assoc($result);
        $verify = password_verify($password, $usuario['password']);

        if ($verify) {

            $_SESSION['usuario'] = $usuario;

        } else {

            $_SESSION['error_login'] = "Login incorrecto.";

        }

    } else {

        $_SESSION['error_login'] = "Login incorrecto.";

    }

}

header("Location: index.php");