<?php

session_start();

include 'conexion.php';

$ConsultaDetalles = "SELECT *  from Users";
$EnvioConsulta = mysqli_query($con, $ConsultaDetalles);


$Nombres =  $DatosObtenidos["Nombres"];
$Apellido = $DatosObtenidos["Apellidos"];
$Usuario = $DatosObtenidos["Users"];
$Foto = $DatosObtenidos["FotoPerfil"];
$Edad = $DatosObtenidos["Edad"];
$Activo = $DatosObtenidos["Activo"];
$Linea = $DatosObtenidos["Linea"];
$NumeroCelular = $DatosObtenidos["NumeroDeTelefono"];
$Cedula = $DatosObtenidos["Cedula"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php require_once 'Empleados.php'; ?>


    <form action="" method="post">
        <select name="arrar" id="as" autofocus>
            <?php
            while ($DatosObtenidos = mysqli_fetch_array($EnvioConsulta)) {
            ?>



                <option value="<?php echo $DatosObtenidos["ID_Usuario"] ?>"><?php echo $DatosObtenidos["Users"] ?></option>



            <?php } ?>
        </select>
    </form>
    <input type="text" id="si" value="">
    <button onclick="ShowSelected()" ></button>
    <select name="arrar" id="asa"  autofocus>
        <option></option>
    </select>


    <script type="text/javascript">
        function ShowSelected() {
            /* Para obtener el valor */
            var cod = document.getElementById("as").value;
            document.getElementById('si').value = cod;


        }
        ShowSelected();
    </script>

</body>

</html>