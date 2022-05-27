<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Kitsu ANime">

	<title>Favoritos - Kitsu</title>

	<link rel="shortcut icon" href="assets/images/logo.webp">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/79f56e797f.js" crossorigin="anonymous"></script>

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/main.css">

</head>

<body>

	<?php
	require_once('templates/navbar.php');

	if (!empty($_SESSION['usuario'])) {

	?>

		<!-- container -->
		<div class="container">

			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
					<li class="breadcrumb-item active">Favoritos</li>
				</ol>
			</nav>

			<div class="row">
				<div class="table-responsive mt-5">
					<table class="table table-dark">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody id="datos">
							<?php
							require_once('bd.php');
							$statement = $bd->prepare("SELECT idAnime,idUsuario, nombreUsuario, nombreAnime, enlaceAnime FROM animes_favoritos WHERE idUsuario =" .  $_SESSION['idUsuario']);
							$statement->execute(array());
							foreach ($statement as $row) { ?>
								<tr class="table-active">
									<td><a class="enlaceAnime" target="_blank" href=<?php echo $row['enlaceAnime']; ?>><?php echo $row['nombreAnime']; ?></a></td>
									<td>
										<form action='borrarfavorito.php' method='POST'>
											<input type="hidden" name="idAnime" value="<?php echo $row['idAnime']?>">
											<button type='submit' name='borrar'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
													<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
													<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
												</svg></button>
										</form>
									</td>
								</tr>

							<?php
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div> <!-- /container -->
		<script defer src=""></script>

	<?php
	} else {
		header("Location:login.php");
	}
	require_once('templates/footer.php');
	require_once('templates/includeJsScripts.php');
	?>
</body>

</html>