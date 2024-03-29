<?php

require_once '../JsonHandler/JsonFileHandler.php';
require_once '../databaseHandler/databaseMethods.php';
require_once '../Objects/Usuario.php';
require_once '../Objects/Comentarios.php';
require_once '../Objects/Publicacion.php';

session_start();

if (!isset($_SESSION['login'])) {

    header('Location: folders\filesWeb\login.php');
} else {

    $user = json_decode($_SESSION['login']);
}

$database = new DataBaseMethods('../databaseHandler');
$friendsPublications = null;
$interuptor = false;
$access = null;

if(!isset($_GET['id_publicacion'])) {
    $access = true;
}

if (isset($_GET['id_amigo'])) {

    $idAmigoComment = $_GET['id_amigo'];

    $friendsPublications = $database->getPublications($_GET['id_amigo']);

    $userFriend = $database->searchUser($_GET['id_amigo']);
}

if (isset($_GET['id_publicacion'])) {

    $idCommentPublication = $_GET['id_publicacion'];
    $interuptor = true;
    
}


if (isset($_POST['comentario'])) {
    
    $idCommentPublication = $_GET['id_publicacion'];
    $comment = new Comentarios();
    $comment->InizializeData($idCommentPublication, $user->id_usuario, $_POST['comentario']);
    $database->addComment($comment);

    header('Location: ../../index.php');
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link rel="stylesheet" href="..\css\librarys\bootstrap\bootstrap.min.css">
    <link rel="stylesheet" href="..\css\style.css">
    <link rel="stylesheet" href="..\css\login.css">

    <?php if ($interuptor === true) : ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="publicaciones.php?id_publicacion=<?= $idCommentPublication; ?>" method="POST">
                    <h2>Ingrese un comentario</h2>
                    <hr>
                    <div class="input-group form-group">
                        <textarea class='form-control' name="comentario" id="comentario" cols="5" rows="5"></textarea>
                        <button type="submit" class="btn btn-primary">Añadir Comentario</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    <?php endif; ?>
</head>

<body>
<div class="row">
        <div class="col-md-2"><a href="../../index.php" class="btn btn-primary">Volver atrás</a></div>
        <div class="col-md-2"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <hr>
    <?php if ($friendsPublications == null || $friendsPublications == "" && $access === true): ?>
        <?php if ($access === true): ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card border-success mb-3" style="width: 200px;">
                    <div class="card-header bg-transparent border-success">Publicaciones</div>
                    <div class="card-body text-success">
                        <h5 class="card-title">No hay publicaciones</h5>
                        <p class="card-text">El usuario <?= $userFriend->nombre . ' ' . $userFriend->apellido ?> no posee ninguna publicación.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="row">
            <?php foreach ($friendsPublications as $fp) : ?>
                <div class="col-md-3">
                    <div class="card border-success mb-3" style="width: 200px;">
                        <div class="card-header bg-transparent border-success">Publicaciones</div>
                        <div class="card-body text-success">
                            <h5 class="card-title">Publicacion #<?= $fp->id_publicacion; ?></h5>
                            <p class="card-text"><?= $fp->publicacion; ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-success"><?= $fp->fecha_hora; ?></div>
                        <div class="card-body text-success"><a href="publicaciones.php?id_publicacion=<?= $fp->id_publicacion; ?>" class="btn btn-primary">Comentar</a></div>
                        <div class="card-body text-success">
                            <h5 class="card-title">Comentarios</h5>
                            <hr>
                            <?php

                                $publicationsComments = $database->getComments($fp->id_publicacion);
                                $commentsNum = count($publicationsComments);
                                for($f = 0;$f<$commentsNum;$f++) {

                                    $userComment = $database->searchUser($publicationsComments[$f]->id_usuario);

                                    echo $userComment->nombre . $userComment->apellido . ' comentó: ' . $publicationsComments[$f]->comentario.'<br>';
                                    echo $publicationsComments[$f]->fecha_hora;
                                    echo '<hr>';
                                }

                            ?>
                            <hr>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>

</html>
<script src="../../folders\js\librarys\jquery\jquery-3.5.1.min.js"></script>
<script src="../../folders\js\librarys\bootstrap\bootstrap.min.js"></script>
<script src="../../folders\js\librarys\toastr\toastr.min.js"></script>
<script src="../../folders\js\validacion.js"></script>