<?php


include 'conexion.php';

if (empty($_POST)) {
    $LascontrasNoSonInguales = "";
    $llenarContrasenas = "";
}

if (!empty($_POST)) {

    $NombreUsuario = $_POST['UsuarioIngresar'];
    $PrimerContrasena = $_POST["PassWordIngresar"];
    $SegundaContasena = $_POST["ConfirmarPassword"];



    $Existeusuario = "SELECT COUNT(*) as buscar from Users where Users='$NombreUsuario'";
    $EnviarConsultaExistencia = mysqli_query($con, $Existeusuario);
    $ConfirmarsiExistencia = mysqli_fetch_array($EnviarConsultaExistencia);

    if (strlen($NombreUsuario) > 3) {

        if ($ConfirmarsiExistencia['buscar'] > 0) {
            $UsuarioExiste = '<p class="text-danger">El usuario ya existe, utilice otro</p>';
            $MensajeFronEnd = $UsuarioExiste;
        } else {
           
            if (empty($PrimerContrasena)) {
                $devellenar='
                <p class="text-danger">Deve llenar este campo</p>';
            }

            if (empty($SegundaContasena)){
              
                $date = date_create("2020-03-29");
                echo date_format($date,"Y/m/d H:i:s");
                $devellenarconfirmar='<p class="text-danger">Deve llenar este campo</p>';
                
            }


        }
    } else {
        $ValidarNombre = '<div class="alert alert-danger role="alert">
        <marquee>El usuario almenos deve tener cuatro caracteres</marquee>
      </div>';
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

</head>

<body>


    <div class="container">
        <form method="POST">
            <section class=" mx-auto">
                <div class="container-fluid h-custom">
                    <div class="row d-flex  ">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <img src="src/img/imginicio.png" class="img-fluid" alt="Sample image">
                            <div class="row">

                                <div class="form-outline mb-3">
                                    <input type="text" name="UsuarioIngresar" autocomplete="off" id="Usuario" class="form-control form-control-lg" placeholder="Usuario" value="<?php echo $NombreUsuario ?>" />
                                    <?php echo $ValidarNombre; ?>
                                    <?php echo $MensajeFronEnd;  echo date_format($date,"Y/m/d H:i:s"); ?>
                                    <label class="form-label" for="Usuario">Inserte su Usuario</label>
                                   
                                   
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" name="PassWordIngresar" autocomplete="off" id="pass" class="form-control form-control-lg" placeholder="Contraseña" value="<?php echo $PrimerContrasena; ?>" />
                                    <label class="form-label" for="pass">Inserte su contraseña</label>
                                    <?php echo $devellenar; ?>
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" name="ConfirmarPassword" autocomplete="off" id="ConfirmarPass" class="form-control form-control-lg" placeholder="Confirme Contraseña" value="<?php echo $SegundaContasena;  ?>" />
                                    <label class="form-label" for="ConfirmarPassword">Confirme su contraseña</label>
                                    <?php echo $devellenarconfirmar; ?>
                                    <?php echo $LascontrasNoSonInguales; ?>
                                    

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">


                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0">Registrarse</p>
                            </div>


                            <div class="form-outline mb-3">
                                <input type="text" name="NameIngresar" autocomplete="off" id="Nombre" class="form-control form-control-lg" placeholder="Nombre" />
                                <label class="form-label" for="Nombre">Ingrese sus dos nombres</label>
                            </div>
                            <div class="form-outline mb-3">
                                <input type="text" name="ApellidoIngresar" autocomplete="off" id="Apellido" class="form-control form-control-lg" placeholder="Apellido" />
                                <label class="form-label" for="Apellido">Ingrese sus dos apellidos</label>
                            </div>
                            <div class="form-outline mb-3">
                                <input type="text" name="CedulaIngresar" id="Cedula" autocomplete="off" class="form-control form-control-lg" placeholder="Clave" />
                                <label class="form-label" for="Cedula">Ingrese su cedula</label>
                            </div>


                            <div class="form-outline mb-4">
                                <input type="number" name="TelefonoIngresar" autocomplete="off" id="Telfono" class="form-control form-control-lg" placeholder="Numero De Telefono" />
                                <label class="form-label" for="Telfono">Ingrese tu numero de telefono</label>
                            </div>


                            <div class="form-outline mb-3">
                                <input type="number" name="EdadIngresar" autocomplete="off" id="Edad" class="form-control form-control-lg" placeholder="Edad" />
                                <label class="form-label" for="Edad">Ingrese su edad</label>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">

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


    <script src="bootstrap5/js/bootstrap.js">
        $(document).ready(function() {
            $('#Modal').modal('show');
        });
    </script>

    <?php
    echo "
   
  
 ";

    ?>

    <script src="bootstrap5/js/bootstrap.js"></script>
    <script src="bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>