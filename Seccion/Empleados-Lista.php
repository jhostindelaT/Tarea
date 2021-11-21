<?php
require "conexion.php";


if ($con->connect_errno) {
    echo "Error de conexion de la base datos" . $con->connect_error;
    exit();
}
$ConsultaEMpleado = "SELECT * FROM `Users` WHERE ID_TipoUser=2;";

$ListaEmpleado = mysqli_query($con, $ConsultaEMpleado);
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
    <?php require_once 'Empleados.php'; ?>
    <div class="row">
        <div class="col-md-12">
        <h1 align="center">Lista de empleados</h1>
        <table width="70%" class="table table-hover" align="center">

            <tr align="center">
                <td>Usuario</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Edad</td>
                <td>Activo</td>
                <td>Linea</td>
                <td>Eliminar</td>
                <td>Actualizar</td>
                <td>Detalles</td>


            </tr>
            <?php
            while ($datos = $ListaEmpleado->fetch_array()) {
            ?>
                <tr>
                    <td><?php echo $datos["Users"] ?></td>
                    <td><?php echo $datos["Nombres"] ?></td>
                    <td><?php echo $datos["Apellidos"] ?></td>
                    <td><?php echo $datos["Edad"] ?></td>
                    <td><?php echo $datos["Activo"] ?></td>
                    <td><?php echo $datos["Linea"] ?></td>

                    <td><a href="Eliminar.php?id=<?php echo $datos["ID_Usuario"] ?>"><button>Eliminar</button></a></td>
                    <td><a href="Eliminar.php?id=<?php echo $datos["ID_Usuario"] ?>"><button>Actualizar</button></a></td>
                    <td><a href="Eliminar.php?id=<?php echo $datos["ID_Usuario"] ?>"><button>Detalles</button></a></td>

                </tr>
            <?php
            }

            ?>
        </table>
        </div>
    </div>

    <script src="../jqueri/jquery.js"></script>
    <script src="../bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>