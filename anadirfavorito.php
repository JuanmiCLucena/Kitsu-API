<?php
session_start();
if (isset($_POST['fav'])) {
   require_once('bd.php');
   $id = $_POST['idAnime'];
   $query = "SELECT COUNT(*) FROM animes_favoritos WHERE idAnime = :idAnime AND idUsuario=" . $_SESSION['idUsuario'];
   $stmt = $bd->prepare($query);
   $stmt->bindParam(':idAnime', $id, PDO::PARAM_INT);
   $stmt->execute();
   $numberRows = $stmt->fetchColumn();

   if ($numberRows == 0 ) {
      $sql = "INSERT INTO animes_favoritos(idAnime,nombreAnime,idUsuario,nombreUsuario,enlaceAnime) VALUES (:idAnime,:nombreAnime,:idUsuario,:usuario,:enlaceAnime)";
      $consulta = $bd->prepare($sql);
      $consulta->execute(["idAnime" => $_POST['idAnime'], "nombreAnime" => $_POST['nombreAnime'], "idUsuario" => $_POST['idUsuario'], "usuario" => $_POST['nombreUsuario'], "enlaceAnime" => $_POST['enlaceAnime']]);
      header("Location:favoritos.php");
   } else { ?>
      <script>
         alert('El anime seleccionado ya se encuentra en la lista de favoritos.');
         window.location.href='favoritos.php';
      </script>
      
  <?php }

   
}


