<?php

require_once 'URL/rutas.php';

session_start();


$UsuarioLine = $_SESSION["Entro"];

$foto = $_SESSION["Foto"];
$ID = $_SESSION["ID_User"];
$nombre = $_SESSION["Nom"];
$ape = $_SESSION["Ape"];
$section = $_GET['Ruta'] ?? 'Home';

if (!isset($routes[$section])) {
	$section = 404;
}

if (isset($UsuarioLine)) {
} else {
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $routes[$section]['title']; ?></title>
	<link rel="stylesheet" href="styloCalculadora.css">
	<link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
</head>

<body>


	<header class="">

		<nav class="navbar navbar-expand-lg navbar-primary bg-light ">
			<div class="container-fluid ">
				
				<div class="collapse navbar-collapse nav justify-content-center" id="navbarNav">
				<img style="border-radius: 12em;" src="data:image/jpg;base64,<?php echo base64_encode($foto) ?>" width="70px;" height="70px;">
					<ul class="navbar-nav ">
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
	<div class="container">
		<!--Contenido-->
		<?php
		require_once 'Seccion/' . $section . '.php';
		?>

	</div>
	<script src="jqueri/jquery.js"></script>
	<script src="bootstrap5/js/bootstrap.min.js"></script>
	<script src="Modal.js"></script>

</body>

</html>