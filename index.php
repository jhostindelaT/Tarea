<?php


require "conexion.php";
session_start();
$_SESSION["Entro"];
$UsuarioEntro = $_SESSION["Entro"];

if (!empty($UsuarioEntro)) {
  header("location: Confirmar.php");
} else {


  if (!empty($_POST)) {



    $usuario = $_POST['Usuario'];
    $clave = $_POST['Clave'];

    $Existe = "SELECT COUNT(*) as buscar from Users where Users='$usuario' and pass='$clave' ";
    $consulta = mysqli_query($con, $Existe);
    $arrays = mysqli_fetch_array($consulta);


    $DatosUsuarioRegistrado = "SELECT *  from Users where Users='$usuario' and pass='$clave'";
    $ConsultaDeLosDatos = mysqli_query($con, $DatosUsuarioRegistrado);
    $DatosObtenidos = mysqli_fetch_array($ConsultaDeLosDatos);


    $_SESSION["Nom"] = $DatosObtenidos["Nombres"];
    $_SESSION["Ape"] = $DatosObtenidos["Apellidos"];
    $_SESSION["ID_User"] = $DatosObtenidos["ID_Usuario"];
    $_SESSION["Foto"] = $DatosObtenidos["FotoPerfil"];

    $IdTipo = $DatosObtenidos["ID_TipoUser"];
    $idAtualizaraActivo = $_SESSION["ID_User"];
    $Activo = $DatosObtenidos["Activo"];




    if ($arrays['buscar'] > 0) {

      if ($Activo) {
        if ($IdTipo = 1) {

          $Actualizar = "UPDATE Users SET Linea=1 WHERE Users.ID_Usuario=$idAtualizaraActivo";
          $MandarConsultaActualizar = mysqli_query($con, $Actualizar);




          $consultaActual = "SELECT *  from Users where Users='$usuario' and pass='$clave'";
          $obtenerDatos = mysqli_query($con, $consultaActual);
          $ActualizarEnlinea = mysqli_fetch_array($obtenerDatos);
          $_SESSION["Entro"] = $ActualizarEnlinea["Linea"];
          header("location: Programa.php");
        } else {
          $Actualizar = "UPDATE Users SET Linea=1 WHERE Users.ID_Usuario=$idAtualizaraActivo";
          $MandarConsultaActualizar = mysqli_query($con, $Actualizar);
          header("location: ProgramaEmpleado.php");
        }
      } else {
        header("location: NoTeEncuentrasActivo.php");
      }
    } else {

      $BuscarUsuario = "SELECT COUNT(*) as UsuarioExiste from Users where Users='$usuario'";
      $EnviarConsulta = mysqli_query($con, $BuscarUsuario);
      $SiExiste = mysqli_fetch_array($EnviarConsulta);


      if ($SiExiste['UsuarioExiste'] == 0) {
        $UsuarioValidar = '<label class="text-danger">El usuario no existe</label><br>';
        $contraValidar= '<label class="text-danger">El usuario no existe</label><br>';
      }

      $SelecionarPass = "SELECT pass  from Users where Users='$usuario'";
      $EnviarConsultaPass = mysqli_query($con, $SelecionarPass);
      $ContraObtenida = mysqli_fetch_array($EnviarConsultaPass);


      if ($ContraObtenida != $pass ) {
       $contraValidar= '<label class="text-danger">Su contraseña es incorrecta</label><br>';
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesion </title>
  <link rel="stylesheet" href="bootstrap5/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">

</head>

<body>


  <div class="container">

    <section class=" mx-auto" style="margin-top:10%;">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="src/img/imginicio.png" class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST">

              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">Iniciar Sesion</p>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="Usuario" id="form3Example3" class="form-control form-control-lg" placeholder="Usuario" value="<?php echo $usuario ?>" autocomplete="Nombre de usuario" />
                <?php echo $UsuarioValidar ?>
                <label class="form-label" for="form3Example3">Inserte su Usuario</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" name="Clave" autocomplete="current-password" id="form3Example4" class="form-control form-control-lg" value="<?php echo $clave ?>" placeholder="Contraseña" />
                <?php echo $contraValidar ?>
                <label class="form-label" for="form3Example4">Inserte su Contraseña</label>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Enviar</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Aun no tenes una cuenta? <a href="Registrarse.php" class="link-danger">Register</a></p>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="jqueri/jquery.js"></script>
  <script src="bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>