<?php

session_start();
$_SESSION["Entro"];
$UsuarioEntro = $_SESSION["Entro"];
$foto = $_SESSION["Foto"];
if (!empty($UsuarioEntro)) {
} else {
    header("location: index.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cofirmar</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
</head>

<body>

    <div class="container" style="margin-top:8%;">
        <div class="justify-content-center">
            <center>
                <div style="border-radius: 12em;">
                    <img style="border-radius: 12em;" src="data:image/jpg;base64,<?php echo base64_encode($foto) ?>" width="270px;" height="270px;">
                </div>
                <h1>¡Has intentado salir!</h1>
                <spam>Actualmente hay una sesion abierta, ¿Desea Cerrar?</spam>
            </center>
        </div>

    </div>
    <div class="container" style="margin-top:3%;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <form action="Programa.php">
                    <center> <button class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;" type="submit">Cancelar</button></center>
                </form>
            </div>
            <div class="col-md-3">
                <form action="Logica/Salir.php">
                    <center><button class="btn btn-danger" style="padding-left: 2.5rem; padding-right: 2.5rem;" type="submit">Aceptar</button></center>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>



    <script src="jqueri/jquery.js"></script>
    <script src="bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>