<?php

require_once 'URL/rutas.php';

session_start();
require "conexion.php";


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
	<link rel="stylesheet" href="Datatable/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" type="text/css" href="Datatable/datatables.min.css" />

	<link rel="stylesheet" type="text/css" href="Datatable/datatables.css" />

	<script src="jqueri/jquery.js"></script>
	<script src="Datatable/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Datatable/rowReorder.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="Datatable/responsive.dataTables.min.css" />

</head>

<body>
<div class="container">

	<header >
		<nav class="navbar navbar-expand-lg navbar navbar-light "  style="background-color: #e3f2fd;">
			<div class="container-fluid " >
				<img style="border-radius: 12em;" src="data:image/jpg;base64,<?php echo base64_encode($foto) ?>" width="70px;" height="70px;">

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav  justify-content-center ">
						<li class="nav-item">
							<a class="nav-link " aria-current="page" href="Programa.php?Ruta=Home">Home</a>
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

	</header>
	
		<!--Contenido-->
		<?php
		require_once 'Seccion/' . $section . '.php';
		?>

	</div>






	<script type="text/javascript">
		$(document).ready(function() {
			var table = $('#ListaEmpleados').DataTable({
				rowReorder: {
					selector: 'td:nth-child(2)'
				},
				responsive: true
			});
		});
	</script>



	<script src="Datatable/datatables.min.js"></script>
	<script src="Datatable/dataTables.rowReorder.min.js"></script>
	<script src="Datatable/dataTables.responsive.min.js"></script>
	<script src="bootstrap5/js/bootstrap.min.js"></script>

	<script src="Modal.js"></script>

</body>

</html>