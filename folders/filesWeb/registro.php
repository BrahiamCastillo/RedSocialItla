<?php

require_once '../Objects/Usuario.php';
require_once '../databaseHandler/databaseConnection.php';
require_once '../databaseHandler/databaseMethods.php';

session_start();

if (isset($_SESSION['login'])) {

    header('Location: ../../index.php');
}


if (
    isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['correo'])
    && isset($_POST['usuario']) && isset($_POST['clave']) && isset($_POST['claveR']) && $_POST['clave'] == $_POST['claveR']) {

    $database = new DataBaseMethods('../databaseHandler');

    $newUser = new Usuario();
    $newUser->InizializeData(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['telefono'],
        $_POST['correo'],
        $_POST['usuario'],
        $_POST['clave']
    );

    $database->addUser($newUser);

    $message = "¡Registro exitoso!";
    echo "<script type='text/javascript'>alert('$message');</script>";

    header('Location: ../../index.php');

} 

if($_POST['clave'] != $_POST['claveR']) {
    $message = "¡El registro no ha sido exitoso!, revise si las contraseñas coinciden";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="..\css\librarys\bootstrap\bootstrap.min.css">
</head>

<body class="text-center">
    <hr>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action='registro.php' method="POST">
                <img class="mb-4" src="..\images\itla.png" alt="" width="180" height="100">
                <h1 class="h3 mb-3 font-weight-normal">Registro a la red social.</h1>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name='nombre'>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name='apellido'>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name='telefono'>
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" name='correo'>
                    <small id="emailHelp" class="form-text text-muted">Ingresar un correo válido.</small>
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name='usuario'>
                </div>
                <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="password" class="form-control" id="clave" name='clave'>
                </div>
                <div class="form-group">
                    <label for="claveR">Repetir contraseña</label>
                    <input type="password" class="form-control" id="claveR" name='claveR'>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>

</html>