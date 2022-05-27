<?php
session_start();
 if (isset($_POST['borrar'])) {
    require_once('bd.php');
    $id = $_POST['idAnime'];
    $statement = $bd->prepare("DELETE FROM animes_favoritos WHERE idAnime = :idAnime AND idUsuario=" . $_SESSION['idUsuario']);
    $statement -> bindParam(':idAnime', $id, PDO::PARAM_INT);
    $statement->execute();
    header("Location:favoritos.php");
 }
?>