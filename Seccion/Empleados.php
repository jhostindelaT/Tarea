<?php


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
    <div class="row">

        <div class="col-md-2">
            <div id="list-example" class="list-group">
                <a class="list-group-item list-group-item-action" href="Programa.php?Ruta=Empleados">Lista</a>
                <a class="list-group-item list-group-item-action" href="Programa.php?Ruta=Empleados?SS=?Solicitudes">s</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
            </div>
        </div>
        <div class="col-md-10">
            <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0">
    
             
         <?php 
         require_once 'Empleados/' . $seleccion . '.php';
                ?>
            </div>
        </div>
    </div>
    </div>
    </header>

    <script src="../jqueri/jquery.js"></script>
    <script src="../bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>