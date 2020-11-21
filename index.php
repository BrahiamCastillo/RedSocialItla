<?php

session_start();

$user;

if (!isset($_SESSION['login'])) {

    header('Location: folders\filesWeb\login.php');
} else {

    $user = json_decode($_SESSION['login']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="folders\css\librarys\bootstrap\bootstrap.min.css">
</head>

<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
                <img class="mb-4 card-img-top" src="folders\images\itla.png" alt="" width="180" height="100">
                <div class="card-body">
                    <h5 class="card-title">Welcome <?= $user->nombre . ' ' . $user->apellido; ?></h5>
                    <p class="card-text">Esta es la red social del ITLA, donde puedes consultar amigos, agregarlos, compartir publicaciones y comentarlas,
                        ¡Disfruta de una buena amistad al estar conectado con los demás!</p>
                    <a href="amistad.php" class="btn btn-primary">Ver amigos</a>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"><a href="folders\filesWeb\logout.php" class="btn btn-primary">Cerrar Sección</a></div>
    </div>
</body>

</html>