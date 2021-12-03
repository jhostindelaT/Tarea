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

<body style="background-color:#0d2d5eaf; color: white;">

    <div class="ajuste" class="container" style="margin-top: 4%;">
        <div class="container">
            <center>
                <h4>¿Desea habilitar?</h4>
            </center>
            <section class=" mx-auto">

                <div class="container-fluid h-custom">
                    <div class="row d-flex  ">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div id='fotoPorDefecto'>
                                <img src="data:image/jpg;base64,<?php echo base64_encode($Foto) ?>" id="FotoDePerfil" class="img-fluid ImagePerfil" alt="Sample image" id="Fotoperfil">
                            </div>

                            <label class="form-label" for="Usuario">Foto de Perfil</label>


                            <div class="row">

                                <div class="form-outline mb-3">
                                    <input type="text" name="UsuarioIngresar" disabled autocomplete="off" id="Usuario" class="form-control form-control-lg" placeholder="Usuario" value="<?php echo $Usuario ?>" />
                                    <label class="form-label" for="Usuario">Usuario</label>

                                    <div class="form-outline mb-3">
                                        <input type="text" name="NameIngresar" disabled autocomplete="off" id="Nombre" class="form-control form-control-lg" placeholder="Nombres" value="<?php echo $Nombres; ?>" />
                                        <label class="form-label" for="Nombre">Nombres del usuario</label>
                                    </div>
                                    <div class="form-outline mb-3">
                                        <input type="text" name="ApellidoIngresar" disabled autocomplete="off" id="Apellido" class="form-control form-control-lg" placeholder="Apellidos" value="<?php echo $Apellido; ?>" />
                                        <label class="form-label" for="Apellido">Apellidos de usuario</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">


                            <div class="divider d-flex align-items-center my-4">
                            </div>



                            <div class="form-outline mb-3">
                                <input type="text" name="CedulaIngresar" id="Cedula" disabled autocomplete="off" class="form-control form-control-lg" placeholder="Cedula" value="<?php echo $Cedula; ?>" />
                                <label class="form-label" for="Cedula">Cedula del usuario</label>
                            </div>


                            <div class="form-outline mb-4">
                                <input type="number" name="TelefonoIngresar" disabled disabled autocomplete="off" id="Telfono" class="form-control form-control-lg" placeholder="Numero De Telefono" value="<?php echo $NumeroCel; ?>" />
                                <label class="form-label" for="Telfono">Su numero de telefono</label>
                            </div>


                            <div class="form-outline mb-3">
                                <input type="number" name="EdadIngresar" disabled autocomplete="off" id="Edad" class="form-control form-control-lg" placeholder="Edad" value="<?php echo $Edad; ?>" />
                                <?php echo $Edadvalidar; ?>
                                <label class="form-label" for="Edad">Su edad</label>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <a href="../Programa.php?Ruta=Empleados-solicitud"><button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Cancelar</button></a>
                                <a href="Acciones/habilitar.php?Habilitar=<?php echo $IDd ?>"><button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Habilitar</button></a>
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