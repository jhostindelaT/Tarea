<?php
$routes = [
    'Lista',
    'Solicitudes'

];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">

</head>

<body>


    <header>
        <div style="margin-top: 4%;">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="Programa.php?Ruta=Empleados-Lista">Lista De Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Programa.php?Ruta=Empleados-solicitud">Solicitudo DE Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
    </header>

    <script src="../jqueri/jquery.js"></script>
    <script src="../bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>