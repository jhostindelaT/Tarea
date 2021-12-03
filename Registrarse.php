<?php


include 'conexion.php';

if (empty($_POST)) {
    $LascontrasNoSonInguales = "";
    $llenarContrasenas = "";
}

if (!empty($_POST)) {

    $FotoDePerfil = addslashes(file_get_contents($_FILES['Fotoadd']['tmp_name']));
    $NombreUsuario = $_POST['UsuarioIngresar'];
    $PrimerContrasena = $_POST["PassWordIngresar"];
    $SegundaContasena = $_POST["ConfirmarPassword"];
    $DosNombres = $_POST["NameIngresar"];;
    $Apellidos = $_POST["ApellidoIngresar"];;
    $Cedula = $_POST["CedulaIngresar"];;
    $NumeroTelefono = $_POST["TelefonoIngresar"];;
    $Edad =  $_POST["EdadIngresar"];

    $EdadInsertar = intval($_POST["EdadIngresar"]);

    $Existeusuario = "SELECT COUNT(*) as buscar from Users where Users='$NombreUsuario'";
    $EnviarConsultaExistencia = mysqli_query($con, $Existeusuario);
    $ConfirmarsiExistencia = mysqli_fetch_array($EnviarConsultaExistencia);

    if ($ConfirmarsiExistencia['buscar'] > 0) {
        $Nombrevalidation = '<label class="text-danger">El usuario ya existe intente con otro usuario</label><br>';
    } else {
        $usuarioNoexiste = true;
    }

    if (strlen($NombreUsuario) < 4) {
        $Usuariovalidar = '<label class="text-danger">Deve rellenar este campo con almenos tres caracteres</label><br>';
    } else {
        $nombrecompleto = true;
    }


    if (empty($FotoDePerfil)) {
        $FotoValidacion = '<label class="text-danger"> Deve seleccionar una foto de perfil</label><br>';
    } else {
        $FotoValidacion = '<label class="text-info">La previsualizacion ya no esta disponible</label><br>';
        $FotoDeperfilCompleto = true;
    }


    if (strlen($PrimerContrasena) < 3) {
        $Primercontravalidar = '<label class="text-danger">Deve rellenar este campo con almenos tres caracteres</label><br>';
    } else {
        $PirimeraContraCompleta = true;
    }

    if (strlen($SegundaContasena) < 3) {
        $Segundacontravalidar = '<label class="text-danger">Deve rellenar este campo con almenos tres caracteres</label><br>';
    } else {
        $SegundaContraCompleta = true;
    }


    if (strlen($DosNombres) < 3) {
        $Nombresvalidar = '<label class="text-danger">Deve rellenar este campo con almenos tres caracteres</label><br>';
    } else {
        $DosNombresCompleto = true;
    }

    if (strlen($Apellidos) < 3) {
        $Apellidosvalidar = '<label class="text-danger">Deve rellenar este campo con almenos tres caracteres</label><br>';
    } else {
        $ApellidosCompletos = true;
    }

    if (strlen($Cedula) < 3) {
        $Cedulavalidar = '<label class="text-danger">Deve rellenar este campo con almenos tres caracteres</label><br>';
    } else {
        $CedulaCompleta = true;
    }

    if (strlen($NumeroTelefono) < 3) {
        $NumeroTelefonovalidar = '<label class="text-danger">Deve rellenar este campo con almenos tres caracteres</label><br>';
    } else {
        $NumeroCompleto = true;
    }

    if (strlen($Edad) < 1) {
        $Edadvalidar = '<label class="text-danger">Deve rellenar este campo con almenos un caracter</label><br>';
    } else {
        $EdadCompleta = true;
    }

    if ($PirimeraContraCompleta == true && $SegundaContraCompleta == true) {
        if ($PrimerContrasena == $SegundaContasena) {
        } else {
            $Primercontravalidar = '<label class="text-danger">Las contraseñas no son iguales</label><br>';
            $Segundacontravalidar = '<label class="text-danger">Las contraseñas no son iguales</label><br>';
        }
    }
    if ($usuarioNoexiste == true && $nombrecompleto == true && $FotoDeperfilCompleto == true && $PirimeraContraCompleta == true && $SegundaContraCompleta == true && $DosNombresCompleto == true && $ApellidosCompletos == true && $CedulaCompleta == true && $NumeroCompleto == true && $EdadCompleta == true && $EdadCompleta == true) {

        $consultaInsert = "INSERT INTO `Users`( `ID_TipoUser`, `Users`, `pass`, `Nombres`, `Apellidos`, `Edad`, `FotoPerfil`, `Activo`, `Linea`, `Cedula`, `NumeroDeTelefono`) VALUES (2,'$NombreUsuario','$PrimerContrasena','$DosNombres','$Apellidos',$EdadInsertar,'$FotoDePerfil',0,0,'$Cedula','$NumeroTelefono')";
        $EnviarConsultainsert = mysqli_query($con, $consultaInsert);


        if ($EnviarConsultainsert) {
            header("location: NoTeEncuentrasActivo.php");
        } else {
            echo "Error: " . $EnviarConsultainsert . mysqli_error($con);
            die;
        }
    }
}

/*
//Contrasena funciona hace falta validar que no existan usuaerio con el mismo nombre
$PrimerContrasena = $_POST["PassWordIngresar"];
$SegundaContasena = $_POST["ConfirmarPassword"];
if (!empty($_POST)) {



    if ($PrimerContrasena == $SegundaContasena) {
        $Funcion = '<h2>Funciona</h2>';
    } else {
        $Funcion = '<h2>No funciona</h2>';
    }
}*/


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="stilosPrincipales.css">


</head>

<body>


    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <section class=" mx-auto">

                <div class="container-fluid h-custom">
                    <div class="row d-flex  ">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div id='fotoPorDefecto'>
                                <img src="src/img/elijaPerfil.png" id="fotos" class="img-fluid ImagePerfil" alt="Sample image" id="Fotoperfil">
                            </div>

                            <div id="imagensi"></div>
                            <div id=SubirFoto>
                                <input style="display: none" type="file" name="Fotoadd" id="FotoPersona">
                            </div>
                            <?php echo $FotoValidacion; ?>
                            <label class="form-label" for="Usuario">Seleccione una foto de perfil</label>


                            <div class="row">
                                <div class="divider d-flex align-items-center my-4">
                                    <p class="text-center fw-bold mx-3 mb-0">Registrarse</p>
                                </div>


                                <div class="form-outline mb-3">
                                    <input type="text" name="UsuarioIngresar" autocomplete="off" id="Usuario" class="form-control form-control-lg" placeholder="Usuario" value="<?php echo $NombreUsuario ?>" />
                                    <?php echo $Nombrevalidation; ?>
                                    <?php echo $Usuariovalidar; ?>
                                    <label class="form-label" for="Usuario">Inserte su Usuario</label>


                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" name="PassWordIngresar" autocomplete="off" id="pass" class="form-control form-control-lg" placeholder="Contraseña" value="<?php echo $PrimerContrasena; ?>" />
                                    <?php echo $Primercontravalidar; ?>
                                    <label class="form-label" for="pass">Inserte su contraseña</label>

                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" name="ConfirmarPassword" autocomplete="off" id="ConfirmarPass" class="form-control form-control-lg" placeholder="Confirme Contraseña" value="<?php echo $SegundaContasena;  ?>" />
                                    <?php echo $Segundacontravalidar; ?>
                                    <label class="form-label" for="ConfirmarPassword">Confirme su contraseña</label>



                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">


                            <div class="divider d-flex align-items-center my-4">
                            </div>

                            <div class="form-outline mb-3">
                                <input type="text" name="NameIngresar" autocomplete="off" id="Nombre" class="form-control form-control-lg" placeholder="Nombres" value="<?php echo $DosNombres; ?>" />
                                <?php echo $Nombresvalidar; ?>
                                <label class="form-label" for="Nombre">Ingrese sus dos nombres</label>
                            </div>
                            <div class="form-outline mb-3">
                                <input type="text" name="ApellidoIngresar" autocomplete="off" id="Apellido" class="form-control form-control-lg" placeholder="Apellidos" value="<?php echo $Apellidos; ?>" />
                                <?php echo $Apellidosvalidar; ?>
                                <label class="form-label" for="Apellido">Ingrese sus dos apellidos</label>
                            </div>
                            <div class="form-outline mb-3">
                                <input type="text" name="CedulaIngresar" id="Cedula" autocomplete="off" class="form-control form-control-lg" placeholder="Cedula" value="<?php echo $Cedula; ?>" />
                                <?php echo $Cedulavalidar; ?>
                                <label class="form-label" for="Cedula">Ingrese su cedula</label>
                            </div>


                            <div class="form-outline mb-4">
                                <input type="number" name="TelefonoIngresar" autocomplete="off" id="Telfono" class="form-control form-control-lg" placeholder="Numero De Telefono" value="<?php echo $NumeroTelefono; ?>" />
                                <?php echo $NumeroTelefonovalidar; ?>
                                <label class="form-label" for="Telfono">Ingrese tu numero de telefono</label>
                            </div>


                            <div class="form-outline mb-3">
                                <input type="number" name="EdadIngresar" autocomplete="off" id="Edad" class="form-control form-control-lg" placeholder="Edad" value="<?php echo $Edad; ?>" />
                                <?php echo $Edadvalidar; ?>
                                <label class="form-label" for="Edad">Ingrese su edad</label>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <p class="small fw-bold mt-2 pt-1 mb-0">ya tienes una cuenta? <a href="index.php" class="link-danger">Regresar</a></p>
                                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>




    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="jqueri/jquery.js">

    </script>

    <script src="crearvista.js"></script>
    <script src="Funciones.js"></script>
    <script src="bootstrap5/js/bootstrap.js"></script>
    <script src="bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>