<?php 

require_once '../JsonHandler/JsonFileHandler.php';
require_once '../databaseHandler/databaseMethods.php';

session_start();

if (!isset($_SESSION['login'])) {

    header('Location: folders\filesWeb\login.php');
} else {

    $user = json_decode($_SESSION['login']);
}

$database = new DataBaseMethods('../databaseHandler');

if(isset($_GET['id_amigo'])) {

    $idUser = $_GET['id_amigo'];
    $database->deleteFriend($idUser);

    $message = "¡El usuario ya no es tu amigo!";
    echo "<script type='text/javascript'>alert('$message');</script>";

    header('Location: ../../index.php');

}
