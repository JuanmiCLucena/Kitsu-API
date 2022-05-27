<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Kitsu Manga">

	<title>Kitsu - Anime</title>

	<link rel="shortcut icon" href="assets/images/logo.webp">

	<link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/main.css">

</head>

<body>
	<?php
	require_once('templates/navbar.php')
	?>

	<!-- container -->
	<div class="container">

		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
				<li class="breadcrumb-item active">Directorio de Anime</li>
			</ol>
		</nav>

		<div class="row">

			<!-- Article main content -->
			<article class="col-sm-10">
				<header class="page-header">
					<h1 class="page-title">Directorio de Anime e informacion (Kitsu)</h1>
				</header>
				
				<div id="kitsu">
		
				</div>
			</article>
			<!-- /Article -->

			<!-- Sidebar -->
			<aside class="col-sm-2 sidebar sidebar-right">

				

			</aside>
			<!-- /Sidebar -->

		</div>
	</div> <!-- /container -->

	<?php
	require_once('templates/footer.php');
	require_once('templates/includeJsScripts.php');
	?>

</body>
<script>
	const aux = <?php
	if (isset($_SESSION['usuario'])) {
		echo "1";
	} else {
		echo "0";
	}
	?>;
	if ( aux == 1 ) {
		usuario = "<?php echo $_SESSION['usuario'] ?>";
		idUsuario = "<?php echo $_SESSION['idUsuario'] ?>";
	} 
</script>
<script src="assets/js/loadKitsu.js"></script>

</html>