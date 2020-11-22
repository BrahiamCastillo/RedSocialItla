<?php

require_once 'folders\JsonHandler\JsonFileHandler.php';
require_once 'folders\databaseHandler\databaseConnection.php';
require_once 'folders\databaseHandler\databaseMethods.php';
require_once 'folders\Objects\Amigos.php';
require_once 'folders\Objects\Usuario.php';

session_start();

$user;

if (!isset($_SESSION['login'])) {

    header('Location: folders\filesWeb\login.php');
} else {

    $user = json_decode($_SESSION['login']);
}

$database = new DataBaseMethods('folders\databaseHandler');
$friends = $database->totalFriends($user->id_usuario);

if(isset($_POST['usuario'])) {

    $validateUser = $database->getTableUsuario($_POST['usuario']);

    if($validateUser == null) {

        $message = "¡No existe tal usuario!";
        echo "<script type='text/javascript'>alert('$message');</script>";

    } else {

        $friend = new Amigos();
        $friend->InizializeData($validateUser->id_usuario,$user->id_usuario);

        $database->addFriend($friend);

        $message = "¡Amigo agregado con éxito!";
        echo "<script type='text/javascript'>alert('$message');</script>";

        header('location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="folders\css\librarys\bootstrap\bootstrap.min.css">
    <link rel="stylesheet" href="folders\css\style.css">
</head>

<body>
    <div class="row">
        <?php if ($friends == "" || $friends == null) : ?>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="mb-4 card-img-top" src="folders\images\itla.png" alt="" width="180" height="100">
                    <div class="card-body">
                        <h5 class="card-title">Lista de amigos.</h5>
                        <p class="card-text">No posees amigos</p>
                        <a href="amistad.php" class="btn btn-primary">Agregar amigo</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="col-md-5">
                <div class="card" style="width: 18rem;">
                    <img class="mb-4 card-img-top" src="folders\images\itla.png" alt="" width="180" height="100">
                    <div class="card-body">
                        <h5 class="card-title">Lista de amigos.</h5>
                        <hr>
                        <?php foreach ($friends as $f) : ?>
                            <p class="card-text">Nombre: <?= $f->nombre; ?></p>
                            <p class="card-text">Apellido: <?= $f->apellido; ?></p>
                            <p class="card-text">Usuario: <?= $f->usuario; ?></p>
                            <a href="folders\filesWeb\deleteFriend.php?id_amigo=<?= $f->id_usuario; ?>" class="btn btn-danger">Eliminar</a>
                            <a href="folders\filesWeb\publicaciones.php?id_amigo=<?= $f->id_usuario; ?>" class="btn btn-primary">Ver Publicaciones</a>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img class="mb-4 card-img-top" src="folders\images\itla.png" alt="" width="180" height="100">
                <div class="card-body">
                    <h5 class="card-title">Welcome <?= $user->nombre . ' ' . $user->apellido; ?></h5>
                    <p class="card-text">Esta es la red social del ITLA, donde puedes consultar amigos, agregarlos, compartir publicaciones y comentarlas,
                        ¡Disfruta de una buena amistad al estar conectado con los demás!</p>
                    <a href="folders\filesWeb\publicacionesUsuario.php?id_usuario=<?= $user->id_usuario; ?>" class="btn btn-primary">Ver Publicaciones</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <form action="index.php" method="post">
                <hr>
                <label for="usuario" id='lblusuario'>Ingrese un usuario válido</label>
                <hr>
                <input type="text" class="form-control" id="usuario" name='usuario'>
                <hr>
                <button type="submit" class="btn btn-primary">Añadir amigo</button>
            </form>
        </div>
        <div class="col-md-2"><a href="folders\filesWeb\logout.php" class="btn btn-primary">Cerrar Sección</a></div>
    </div>
</body>

</html>
<script src="folders\js\librarys\jquery\jquery-3.5.1.min.js"></script>
<script src="folders\js\librarys\bootstrap\bootstrap.min.js"></script>
<script src="folders\js\librarys\toastr\toastr.min.js"></script>
<script src="folders\js\validacion.js"></script>