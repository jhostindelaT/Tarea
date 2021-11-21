<?php

require_once 'URL/rutas.php';

session_start();


$UsuarioLine=$_SESSION["Entro"];

$foto = $_SESSION["Foto"];
$ID = $_SESSION["ID_User"];
$nombre = $_SESSION["Nom"];
$ape = $_SESSION["Ape"];
$section = $_GET['Ruta'] ?? 'Home';

if (!isset($routes[$section])) {
	$section = 404;
}

if (isset($UsuarioLine)) {
	
}
else{
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $routes[$section]['title']; ?></title>
	<link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="Headerr">
		</div>
		<header class="">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
				<img style="border-radius: 12em;" src="data:image/jpg;base64,<?php echo base64_encode($foto) ?>" width="70px;" height="70px;">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" aria-current="page" href="Programa.php?Ruta=Home">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="Programa.php?Ruta=Empleados-Lista">Empleado</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="Programa.php?Ruta=Producto">Producto</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="Programa.php?Ruta=Inventario">Inventario</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="Programa.php?Ruta=Transacion">Transaccion</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="Programa.php?Ruta=Configuracion">Configuacion</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<!--Contenido-->
		<?php
		require_once 'Seccion/' . $section . '.php';
		?>
		
	</div>
	<script src="jqueri/jquery.js"></script>
	<script src="build/js/bundle.min.js"></script>
	<script src="bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>