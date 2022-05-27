<?php
 if (isset($_POST['fav'])) {
    require_once('bd.php');
    $sql = "INSERT INTO animes_favoritos(idAnime,nombreAnime,idUsuario,nombreUsuario,enlaceAnime) VALUES (:idAnime,:nombreAnime,:idUsuario,:usuario,:enlaceAnime)";
    $consulta = $bd->prepare($sql);
    $consulta->execute(["idAnime" => $_POST['idAnime'],"nombreAnime" => $_POST['nombreAnime'], "idUsuario" => $_POST['idUsuario'],"usuario" => $_POST['nombreUsuario'],"enlaceAnime" => $_POST['enlaceAnime']]);
    header("Location:favoritos.php");
 }
?>