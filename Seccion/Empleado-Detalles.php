<?php
session_start();
require '../conexion.php';
if (empty($_REQUEST['id'])) {
   header("location: ../Programa.php");
} else {
}

$IDd = $_REQUEST['id'];
$ConsultaDetalles = "SELECT *  from Users where ID_Usuario=$IDd";
$EnvioConsulta = mysqli_query($con, $ConsultaDetalles);
$DatosObtenidos = mysqli_fetch_array($EnvioConsulta);

$Nombres =  $DatosObtenidos["Nombres"];
$Apellido = $DatosObtenidos["Apellidos"];
$Usuario = $DatosObtenidos["Users"];
$Foto = $DatosObtenidos["FotoPerfil"];
$Edad = $DatosObtenidos["Edad"];
$Activo = $DatosObtenidos["Activo"];
$Linea = $DatosObtenidos["Linea"];
$Cedula = $DatosObtenidos["Cedula"];
$NumeroCel = $DatosObtenidos["NumeroDeTelefono"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">

</head>

<body style="background-color: #1570fd; color: white;">

   <div class="ajuste" class="container" style="margin-top: 4%;">
      <div class="container">

         <div class="clearfix">
         <div class="col-md-3 col-lg-5 col-xl-9">
         <img src="data:image/jpg;base64,<?php echo base64_encode($Foto) ?>" style="border: 1px;" class="col-md-6 float-md-end mb-3 ms-md-3 shadow-lg p-3 mb-5 bg-body rounded">
      </div>
            

            <p>
               Empleado <?php echo "$Nombres $Apellido"; ?> tiene la edad de <?php echo $Edad; ?> años.
            </p>

            <p>
               El Usuartio que posee el es <?php echo $Usuario ?>, su numero de cedula es <?php echo $Cedula ?>.
            </p>

            <p>
              Para poder contactarlo su numero telefonico es <?php echo $NumeroCel ?>.
            </p>
         </div>


         <form action="../Programa.php?Ruta=Empleados-Lista" method="post">
            <button  class="btn btn-light shadow-lg p-3 mb-5 bg-body rounded" type="submit">Regresar</button>
         </form>
      </div>



   </div>






   <script src="../jqueri/jquery.js"></script>
   <script src="../bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>