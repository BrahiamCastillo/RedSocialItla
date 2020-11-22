<?php 

require_once '../JsonHandler/JsonFileHandler.php';
require_once '../databaseHandler/databaseMethods.php';
require_once '../Objects/Publicacion.php';
require_once '../Objects/PublicacionEdit.php';

session_start();

if (!isset($_SESSION['login'])) {

    header('Location: folders\filesWeb\login.php');
} else {

    $user = json_decode($_SESSION['login']);
}

$database = new DataBaseMethods('../databaseHandler');

if(isset($_GET['id_publicacion'])) {
    
    $publicationId = $_GET['id_publicacion'];
    $chargePublication = $database->getPublicationById($_GET['id_publicacion']);

}

if(isset($_POST['publicacion'])) {

    $publicationId = $_GET['id_publicacion'];

    $publication = new PublicacionEdit();
    $publication->InizializeData($publicationId,$_POST['publicacion']);
    //var_dump($publication);
    //var_dump();
    //exit();

    $database->editPublication($publication);
    header('Location: ../../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar publicación</title>
    <link rel="stylesheet" href="..\css\librarys\bootstrap\bootstrap.min.css">
    <link rel="stylesheet" href="..\css\style.css">
    <link rel="stylesheet" href="..\css\login.css">
</head>
<body>
<div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="modificarPublicacion.php?id_publicacion=<?= $publicationId; ?>" method="POST">
                    <h2>Ingrese la publicación</h2>
                    <hr>
                    <div class="input-group form-group">
                        <textarea class='form-control' name="publicacion" id="publicacion" cols="5" rows="5"><?= $chargePublication->publicacion; ?></textarea>
                        <button type="submit" class="btn btn-primary">Editar Publicación</button>
                    </div>
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