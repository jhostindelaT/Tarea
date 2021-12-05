<?php

$ConsultaEMpleado = "SELECT * FROM `Users` WHERE ID_TipoUser=2 and Activo=0;";

$ListaEmpleado = mysqli_query($con, $ConsultaEMpleado);
?>



    <?php require_once 'Empleados.php'; ?>
    <div style="margin-top: 4%;">
        <div class="row">
            <div class="col-md-12">
                <h1 align="center">Solicitud de Empleados</h1>

                <table width="90%" id="ListaEmpleados" class="table table-hover" align="center">
                    <thead class="table-primary">

                        <tr align="center">
                            <td scope="col">Usuario</td>
                            <td scope="col">Nombres</td>
                            <td scope="col">Apellidos</td>
                            <td scope="col">Edad</td>
                            <td scope="col">Activo</td>
                            <td scope="col">Linea</td>
                            <td scope="col">Cedula</td>
                            <td scope="col">NumeroDeTelefono</td>
                            <td scope="col">Habilitar</td>
                         


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
                                <td>No se Encuentra Activo</td>
                                <td><?php echo $datos["Linea"] ?></td>
                                <td><?php echo $datos["Cedula"] ?></td>
                                <td><?php echo $datos["NumeroDeTelefono"] ?></td>

                                <td><a href="Seccion/Empleado-Habilitar.php?id=<?php echo $datos["ID_Usuario"] ?>"><button class="btn btn-outline-warning">Habilitar</button></a></td>
                               

                            </tr>
                        <?php
                        }

                        ?>
                    <tfoot class="table table-hover" >
                        <tr>
                            <td scope="col">Usuario</td>
                            <td scope="col">Nombres</td>
                            <td scope="col">Apellidos</td>
                            <td scope="col">Edad</td>
                            <td scope="col">Activo</td>
                            <td scope="col">Linea</td>
                            <td scope="col">Cedula</td>
                            <td scope="col">NumeroDeTelefono</td>
                            <td scope="col">Habilitar</td>
                           
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>



    </div>