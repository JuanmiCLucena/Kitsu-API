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

	if (!empty($_SESSION['usuario'])){

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