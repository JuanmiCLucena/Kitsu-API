<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");

?>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
	<a class="navbar-brand fs-1 fw-bold" href="https://kitsu.docs.apiary.io/#"><img src="assets/images/logonav.webp" width="100px" height="100px" alt="Anime logo">KITSU</a>
	
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link <?= ($activePage == 'index') ? 'active' : ''; ?>" href="index.php">Inicio</a></li>
				<li class="nav-item"><a class="nav-link <?= ($activePage == 'directorio') ? 'active' : ''; ?>" href="directorio.php">Directorio</a></li>
				<li class="nav-item"><a class="nav-link <?= ($activePage == 'kitsu') ? 'active' : ''; ?>" href="kitsu.php">Populares</a></li>
				<li class="nav-item"><a class="nav-link <?= ($activePage == 'favoritos') ? 'active' : ''; ?>" href="favoritos.php">Favoritos</a></li>
				<?php
				if (isset($_SESSION['usuario'])) {
					echo '<li class="nav-item "><a class="btn btn-primary btn-sm mt-0" href="logout.php"> Cerrar Sesión</a></li>';
				} else {
					echo '<li class="nav-item "><a class="btn btn-primary btn-sm mt-0" href="login.php"> Iniciar Sesión / Registrarse </a></li>';
				}
				?>

			</ul>
		</div>
	</div>
</nav>
<!-- /Navbar -->