<?php

require_once 'URL/rutas.php';


$section = $_GET[ 'Ruta' ] ?? 'home';

if (!isset($routes[ $section ])) {
   $section = 404;
}


?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $routes[ $section ][ 'title' ]; ?></title>
	</head>
	<body>
	
     <?php 
	 $foto=$_SESSION["FotoPerfil"];
$ID=$_SESSION["ID_User"];
$nombre=$_SESSION["Nom"];
$ape=$_SESSION["Ape"];
echo "$ID , $nombre , $ape"  ; ?>
      
		<header class="">
			<div class="">
				<nav class="navegacion">
					<a href="Programa.php?Ruta=Home">Home</a>
					<a href="Programa.php?Ruta=Empleados">Empleados</a>
					<a href="Programa.php?Ruta=Producto">Producto</a>
					<a href="Programa.php?Ruta=Inventario">Inventario</a>
					<a href="Programa.php?Ruta=Transacion">Transacion</a>

				</nav>
			</div>
		
        </header>

        <?php
      require_once 'Seccion/' . $section . '.php';
      ?>
		<script src="build/js/bundle.min.js"></script>
	</body>
</html>