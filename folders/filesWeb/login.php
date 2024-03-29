<?php

session_start();

require_once '../JsonHandler/JsonFileHandler.php';
require_once '../databaseHandler/databaseConnection.php';
require_once '../databaseHandler/databaseMethods.php';
require_once '../Objects/Usuario.php';

$data = new DataBaseMethods('../databaseHandler');
$message = "";

if (isset($_POST['usuario']) && isset($_POST['clave'])) {

    $autentication = $data->getUserByUS_Pas($_POST['usuario'], $_POST['clave']);

    if ($autentication != null) {

        $_SESSION['login'] = json_encode($autentication);
        header('Location: ../../index.php');
        exit();
    } else {
        $message = 'Credenciales incorrectas.';
    }
}


?>


<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Log In</title>


    <link rel="stylesheet" href="..\css\librarys\bootstrap\bootstrap.min.css">
    <link rel="stylesheet" href="..\css\login.css">
    <link rel="stylesheet" href="..\css\style.css">
</head>

<body class="text-center">
    <hr>
    <div class="row">
        <div class="col-md-4">
            <?php if($message != null): ?>
                <div class='alert alert-danger' role='alert'>
                <?= $message ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <form action='login.php' method="POST" class="form-signin">
                <img class="mb-4" src="..\images\itla.png" alt="" width="180" height="100">
                <h1 class="h3 mb-3 font-weight-normal">Ingrese sus credenciales.</h1>
                <label for="usuario" class="sr-only textos">Usuario</label>
                <input type="text" id="usuario" class="form-control" placeholder="Usuario" name='usuario'>
                <div>
                    <hr>
                </div>
                <label for="clave" class="sr-only textos">Contraseña</label>
                <input type="password" id="clave" class="form-control" placeholder="Contraseña" name='clave'>
                <div>
                    <hr>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id='boton'>Ingresar</button>
                <a href='registro.php' class="btn btn-lg btn-primary btn-block">Registrarse</a>
                <p class="mt-5 mb-3 text-muted">© 2017-2020</p>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>


</body>

</html>
<script src="../../folders\js\librarys\jquery\jquery-3.5.1.min.js"></script>
<script src="../../folders\js\librarys\bootstrap\bootstrap.min.js"></script>
<script src="../../folders\js\librarys\toastr\toastr.min.js"></script>
<script src="../../folders\js\validacion.js"></script>