<?php

session_start();
$foto = $_SESSION["Foto"];
$ID = $_SESSION["ID_User"];
$nombre = $_SESSION["Nom"];
$ape = $_SESSION["Ape"];
$section = $_GET['Ruta'] ?? 'home';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <h1>Bien venido 	<?php echo "$nombre $ape "; ?></h1>
</body>
</html>