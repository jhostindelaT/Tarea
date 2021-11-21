<?php
require "conexion.php";


if ($con->connect_errno) {
    echo "Error de conexion de la base datos" . $con->connect_error;
    exit();
}
$ConsultaEMpleado = "SELECT * FROM `Users` WHERE ID_TipoUser=2 and Activo=1;";

$ListaEmpleado = mysqli_query($con, $ConsultaEMpleado);
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
    <div style="margin-top: 4%;">
        <div class="row">
            <div class="col-md-12">
                <h1 align="center">Lista de empleados</h1>
              
                <table width="70%" class="table table-hover" align="center">
                    <thead class="table-primary">

                        <tr align="center">
                            <td scope="col">Usuario</td>
                            <td scope="col">Nombres</td>
                            <td scope="col">Apellidos</td>
                            <td scope="col">Edad</td>
                            <td scope="col">Activo</td>
                            <td scope="col">Linea</td>
                            <td scope="col">Eliminar</td>
                            <td scope="col">Actualizar</td>
                            <td scope="col">Detalles</td>


                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($datos = $ListaEmpleado->fetch_array()) {
                    ?>
                    
                        <tr>
                            <td><?php echo $datos["Users"] ?></td>
                            <td><?php echo $datos["Nombres"] ?></td>
                            <td><?php echo $datos["Apellidos"] ?></td>
                            <td><?php echo $datos["Edad"] ?></td>
                            <td>Esta Activo</td>
                            <td><?php echo $datos["Linea"] ?></td>

                            <td><a href="Eliminar.php?id=<?php echo $datos["ID_Usuario"] ?>"><button class="btn btn-outline-danger">Eliminar</button></a></td>
                            <td><a href="Eliminar.php?id=<?php echo $datos["ID_Usuario"] ?>"><button class="btn btn-outline-warning">Actualizar</button></a></td>
                            <td><a href="Seccion/Empleado-Detalles.php?id=<?php echo $datos["ID_Usuario"] ?>""><button class="btn btn-outline-primary">Detalles</button></a></td>

                        </tr>
                    <?php
                    }

                    ?>
                     </tbody>
                </table>
            </div>
        </div>



    </div>
    
</body>

</html>