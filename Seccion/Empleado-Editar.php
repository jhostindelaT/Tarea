<?php

session_start();
require '../conexion.php';





$IDd = $_REQUEST['id'];



if (empty($IDd)) {
    header("location: ../Programa.php?Ruta=Empleados-Lista");
} else {
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
    $NumeroCelular = $DatosObtenidos["NumeroDeTelefono"];
    $Cedula = $DatosObtenidos["Cedula"];


//UPDATE `Users` SET `Users` = 'Jhosti', `Nombres` = 'Jhostin Missa', `Apellidos` = 'Cruz tra', `Edad` = '1', `Activo` = b'1', `Linea` = b'0' WHERE `Users`.`ID_Usuario` = 2;
if (!empty($_POST)) {

    require '../conexion.php';
    $NombresActualizar =  $_POST["Names"];
    $ApellidoActualizar = $_POST["apellidos"];
    $UsuarioActualizar = $_POST["Users"];
    $EdadActualizar = $_POST["edades"];
    $CedulaActualizar = $_POST["CedulaU"];
    $NumeroTelefonicoctualizar = $_POST["NumeroCel"];
    $IDactualizar =$IDd;
    $edad = intval($_POST["edades"]);


    $ConsultaActualizar = "UPDATE Users SET Users = '$UsuarioActualizar', Nombres = '$NombresActualizar', Cedula = '$CedulaActualizar',NumeroDeTelefono = '$NumeroTelefonicoctualizar', Apellidos = '$ApellidoActualizar', Edad=$edad  WHERE ID_Usuario = $IDactualizar ";
    $EnvioConsultaActualizar = mysqli_query($con, $ConsultaActualizar);
    $Actualizado = mysqli_fetch_array($EnvioConsultaActualizar);

    if ($EnvioConsultaActualizar) {
        header("location: ../Programa.php?Ruta=Empleados-Lista");
    } else {
        echo "Error: " . $EnvioConsultaActualizar . mysqli_error($con);
        die;
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
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
</head>

<body>

    <form class="container needs-validation" method="POST" style="margin-top: 5%;">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <!-- Full Name -->
                    <label for="Usuario" class="control-label">Usuarios</label>
                    <input type="text"  class="form-control" id="Usuario" name="Users" placeholder="Ingrese el usuario" value="<?php echo "$Usuario" ?>" required>

                </div>

                <div class="form-group">
                    <!-- Street 1 -->
                    <label for="Nombres" class="control-label">Nombres</label>
                    <input type="text" class="form-control" id="Nombres" name="Names" placeholder="Ingrese los nombres" value="<?php echo "$Nombres" ?>" required>
                </div>

                <div class="form-group">
                    <!-- Street 1 -->
                    <label for="Nombres" class="control-label">Cedula</label>
                    <input type="text" class="form-control" id="CedulaU" name="CedulaU" placeholder="Ingrese los nombres" value="<?php echo "$Cedula" ?>" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <!-- Street 2 -->
                    <label for="Apellidos" class="control-label">Apellido</label>
                    <input type="text" class="form-control" id="Apellidos" name="apellidos" placeholder="Ingrese los apellidos" value="<?php echo $Apellido ?>" required>
                </div>

                
                <div class="form-group">
                    <!-- City-->
                    <label for="Edad" class="control-label">Edad</label>
                    <input type="number" class="form-control" id="Edad" name="edades" placeholder="Ingrese la edad" value="<?php echo $Edad ?>" required>
                    <input type="hidden" class="form-control" id="id" name="idUsuarioActualizar" placeholder="id" disabled value="<?php echo $IDd ?>" required>
                </div>
                <div class="form-group">
                    <!-- Street 2 -->
                    <label for="Apellidos" class="control-label">NumeroTelefonico</label>
                    <input type="number" class="form-control" id="tel" name="NumeroCel" placeholder="Ingrese los apellidos" value="<?php echo $NumeroCelular ?>" required>
                </div>
            </div>

          
            <div class="form-group " style="margin-top: 22px;">
                <!-- Submit Button -->
                <button type="button" onclick="AbrirModal();" class="btn btn-primary">Actualizar</button>
            </div>
        </div>


        <div class="modal fade" id="ModalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">GuardarCambios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <h3>¿Estas seguro que quieres guardar?</h3>
                        <label for="">Estas a punto de guardar los cambios, la informacion que estaba anteriromente ya no se mostrara.</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar los cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </form>

   

    <script src="../jqueri/jquery.js"></script>
    <script src="../Modal.js"></script>
    <script src="../bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>