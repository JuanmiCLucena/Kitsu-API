<?php
 if (isset($_POST['fav'])) {
    require_once('bd.php');
    $sql = "INSERT INTO animes_favoritos(idAnime,idUsuario,nombreUsuario) VALUES (:idAnime,:idUsuario,:usuario)";
    $consulta = $bd->prepare($sql);
    $consulta->execute(["idAnime" => $_POST['idAnime'], "idUsuario" => $_POST['idUsuario'],"usuario" => $_POST['nombreUsuario']]);


    $sql2 = "SELECT idAnime,idUsuario,nombreAnime FROM animes_favoritos WHERE idAnime = :idAnime AND nombreUsuario = :usuario";
    $consulta = $bd->prepare($sql2);
    $consulta->execute(["idAnime" => $_POST['idAnime']]);
    $usuario = $consulta->fetch();
    header("Location:favoritos.php");
 }
?>