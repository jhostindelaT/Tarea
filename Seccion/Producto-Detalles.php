<?php
session_start();
require '../conexion.php';
if (empty($_REQUEST['id'])) {
   header("location: ../Programa.php");
} else {
}

$IDd = $_REQUEST['id'];
$ConsultaDetalles = "SELECT * FROM `Producto` WHERE  ID_Producto=$IDd";
$EnvioConsulta = mysqli_query($con, $ConsultaDetalles);
$DatosObtenidos = mysqli_fetch_array($EnvioConsulta);

$Nombre =  $DatosObtenidos["NombreProducto"];
$Imagen = $DatosObtenidos["FotoDelProducto"];
$Precio = $DatosObtenidos["Precio"];
$Descripcion = $DatosObtenidos["Descripcion"];
$Disponible = $DatosObtenidos["UnidadesDisponibles"];




?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">

</head>

<body style="background-color:#0d2d5eaf; color: white;">

   <div class="ajuste" class="container" style="margin-top: 4%;">
      <div class="container">
         <center>
            <h4>¿Desea Comprar?</h4>
         </center>
         <section class=" mx-auto">

            <div class="container-fluid h-custom">
               <div class="row d-flex  ">
                  <div class="row align-items-start">
                     <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="col">
                           <div id='fotoPorDefecto'>
                              <img src="data:image/jpg;base64,<?php echo base64_encode($Imagen) ?>" id="FotoDePerfil" class="img-fluid ImagePerfil" alt="Sample image" id="Fotoperfil">
                           </div>

                           <label class="form-label" for="Producto">Foto</label>
                        </div>
                     </div>
                     <div class="col">

                        <div class="divider d-flex align-items-center my-4">
                        </div>
                        <h1><?php echo $Nombre ?></h1>
                        <br>
                        <h5><?php echo $Nombre ?>, <?php echo $Descripcion ?>, con el precio de <?php echo $Precio ?> Córdobas, ¡Apresurate! solo nos quedan <?php echo $Disponible ?> unidades UnidadesDisponibles

                        </h5>


                        <div class="text-center text-lg-start mt-4 pt-2">
                           <a href="../Programa.php?Ruta=Producto-Lista"><button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Cancelar</button></a>
                           <a href="Acciones/AgregarCarrito.php?Producto=<?php echo $IDd ?>"><button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Agregar al Carrito</button></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>


         <form action="../Programa.php?Ruta=Empleados-solicitud" method="post">

         </form>
      </div>



   </div>






   <script src="../jqueri/jquery.js"></script>
   <script src="../bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>